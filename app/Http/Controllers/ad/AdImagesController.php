<?php

namespace App\Http\Controllers\ad;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdsImage;

class AdImagesController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request,$id)//Ad this functionality diractly to AdsController:Store
    {
        // chack file is a image

        if($request->hasFile('images'))
        {
            $allowedfileExtension=['jpg','png','jpeg','gif'];
            $images = $request->file('images');
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

        // save image files

         if($request->hasFile('images'))
         {
             $images = $request->file('images');
             foreach($images as $image)
             {
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
                 $image_resize->resize(265, 350);
                 $image_resize->save(public_path('storage/images/template/' .$fileNameToStore));
                 
                 //Adding URL to template_images table
                 $img=new AdsImage();
                 $img->ad_id=$id;
                 $img->imgurl=$request->adds;
         
                 $img->save();
                 
             }
         }
    }


    public function show($id)
    {
        $ads=AdsImage::where('ad_id',$id)->get();
        $adImages=$ads->imgurl;

        return view('sideAdds\showSideAdds')->with('adImage',$adImages);
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