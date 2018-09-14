<?php

namespace App\Http\Controllers\svp;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use App\SVP;


class SVPsController extends Controller
{
    public function index(){
        return view ('svp.index');
    }
    public function register(Request $request)
    {
        $this->validate($request, [
            'username'=>'required',
            'email'=> 'required',
            'password'=> 'required'
        ]);
        
        $_svp =SVP::where('email',$request->email)->get();
        $_svpSameUser = SVP::where('username',$request->username)->get();
    
        if(($_svp->count())==0 && ($_svpSameUser->count()==0))
        {
            $svp=new SVP();
            $svp->name=$request->username;
            $svp->username=$request->username;
            $svp->password=md5($request->password);
            $svp->email=$request->email;
            $svp->save();
            SVPsController::sendActivationLink($svp->service_provider_id);
            //need to implement more verify email part
            return redirect('/svp/toverify');
            
        }
        else
        {
            if(($_svp->count()>0) && ($_svpSameUser->count()>0))
            {
                return redirect('/svp/register')->with('error','Both Username & Email are Already Exist, Please Sign In !!');
        
            }
            else if(($_svp->count()>0) && ($_svpSameUser->count()==0))
            {
                return redirect('/svp/register')->with('error','Your Email Address is Already Exist, Please Sign In !!');
            }
            else if (($_svp->count()==0) && ($_svpSameUser->count()>0))
            {
                return redirect('/svp/register')->with('error','Selected Username is Already Exist, Please Try Another !!');
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
        $svp = SVP::find(session()->get('svp_id'));
        if($svp->profilepic=='noimage.jpg')
        { 
            $svp->profilepic=$fileNameToStore;
            $svp->save();
            return redirect('/svp/profile')->with('success','Profile Image Updated');
        }
        else
        {
            // Delete Image
            Storage::delete('public/images/profile/'.$svp->profilepic);
            $svp->profilepic=$fileNameToStore;
            $svp->save();
            return redirect('/svp/profile')->with('success','Profile Image Updated');
        }
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