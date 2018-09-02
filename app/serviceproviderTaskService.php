<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class serviceproviderTaskService extends Model
{
  public  $timestamps=false;
  protected  $table='serviceprovider_task_services';
  public  $primarykey=['service_provider_id','task_id','service_id'];
}
