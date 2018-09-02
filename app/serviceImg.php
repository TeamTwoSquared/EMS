<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class serviceImg extends Model
{
  public  $timestamps=false;
  protected  $table='service_images';
  public  $primarykey=['service_id','imgurl'];
}
