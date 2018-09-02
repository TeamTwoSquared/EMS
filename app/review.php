<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class review extends Model
{
  public  $timestamps=false;
  protected  $table='reviewings';
  public  $primarykey=['service_provider_id','service_id','customer_id','review_id'];
}
