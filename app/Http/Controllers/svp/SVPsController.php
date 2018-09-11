<?php

namespace App\Http\Controllers\svp;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SVP;

class SVPsController extends Controller
{
    public function index(){
        return view ('svp.index');
    }
    public function register(Request $request)
    {
        $svp=new SVP();
        $svp->name=$request->username;
        $svp->username=$request->username;
        $svp->password=md5($request->password);
        $svp->email=$request->email;
        $svp->save();
        SVPsController::sendActivationLink($svp->service_provider_id);
        //need to implement more verify email part
        return redirect('/svp/toverify')->with('success','Please verify you account before login');
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
        
        $svp = SVP::where('email',$email)->get();
    
        if(($svp->count())==0)
        {
            return redirect('/svp/login')->with('error','Invalid Email Address');
        }
        else if(($svp[0]->password)==$pass)
        {
            session()->put('svplogged','e86ba6a6ee56b15b9f5982982375b52f');
            session()->put('svp_id',$svp[0]->service_provider_id);
            if($svp[0]->isverified == 1) 
            {
            return redirect('/svp/dash')->with('success','Logged in Successfully');
            }
            else
            {
                return redirect('/svp/toverify')->with('error','Your Account is not verified');
            }
        }
        return redirect('/svp/login')->with('error','Invalid Password');
    
    }
    public static function checkLogged($islogin)//islogin means is the method is called from svp.login page
    {
        $mysession = session()->get('svplogged','null');
        if($mysession != 'e86ba6a6ee56b15b9f5982982375b52f' && !$islogin)
        {
            session()->flash('error','Session Expired, Please Login');
            return false;
        }
        else if($mysession != 'e86ba6a6ee56b15b9f5982982375b52f' && $islogin)
        {
            return false;
        }
        $svp=SVPsController::getSVP();
        if($svp->isverified==1){
            return true;
        }
        return false;
    }
    public static function getSVP()
    {
        $svp = SVP::where('service_provider_id', session()->get('svp_id'))->get();
        return $svp[0];
    }
    public static function sendActivationLink($svp_id)
    {
        $svp=SVP::find($svp_id);
        //Check already verified
        if($svp->isverified==1)
        {
            return redirect('/svp/login')->with('error','Your Account is Already Active');
        }
        
        //Generate Activation Link and Add to DB
        else
        {
            $uniqueString =  unique_random('service_providers', 'activation_link', 40);
            $svp->activation_link=$uniqueString;
            $svp->save();
        }
        //Send Activation Link
        
    }
}//end of class