<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class eventTemplates extends Model
{
  public  $timestamps=false;
  protected  $table='event_templates';
  public  $primarykey=['event_id','template_id'];
}
