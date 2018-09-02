<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class serviceProviderTel extends Model
{
    public $timestamps = false;
   protected $table='service_provider_tels';
   public  $primarykey=['service_provider_id','tel'];
}
