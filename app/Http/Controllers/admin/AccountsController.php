<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountsController extends Controller
{
    public function authenticate(Request $request)
    {
        $this->validate($request, [
            'email'=> 'required',
            'password'=> 'required'
        ]);
        

        $email = $request->email;
        $pass = $request->password;
        $pass = md5($pass);

        if($email=='sajunsandaruwan@gmail.com' && $pass=='43c7ccde32edd2953c918c3e0c60578b')
        {
            session()->put('adminlogged','e86ba6a6ee56b15b9f5982982375b52f');
            return redirect('/admin/dash')->with('success','Logged in Successfully');
        }
        return redirect('/admin/login')->with('error','Invalid Email or Password');
    }

    public static function checklogged($islogin)//islogin means is the method is called from admin.login page
    {
        $mysession = session()->get('adminlogged','null');
        if($mysession != 'e86ba6a6ee56b15b9f5982982375b52f' && !$islogin)
        {
            session()->flash('error','Session Expired, Please Login');
            return false;
        }
        else if($mysession != 'e86ba6a6ee56b15b9f5982982375b52f' && $islogin)
        {
            return false;
        }
        return true;
    }

}//end of class
