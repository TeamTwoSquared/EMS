<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class custormerEvent extends Model
{
    public $timestamps = false;
    protected $table='customer_events';
    public  $primarykey=['customer_id','event_id'];
}
