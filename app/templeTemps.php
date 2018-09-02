<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class templeTemps extends Model
{
    public $timestamps = false;
   protected $table='template_temps';
   public  $primarykey=['template_id'];
}
