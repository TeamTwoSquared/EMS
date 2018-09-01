<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskTemp extends Model
{
    public $timestamps = false;
    public $incrementing = false;
    // Table Name
    protected $table = 'task_temps';
   
    // Primary Key
    public $primaryKey = ['task_id'];
}
