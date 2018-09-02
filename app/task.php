<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    public $timestamps = false;
   protected $table='tasks';
   public  $primarykey='task_id';
}
