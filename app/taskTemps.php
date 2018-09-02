<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class taskTemps extends Model
{
    public $timestamps = false;
   protected $table='task_temps';
   public  $primarykey='task_id';
}
