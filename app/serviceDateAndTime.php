<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class serviceDateAndTyme extends Model
{
  public  $timestamps=false;
  protected  $table='service_daytimes';
  public  $primarykey=['service_id','day','stime','etime'];
}
