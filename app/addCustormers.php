<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class addCustormers extends Model
{
    public $timestamps = false;
    protected $table='customers';
    public  $primarykey='customer_id';
}
