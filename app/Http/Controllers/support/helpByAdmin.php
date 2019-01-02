<?php

namespace App\Http\Controllers\support;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notification;
use App\SupportRequest;
use App\SupportRequestAttachement;
use Illuminate\Support\Facades\DB;
use App\Client;
use App\helpModel;
use App\helpAndCommentModel;

class helpByAdmin extends Controller
{
    public function index(){
        $newHelpRequest = DB::table('notifications')->where('is_read',0)->where('type',1)->get();
        return view('admin.client.supportByAdmin')->with('notfication_title',$newHelpRequest);;
    }

    public function show($id){
        
        $notificationInfo=Notification::where('notification_id',$id)->get();
       // dd($notificationInfo[0]->support_request_id);
        
        $helpInfo=SupportRequest::where('support_request_id',$notificationInfo[0]->support_request_id)->get();
     //  dd($helpInfo[0]->request);

        // get customer infomation

        $customerInfo=Client::where('customer_id',$helpInfo[0]->customer_id)->get();
    //    dd($customerInfo[0]->profilepic);

        $issueType=DB::table('support_request_type')->where('type_id',$helpInfo[0]->type_id)->get();
       // dd($issueType[0]->type);

       $issueImg=SupportRequestAttachement::where('support_request_id',$notificationInfo[0]->support_request_id)->get();
       // dd($issueImg);

       $comment=DB::table('help_and_comment')->where('support_request_id',$notificationInfo[0]->support_request_id)->get();
      //dd($comment);

        return view('admin.client.helpRequest')->with('help_info',$helpInfo)->with('customer_info',$customerInfo)->with('issue_type',$issueType)->with('issue_image',$issueImg)->with("_comment",$comment);
    }

    public function store(){
        dd($request);

    }
}
