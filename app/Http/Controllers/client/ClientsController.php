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
    public function change_img(Request $request)
    {
        //validation
        $this->validate($request, 
        [
            'profile_image'=>'required|image|max:1999'
        ]);

         // Handle File Upload
         if($request->hasFile('profile_image'))
         {
            // Get filename with the extension
            $filenameWithExt = $request->file('profile_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('profile_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload 
            $image       = $request->file('profile_image');
            //$path = $request->file('profile_image')->storeAs('public/images/profile', $fileNameToStore);
            $image_resize = Image::make($image->getRealPath());              
            $image_resize->resize(100, 100);
            $image_resize->save(public_path('storage/images/profile/' .$fileNameToStore));
       
        }

        //Adding new pic to DB
        $client = Client::find(session()->get('customer_id'));
        if($client->profilepic=='noimage.jpg')
        { 
            $client->profilepic=$fileNameToStore;
            $client->save();
            return redirect('/client/profile')->with('success','Profile Image Updated');
        }
        else
        {
            // Delete Image
            Storage::delete('public/images/profile/'.$client->profilepic);
            $client->profilepic=$fileNameToStore;
            $client->save();
            return redirect('/client/profile')->with('success','Profile Image Updated');
        }
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

    public function logout(){
        $client = Client::find(session()->get('customer_id'));
        $client->isonline=0;
        $client->save();
        session()->flush();
        return redirect('/client/login')->with('success','Logged out Succesfully');
    }
}