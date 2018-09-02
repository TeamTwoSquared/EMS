<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class eventTemp extends Model
{
  public  $timestamps=false;
  protected  $table='event_temps';
  public  $primarykey='event_id';
}
