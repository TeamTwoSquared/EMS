<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customerTaskPayment extends Model
{
    public $timestamps = false;
    protected $table='customer_task_payments';
    public  $primarykey=['customer_id','payment_id','service_id','service_provider_id','task_id'];
}
