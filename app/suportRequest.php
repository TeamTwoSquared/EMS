<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class suportRequest extends Model
{
    public $timestamps = false;
   protected $table='support_requests';
   public  $primarykey='support_request_id';
}
