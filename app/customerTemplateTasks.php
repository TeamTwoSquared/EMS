<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customerTemplateTasks extends Model
{
  public  $timestamps=false;
  protected  $table='customer_template_tasks';
  public  $primarykey=['customer_id','template_id','task_id'];
}
