<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class serviceKeywords extends Model
{
  public  $timestamps=false;
  protected  $table='service_keywords';
  public  $primarykey=['service_id','keyword'];
}
