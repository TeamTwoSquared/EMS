<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chatWithCustormers extends Model
{
   public $timestamps = false;
   protected $table='chatting_customers';
   public  $primarykey=['customer_id','chat_id','customer_id2'];
}
