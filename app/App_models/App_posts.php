<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 10.08.2016
 * Time: 22:19
 */

namespace App\App_models;

use Illuminate\Database\Eloquent\Model;

class App_posts extends Model
{
    protected $table = 'app_blocks';

    public function material() {
        return $this->belongsToMany(App_materials::class, 'app_material_block');
    }
}