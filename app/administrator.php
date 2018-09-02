<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class administrator extends Model
{
   public $timestamps=false;
   protected $table='admin';
   public  $primarykey='admin_id';
}
