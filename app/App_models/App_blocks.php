<?php

namespace App\App_models;

use Illuminate\Database\Eloquent\Model;

class App_blocks extends Model
{
    //
    protected $table = 'app_blocks';

    public function materials() {
        return $this->belongsToMany(App_materials::class, 'app_material_block');
    }
}
