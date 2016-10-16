<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class App_sets extends Model
{
    //
    protected $table = 'app_sets';

    public function users() {
        return $this->belongsToMany(App_users::class, 'app_user_set');
    }
}
