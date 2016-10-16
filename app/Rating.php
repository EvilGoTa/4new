<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    public function project() {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
