<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    public function attachments(){
        return $this->hasMany('App\Models\Attachment');
    }

    public function boards(){
        return $this->belongsToMany('App\Models\Board');
    }
    public function board_user(){
        return $this->belongsToMany('App\Models\BoardUser');
    }
    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }

    public function task_user(){
        return $this->belongsToMany('App\Models\TaskUser');
    }
    public function allTasks(){
        User::find('task_id')->count();
    }

    public function assignedTasks(){
        return $this->belongsToMany('App\Models\User', 'task_user')
        -> using('App\Models\TaskUser')
        ->wherePivot('assigned','=',true)
        ->withPivot('assigned');
    }

    public function ownedBoards(){
        return $this->belongsToMany('App\Models\User', 'board_user')
        -> using('App\Models\BoardUser')
        ->wherePivot('assigned','=',true)
        ->withPivot('owner');
    }
}
