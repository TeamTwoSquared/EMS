<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TemplateTemp extends Model
{
    public $timestamps = false;
    public $incrementing = false;
    // Table Name
    protected $table = 'template_temps';
   
    // Primary Key
    public $primaryKey = ['template_id'];
}
