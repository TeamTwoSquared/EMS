<?php

namespace App\Http\Controllers\client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Client;

class ClientsController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
    public function save_profile(Request $request){
        $client = Client::find(session()->get('customer_id'));
        //Changing Passwords
        //if($request->oldpassword != null && $request->newpassword != null && $request->newpasswordagain != null)
        if($request->oldpassword && $request->newpassword && $request->newpasswordagain)
        {
            $oldpasswordDB=$client->password;
            $oldpassword=md5($request->oldpassword);
            
            $newpassword=md5($request->newpassword);
            $newpasswordagain=md5($request->newpasswordagain);
        
            if($oldpasswordDB==$oldpassword )
            {
                if($newpassword==$newpasswordagain)
                {
                        $client->password=md5($request->newpasswordagain);
                        $client->name = $request->name;
                        $client->address=$request->address;
                        $client->address2=$request->address2;
                        $client->city=$request->city;
                        $client->save();
                        return redirect('/client/profile')->with('success','Profile Updated');
                }
                else
                {
                    return redirect('/client/profile')->with('error','Incorrect New Password Confirmation');
                }    
            }
            else
            {
                return redirect('/client/profile')->with('error','Incorrect Old Password');
            }
            
        }
        else if(!$request->oldpassword && !$request->newpassword && !$request->newpasswordagain)
        {
            $client->name = $request->name;
            $client->address=$request->address;
            $client->address2=$request->address2;
            $client->city=$request->city;
            $client->save();
            return redirect('/client/profile')->with('success','Profile Updated');
        }
        else
        {
            return redirect('/client/profile')->with('error','All 3 Fields, Old Password, New Password and Confirmation Password Are Needed');
        }
       
   }

    public function isOnline($id){
        $client=Client::where('customer_id',$id)->get();
        if($client[0]->isonline == 1){
            return "Active Now";
        }
        else{
            return " Off line";
        }
    }

    public function isLogout(){
        $client = Client::find(session()->get('customer_id'));
        $client->isonline=0;
        $client->save();
        session()->flush();
        return redirect('/client/login')->with('success','Logged out Succesfully');
    }
}