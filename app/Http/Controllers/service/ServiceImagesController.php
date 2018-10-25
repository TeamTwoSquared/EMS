<?php

namespace App\Http\Controllers\service;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ServiceImage;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;


class ServiceImagesController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public static function store2($request,$id)
    {/*
        //dd($request->profile_image);
        if($request->hasFile('profile_image'))
        {
            $allowedfileExtension=['jpg','png','jpeg','gif'];
            $images = $request->file('profile_image');
            foreach($images as $image)
            {
                $extension = $image->getClientOriginalExtension();
                $check=in_array($extension,$allowedfileExtension);
                if(!$check)
                {
                    return redirect()->back()->with('error','Please Upload Image File(s)');
                }
            }
        }
*/
        // save image files

         if($request != null)
         {

            // $images = $request;
             for($i=0; $i<count($request);$i++)
             {
                 $image = $request[$i];
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
                 
                 $serviceImg=new ServiceImage();
                // return "123";
                 $serviceImg->service_id=$id;
                 $serviceImg->imgurl=$fileNameToStore;
         
                 $serviceImg->save();
            
            }
        }
        
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
}