<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ratings extends Model
{
  public  $timestamps=false;
  protected  $table='reviews';
  public  $primarykey='review_id';
}
