<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class isEvent extends Model
{
  public  $timestamps=false;
  protected  $table='events';
  public  $primarykey='event_id';
}
