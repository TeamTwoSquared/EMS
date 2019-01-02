<?php

namespace App\Http\Controllers\support;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notification;
use Illuminate\Support\Facades\DB;

class helpByAdmin extends Controller
{
    public function index(){
        $newHelpRequest = DB::table('notifications')->where('is_read',0)->where('type',1)->get();
        return view('admin.client.supportByAdmin')->with('notfication_title',$newHelpRequest);;
    }

    public function show($id){

        return view('admin.client.helpRequest');
    }
}
