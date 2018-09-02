<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class serviceType extends Model
{
    public $timestamps = false;
   protected $table='service_types';
   public  $primarykey=['service_id','type'];
}
