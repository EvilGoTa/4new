<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'second_name', 'alias', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role() {
        return $this->belongsToMany(Role::class, 'user_role');
    }

    public function projects() {
        return $this->hasMany(Project::class);
    }

    public function isAdmin() {
        if (!$this->role()->first()) {
            return 0;
        }

        if ($this->role()->first()->name == 'admin') {
            return 1;
        } else {
            return 0;
        }
    }
}
