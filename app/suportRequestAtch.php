<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class suportRequestAtch extends Model
{
    public $timestamps = false;
   protected $table='suport_request_attachements';
   public  $primarykey=['support_request_id','attachement_url'];
}
