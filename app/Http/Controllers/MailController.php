<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\VerifyEmail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send()
    {
        $objVerify = new \stdClass();
        $objVerify->verify_one = 'Demo One Value';
        $objVerify->verify_two = 'Demo Two Value';
        $objVerify->sender = 'SenderUserName';
        $objVerify->receiver = 'ReceiverUserName';
 
        Mail::to("wemssandaruwan@gmail.com")->send(new VerifyEmail($objVerify));
    }
}
