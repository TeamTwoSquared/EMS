<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class serviceProviderKeywords extends Model
{
    public $timestamps = false;
   protected $table='service_provider_keywords';
   public  $primarykey=['service_provider_id','keyword'];
}
