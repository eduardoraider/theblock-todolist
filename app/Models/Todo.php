<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{

    protected $table = 'todolist';

    protected $fillable = [
        'id',
        'task',
        'status',
    ];

}
