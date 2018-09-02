<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class serviceLocation extends Model
{
  public  $timestamps=false;
  protected  $table='service_locations';
  public  $primarykey=['service_id','location'];
}
