<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class siteFees extends Model
{
    public $timestamps = false;
   protected $table='site_fees';
   public  $primarykey='site_fee_id';
}
