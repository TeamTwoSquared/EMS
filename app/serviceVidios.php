<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class serviceVidios extends Model
{
    public $timestamps = false;
   protected $table='service_videos';
   public  $primarykey=['service_id','videourl'];
}
