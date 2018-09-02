<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class custormerEventTemplate extends Model
{
    public $timestamps = false;
    protected $table='customer_event_templates';
    public  $primarykey=['customer_id','event_id','template_id'];
}
