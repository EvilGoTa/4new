<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 31.01.2016
 * Time: 12:43
 */

namespace App\Repositories;

use App\User;
use App\Project;

class ProjectRepository
{
    /**
     * @param User $user
     * @return collection
     */
    public function forUser(User $user) {
        return Project::where('user_id', $user->id)->orderBy('created_at', 'asc')->get();
    }
}