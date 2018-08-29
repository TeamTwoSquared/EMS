<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;

class AccountsController extends Controller
{
    public function index(){
        return view ('admin.index');
    }

    public function authenticate(Request $request)
    {
        $this->validate($request, [
            'email'=> 'required',
            'password'=> 'required'
        ]);
        
        
        $email = $request->email;
        $pass = $request->password;
        $pass = md5($pass);
        
        $admin = Admin::where('email',$email)->get();
    
        if(($admin->count())==0)
        {
            return redirect('/admin/login')->with('error','Invalid Email Address');
        }
        else if(($admin[0]->password)==$pass)
        { 
            session()->put('adminlogged','e86ba6a6ee56b15b9f5982982375b52f');
            session()->put('admin_id',$admin[0]->admin_id);

            return redirect('/admin/dash')->with('success','Logged in Successfully');
        }
        return redirect('/admin/login')->with('error','Invalid Password');
    
    }

    public static function checkLogged($islogin)//islogin means is the method is called from admin.login page
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

    public static function getAdmin()
    {
        $admin = Admin::where('admin_id', session()->get('admin_id'))->get();
       return $admin[0];
    }

    public function save_profile(Request $request)
    {
        $this->validate($request, [
            'username'=> 'required',
            'email'=> 'required'
        ]);
        
        $admin = Admin::find(session()->get('admin_id'));
        $admin->username=$request->input('username');
        $admin->email=$request->input('email');
        $admin->save();
        return redirect('/admin/profile')->with('success','Profile Updated');

    }

    public function change_img(Request $requests)
    {

    }
    


}//end of class
