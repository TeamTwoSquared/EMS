<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chatting extends Model
{
    public $timestamps = false;
    protected $table='chatting';
    public  $primarykey=['service_provider_id','customer_id','chat_id'];
}
