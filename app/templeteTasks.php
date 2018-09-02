<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class templeteTasks extends Model
{
    public $timestamps = false;
   protected $table='template_tasks';
   public  $primarykey=['template_id','task_id'];
}
