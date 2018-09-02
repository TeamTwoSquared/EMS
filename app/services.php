<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class services extends Model
{
  public  $timestamps=false;
  protected  $table='services';
  public  $primarykey='service_id';
}
