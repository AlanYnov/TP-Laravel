<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany('App\Models\User')->using('App\Models\BoardUser')->withPivot(['user_id','board_id']);
    }
    public function board_user()
    {
        return $this->belongTo('App\Models\BoardUser');
    }
    public function tasks()
    {
        return $this->hasMany('App\Models\Task');
    }
}
