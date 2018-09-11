<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientTemplateTask extends Model
{
    public $timestamps = false;
    public $incrementing = false;
    // Table Name
    protected $table = 'customer_template_tasks';
   
    // Primary Key
    public $primaryKey = ['customer_id','template_id','task_id'];
}
