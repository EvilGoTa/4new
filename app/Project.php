<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function rates() {
        return $this->hasMany(Rating::class, 'project_id');
    }
}
