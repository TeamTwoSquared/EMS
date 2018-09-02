<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
   public $timestamps=false;
   protected $table='bookings';
   public $primarykey='booking_id';
}
