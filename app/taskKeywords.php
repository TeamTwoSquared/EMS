<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class taskKeywords extends Model
{
    public $timestamps = false;
   protected $table='task_keywords';
   public  $primarykey=['task_id','keyword'];
}
