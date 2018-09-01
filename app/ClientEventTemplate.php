<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientEventTemplate extends Model
{
    public $timestamps = false;
    public $incrementing = false;
    // Table Name
    protected $table = 'customer_event_templates';
   
    // Primary Key
    public $primaryKey = ['customer_id','event_id','template_id'];
}
