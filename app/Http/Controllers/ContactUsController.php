<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ContactUs;
use App\Http\Controllers\MailController;

class ContactUsController extends Controller
{
    public function index()
    {
        return view('contactus');
    }

    //store feedback data in the DB
    public function store(Request $request)
    {
        //dd($request);
        $this->validate($request, [
            'name'=>'required',
            'email'=> 'required',
            'phone'=> 'required',
            'message'=> 'required'
        ]);

        $contactus = new ContactUs();

        $contactus->Name = $request->name;
        $contactus->Email = $request->email;
        $contactus->Phone = $request->phone;
        $contactus->Message = $request->message;
        $contactus->save();
        return redirect('/contactus')->with('success','Feedback sent!');
    }
}    
