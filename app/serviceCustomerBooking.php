<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class serviceCustomerBooking extends Model
{
  public  $timestamps=false;
  protected  $table='service_customer_bookings';
  public  $primarykey=['service_id','customer_id','booking_id'];
}
