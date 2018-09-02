<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chat extends Model
{
  public  $timestamps=false;
  protected  $table='chats';
  public  $primarykey='chat_id';
}
