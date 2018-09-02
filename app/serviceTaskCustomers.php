<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class serviceTaskCustomers extends Model
{
    public $timestamps = false;
   protected $table='service_task_customers';
   public  $primarykey=['service_id','task_id','customer_id'];
}
