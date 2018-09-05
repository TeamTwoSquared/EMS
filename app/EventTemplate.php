<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventTemplate extends Model
{
    public $timestamps = false;
    public $incrementing = false;
    // Table Name
    protected $table = 'event_templates';
   
    // Primary Key
    public $primaryKey = ['event_id','template_id'];
}
