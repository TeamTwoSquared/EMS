<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\VerifyEmail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send_verify($isSVP,$reciever)
    {
        if ($isSVP == 1)
        {
            $objVerify = new \stdClass();
            $objVerify->identity = 'SVPVerification';
            $objVerify->id = $reciever->service_provider_id;
            $objVerify->verifyLink = $reciever->activation_link;
            Mail::to($reciever->email)->send(new VerifyEmail($objVerify));
        }
        else
        {
            $objVerify = new \stdClass();
            $objVerify->identity = 'CLVerification';
            $objVerify->reciever = $reciever;
            Mail::to($reciever->email)->send(new VerifyEmail($objVerify));
        }
    }
}
