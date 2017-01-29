<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 28.06.2016
 * Time: 22:32
 */

namespace App\Http\Controllers;


use App\App_models\App_blocks;
use App\App_models\App_materials;
use App\App_models\App_users;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;

class AppServerController extends Controller
{
    protected $allowed_actions = [
        'last', 'pic', 'text', 'rang', 'author'
    ];

    protected $request;

    protected $user_actions = [
        'register'      => ['login', 'password', 'email'], 
        'login'         => ['login', 'password'], 
        'restore_pwd'   => ['email'], 
        'add_photo'     => ['photo'], 
        'get_photo'     => [], 
        'add_descr'     => ['descr'], 
        'get_descr'     => [],
        'inc_rating'    => [],
        'last_post'     => ['set_id'],
		'test'          => ['file'],
    ];

    protected $post_actions = [
        'create'        => [''],
        'add_data'      => ['type', 'data', 'sort'],
        'get_data'      => ['type'],
        'get_status'    => [],
        'get_author'    => [],
        'set_status'    => ['published'],
        'set_author'    => ['author_id'],
        'set_set'       => ['set_id'],
    ];

//    protected $

    public function index($entity, $action, $id, Request $request)
    {
    	// TODO вынести логику по классам хотя бы для сущностей, а то каша
    	// dd($this->{"{$entity}_actions"});
    	if (isset($this->{"{$entity}_actions"})) {
    		$entity_actions = $this->{"{$entity}_actions"};
    		// dd($action, $entity_actions);
    		if (array_key_exists($action, $entity_actions) !== false) {
    			$method = "{$entity}_{$action}";
    			$this->request = &$request;
            	return $this->{$method}($id, $entity_actions[$action]);	
    		} else {
				return 'err';
			}
    	}
    }

    private function getParamVals($params) {
    	$params_vals = [];
    	foreach ($params as $p) {
    		$params_vals[$p] = $this->request->input($p, '');
    	}
    	return $params_vals;
    }

    /**
    *	
    */
    private function user_register($id, $params) 
    {
    	$pv = $this->getParamVals($params);
    	if (App_users::where('login', '=', $pv['login'])->count() > 0) {
    		return 'error';
    	}
    	$user = new App_users();
    	$user->login = $pv['login'];
    	$user->password = $pv['password'];
    	$user->email = $pv['email'];
    	$user->save();
    	return $user->id;
    }

    private function user_login($id, $params) 
    {
    	$pv = $this->getParamVals($params);
    	$user = App_users::where('login', '=', $pv['login'])
    		->where('password', '=', $pv['password'])
    		->get()
    		->toArray();
    	if (count($user) == 1) {
    		return $user[0]['id'];
    	}
    }

    private function fileUpload($file, $save_path, $allowed_mimes = null) {
        if ($allowed_mimes === null) {
            $allowed_mimes = [
                'image/jpeg' => 'jpg',
                'image/png'  => 'png'
            ];
        }

        $file_mime = $file->getMimeType();
        if (array_key_exists($file_mime, $allowed_mimes)) {
            $moving = File::move(
                $file->getRealPath(),
                $save_path.'.'.$allowed_mimes[$file_mime]
            );
            if ($moving) {
                return $save_path.'.'.$allowed_mimes[$file_mime];
            } else {}
            throw new Exception('err moving');
        } else {
            throw new Exception('err wrong type');
        }
    }

//    private function photoUpload($file, $user_id) {
//        $photos_save_path = $_SERVER['DOCUMENT_ROOT'].$_ENV['USER_PHOTOS_DIR'];
//        $allowed_mimes = [
//            'image/jpeg' => 'jpg',
//            'image/png'  => 'png'
//        ];
//        $file_mime = $file->getMimeType();
//        if (array_key_exists($file_mime, $allowed_mimes)) {
//            $photo_name = 'user'.$user_id.'.'.$allowed_mimes[$file_mime];
//            $moving = File::move(
//                $file->getRealPath(),
//                $photos_save_path.'/'.$photo_name
//            );
//            if ($moving) {
//                $user = App_users::find($user_id);
//                if ($user) {
//                    $user->photo = $photo_name;
//                    $user->save();
//                } else {
//                    return 'err no user';
//                }
//            }
//            return $moving?'ok':'err moving file';
//        } else {
//            return 'err type check';
//        }
//    }

    private function user_add_photo($id, $params) {
        $pv = $this->getParamVals($params);
        $pv['photo'] = $this->request->file('photo');
        $save_path = $_SERVER['DOCUMENT_ROOT'].$_ENV['USER_PHOTOS_DIR'].'/'.'user'.$id;
        try {
            $photo = $this->fileUpload($pv['photo'], $save_path);
        } catch(Exception $e) {
            return $e->getMessage();
        }
        $user = App_users::find($id);
        if ($user) {
            $user->photo = $photo;
            $user->save();
        } else {
            return 'err no user';
        }
        return 'ok';
    }

    private function user_get_photo($id, $params)
    {
    	$user = App_users::find($id);
    	return $user?$_SERVER['HTTP_HOST'].'/'.$_ENV['USER_PHOTOS_DIR'].'/'.$user->photo:'error';
    }

    private function user_add_descr($id, $params)
    {
    	$pv = $this->getParamVals($params);
    	$user = App_users::find($id);
    	if ($user) {
    		$user->description = $pv['descr'];
    		$user->save();
    		return 'ok';
    	} else {
    		return 'error';
    	}
    }

    private function user_get_descr($id, $params) {
    	$user = App_users::find($id);
    	return $user?$user->description:'error';
    }

    
    private function post_create($id, $params) {
        $pv = $this->getParamVals($params);
        $material = new App_materials();
        $material->save();
        return $material->id;
    }

    private function post_add_data($id, $params) {
        $pv = $this->getParamVals($params);
        $material = App_materials::find($id);
        if (!$material) {
            return 'err no post';
        }
        switch($pv['type']) {
            case 'text': {
                $block = new App_blocks();
                $block->type = 'text';
                $block->data = $pv['data'];
                $block->save();
                $material->blocks()->attach($block->id);
                return 'ok';
                break;
            }
            case 'text2': {
                $block = new App_blocks();
                $block->type = 'text2';
                $block->data = $pv['data'];
                $block->save();
                $material->blocks()->attach($block->id);
                break;
            }
            case 'img': {
                $save_path = public_path($_ENV['USER_BLOCKDATA_DIR']).'/'.$id.'/block_img_'.$pv['sort'];
                try {
                    $img = $this->fileUpload($pv['data'], $save_path);
                } catch (Exception $e) {
                    return $e->getMessage();
                }
                $block = new App_blocks();
                $block->type = 'img';
                $block->data = $img;
                $block->save();
                $material->blocks()->attach($block->id);
                break;
            }
        }
    }

    private function post_get_data($id, $params) {
        $pv = $this->getParamVals($params);
        $material = App_materials::find($id);
        if (!$material) {
            return 'err no post';
        }
        switch($pv['type']) {
            case 'text': {
                //TODO добавить сортировку блокам, возвращать по одному
//                return $material->blocks()
                break;
            }
        }
    }

    private function post_set_status($id, $params) {
        $pv = $this->getParamVals($params);
        $material = App_materials::find($id);
        $material->published = $pv['published'];
        $material->save();
        return 'ok';
    }

    private function post_get_status($id, $params) {
        $pv = $this->getParamVals($params);
        $material = App_materials::find($id);
        return $material->published;
    }
    
    private function post_set_author($id, $params) {
        $pv = $this->getParamVals($params);
        $material = App_materials::find($id);
        $material->author = $pv['author_id'];
        $material->save();
        return 'ok';
    }

    private function post_get_author($id, $params) {
        $pv = $this->getParamVals($params);
        $material = App_materials::find($id);
        return $material->author;
    }

    private function post_set_set($id, $param) {
        $pv = $this->getParamVals($params);
        $material = App_materials::find($id);
        $material->set_id = $pv['set_id'];
        $material->save();
        return 'ok';
    }

    private function user_inc_rating($id, $param) {
        $pv = $this->getParamVals($params);
        $user = App_users::find($id);
        $user->rating++;
        $user->save();
        return $user->rating;
    }

    private function user_last_post($id, $param) {
        $pv = $this->getParamVals($params);
        if (isset($pv['set_id'])) {
            $material = App_materials::where('author = '.$id.' AND set_id = '.$pv['set_id']);
        } else {
            $material = App_materials::where('author = '.$id);
        }
        $material->orderBy('created_at', 'desc')->first();
        return $material->id;
    }
    
    // private function action_last($id) {
    //     $data = App_users::orderBy('created_at', 'desc')->first();
    //     return $data?$data->id:'';
    // }

    // private function action_pic($id) {
    //     $data = App_materials::find($id);
    //     return $data?$data->image_url:'';
    // }

    // private function action_text($id) {
    //     $data = App_materials::find($id);
    //     return $data?$data->text:'';
    // }

    // private function action_rang($id) {
    //     $data = App_materials::find($id);
    //     return $data?$data->rating:'';
    // }

    // private function action_author($id) {
    //     $data = App_materials::find($id);
    //     return $data?$data->author:'';
    // }
}