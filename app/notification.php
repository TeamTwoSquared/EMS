<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class notification extends Model
{
  public  $timestamps=false;
  protected  $table='notifications';
  public  $primarykey='notification_id';
}
