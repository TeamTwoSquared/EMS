<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventTemp extends Model
{
    public $timestamps = false;
    public $incrementing = false;
    // Table Name
    protected $table = 'event_temps';
   
    // Primary Key
    public $primaryKey = 'event_id';
}
