<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 28.06.2016
 * Time: 22:32
 */

namespace App\Http\Controllers;


use App\App_models\App_materials;
use App\App_models\App_users;
use Symfony\Component\HttpFoundation\Response;

class AppServerController extends Controller
{
    protected $allowed_actions = [
        'last', 'pic', 'text', 'rang', 'author'
    ];

    public function index($action, $id)
    {
        if (in_array($action, $this->allowed_actions) !== false) {
            $method = "action_{$action}";
            return $this->{$method}($id);
        }
    }

    private function action_last($id) {
        $data = App_users::orderBy('created_at', 'desc')->first();
        return $data?$data->id:'';
    }

    private function action_pic($id) {
        $data = App_materials::find($id);
        return $data?$data->image_url:'';
    }

    private function action_text($id) {
        $data = App_materials::find($id);
        return $data?$data->text:'';
    }

    private function action_rang($id) {
        $data = App_materials::find($id);
        return $data?$data->rating:'';
    }

    private function action_author($id) {
        $data = App_materials::find($id);
        return $data?$data->author:'';
    }
}