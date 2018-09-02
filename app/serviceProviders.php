<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AddSvpModel extends Authenticatable
{
   public $timestamps = false;
   protected $table='service_providers';
   public  $primarykey='service_provider_id';
}

?>