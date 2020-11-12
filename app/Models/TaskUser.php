<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TaskUser extends Pivot
{
    use HasFactory;
    
    public function user()
    {
        return $this->belongsTo('App\Models\User')->withPivot('user_id');
    }
    
    public function task()
    {
        return $this->belongsTo('App\Models\Task')->withPivot('task_id');
    }
}

