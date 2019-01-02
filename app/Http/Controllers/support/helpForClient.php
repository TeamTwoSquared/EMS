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

class helpForClient extends Controller
{
    public function index(){
        return view('admin.client.supportConditions');
    
    }

    public function create(){
        return view('admin.client.supportForClient');
       // return view('svp.test');
    }

    public function store(Request $request){
        if(($request->issue_type) == 'Service Provider Issue'){
            if(($request->svp_id) == null){
                return redirect('/client/getSupport')->with('error','Help Request Sendding Failed ! ( Service Provider ID must be include )');
            }
            else{
              
                $help=new SupportRequest();
                $help->request=$request->description;
                $help->customer_id=session()->get('customer_id');
                $help->service_provider_id=$request->svp_id;
                $typeid = DB::table('support_request_type')->where('type', $request->issue_type)->value('type_id');
                $help->type_id=$typeid;
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
                $notification=new Notification();
                $customerName = DB::table('customers')->where('customer_id',session()->get('customer_id'))->value('name');
                $notification->notification=("You Have A Support Request From Your Client ".$customerName);
                $notification->support_request_id=$help->support_request_id;
                $notification->type=1;
                $notification->to_whome=1;
                $notification->save();
                return redirect('/client/dash')->with('success','Successfully submited the help request !' );
            }
        }
        else{
            if(($request->svp_id) != null){
                return redirect('/client/getSupport')->with('error','Help Request Sendding Failed ! (No Need Service Provider ID)' );

            }
            else{
                $help=new SupportRequest();
                $help->request=$request->description;
                $help->customer_id=session()->get('customer_id');
                $typeid = DB::table('support_request_type')->where('type', $request->issue_type)->value('type_id');
                $help->type_id=$typeid;
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
                $notification=new Notification();
                $customerName = DB::table('customers')->where('customer_id',session()->get('customer_id'))->value('name');
                $notification->notification=("You Have A Support Request From Your Client ".$customerName);
                $notification->support_request_id=$help->support_request_id;
                $notification->type=1;
                $notification->to_whome=1;
                $notification->save();
                return redirect('/client/dash')->with('success','Successfully submited the help request !' );
            }
        }
    }

}

