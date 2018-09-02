<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class serviceProviderBookingService extends Model
{
  public  $timestamps=false;
  protected  $table='serviceprovider_booking_services';
  public  $primarykey=['service_provider_id','booking_id','service_id'];
}
