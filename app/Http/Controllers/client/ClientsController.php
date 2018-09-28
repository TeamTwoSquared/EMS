<?php

namespace App\Http\Controllers\client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use App\Client;
use App\Http\Controllers\MailController;


class ClientsController extends Controller
{

    public function index()
    {
        return view ('client.index');
    }


    public function register(Request $register)
    {
        $this->validate($request, [
            'username'=>'required',
            'email'=> 'required',
            'password'=> 'required'
        ]);
        
        $_client =Client::where('email',$request->email)->get();
        $_clientSameUser = Client::where('username',$request->username)->get();
    
        if(($_client->count())==0 && ($_clientSameUser->count()==0))
        {
            $client=new Client();
            $client->name=$request->username;
            $client->username=$request->username;
            $client->password=md5($request->password);
            $client->email=$request->email;
            $client->save();
            ClientsController::sendActivationLink($client->customer_id);
            session()->put('new_client',$client->customer_id);
            return redirect('/client/toverify');
            
        }
        else
        {
            if(($_client->count()>0) && ($_clientSameUser->count()>0))
            {
                return redirect('/client/register')->with('error','Both Username & Email are Already Exist, Please Sign In !!');
        
            }
            else if(($_client->count()>0) && ($_clientSameUser->count()==0))
            {
                return redirect('/client/register')->with('error','Your Email Address is Already Exist, Please Sign In !!');
            }
            else if (($_client->count()==0) && ($_clientSameUser->count()>0))
            {
                return redirect('/client/register')->with('error','Selected Username is Already Exist, Please Try Another !!');
            }
        }

        
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
        
        $client = Client::where('email',$email)->get();
    
        if(($client->count())==0)
        {
            return redirect('/client/login')->with('error','Invalid Email Address');
        }
        else if(($client[0]->password)==$pass)
        {
            session()->put('clientlogged','e86ba6a6ee56b15b9f5982982375b52f');
            session()->put('client_id',$client[0]->customer_id);
            if($client[0]->isverified == 1) 
            {
                return redirect('/client/dash')->with('success','Logged in Successfully');
            }
            else
            {
                return redirect('/client/toverify')->with('error','Your Account is not verified');
            }
        }
        return redirect('/client/login')->with('error','Invalid Password');
    
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

    public static function sendActivationLink($client_id)
    {
        $client=Client::find($client_id);
        //Check already verified
        if($client->isverified==1)
        {
            return redirect('/client/login')->with('error','Your Account is Already Active');
        }
        
        //Generate Activation Link and Add to DB
        else
        {
            $uniqueString =  unique_random('clients', 'activation_link', 40);
            $client->activation_link=$uniqueString;
            $client->save();
            //Send Activation Link
            $client=Client::find($client_id);
            MailController::send_verify(1,$client);
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

    public function isLogout(){
        $client = Client::find(session()->get('customer_id'));
        $client->isonline=0;
        $client->save();
        session()->flush();
        return redirect('/client/login')->with('success','Logged out Succesfully');
    }
}