<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
  public  $timestamps=false;
  protected  $table='payments';
  public  $primarykey='payment_id';
}
