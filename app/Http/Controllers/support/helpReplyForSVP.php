<?php

namespace App\Http\Controllers\support;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\SupportRequest;
use App\SupportRequestAttachement;
use App\helpModel;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use App\Notification;

class helpReplyForSVP extends Controller
{
    public function index(){
        return view('admin.client.supportConditionsForSVP');
    
    }

    public function create(){
        return view('admin.client.supportForSVP');
       // return view('svp.test');
    }

    public function store(Request $request){
        
       //   dd(session()->get('svp_id'));
              
        $help=new SupportRequest();
        $help->request=$request->description;
        $help->service_provider_id=session()->get('svp_id');
        $typeid = DB::table('support_request_type')->where('type', $request->issue_type)->value('type_id');
        $help->type_id=$typeid;
        $help->from_whome=3;
        $help->save();
        
        if($request->issue_image != null)
        {  
            for($i=0; $i<count($request->issue_image);$i++)
            {
                $image = $request->issue_image[$i];
                // Get filename with the extension
                $filenameWithExt = $image->getClientOriginalName();
                // Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $image->getClientOriginalExtension();
                
                // Filename to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                // Upload 
                $image_up = $image;
                $image_resize = Image::make($image->getRealPath());              
                $image_resize->resize(460, 310);
                $image_resize->save(public_path('storage/images/services/' .$fileNameToStore));
                
                //Adding URL to template_images table
                
                $supportImg=new SupportRequestAttachement();
                $supportImg->support_request_id=$help->support_request_id;
                $supportImg->attachement_url=$fileNameToStore;
                $supportImg->type_id=$typeid;
        
                $supportImg->save();
            }
        }

        // sending notification..
        
        $notification=new Notification();
        $svpName = DB::table('service_providers')->where('service_provider_id',session()->get('svp_id'))->value('name');
       // dd(session()->get('service_provider_id'));
        $notification->notification=("You Have A Support Request From Your Service Provider ".$svpName);
        $notification->support_request_id=$help->support_request_id;
        $notification->type=1;
        $notification->to_whome=1;
        $notification->from_whome=3;
        $notification->service_provider_id=session()->get('svp_id');
        $notification->save();
        return redirect('/svp/dash')->with('success','Successfully submited the help request !' );

    }
}
