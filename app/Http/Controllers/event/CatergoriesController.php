<?php

namespace App\Http\Controllers\event;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;
use App\Catergory;
use App\CatergoryImage;

class CatergoriesController extends Controller
{
    public function admin_index()
    {
        $catergories = Catergory::all();
        return view('admin.event.catergory')->with('catergories',$catergories);
    }


    public function admin_create()
    {
        return view('admin.event.catergory_create');
    }


    public function admin_store(Request $request)
    {
        //Validating submited details
        $this->validate($request, [
            'name'=> 'required',
            'description'=> 'required',
            'catergory_images'=>'nullable|max:1999'
        ]);

        //Checking Whether files are images
        if($request->hasFile('catergory_images'))
        {
            $allowedfileExtension=['jpg','png','jpeg','gif'];
            $images = $request->file('catergory_images');
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

        //Storing an catergory in DB by admin
        $catergory = new catergory();
        $catergory->name =  $request->name;
        $catergory->description =  $request->description;
        $catergory->save();

        //Saving images
        if($request->hasFile('catergory_images'))
        {
            $images = $request->file('catergory_images');
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
                $image_resize->save(public_path('storage/images/catergory/' .$fileNameToStore));
                
                //Adding URL to catergory_images table
                $catergory_image = new CatergoryImage();
                $catergory_image->catergory_id = $catergory->catergory_id;
                $catergory_image->imgurl = $fileNameToStore;
                $catergory_image->save();
                
            }
        }
        //return to catergory
        return redirect('/admin/catergory');

    }


    public function show($id)
    {
        //
    }


    public function admin_edit($id)
    {
        $catergory = (Catergory::where('catergory_id',$id)->get())[0];
        //$catergoryImage=(CatergoryImage::where('catergory_id',$id)->get())[0];
        //return($catergory);
        //return view('admin.event.catergory_update')->with('catergory',$catergory,'catergoryImage',$catergoryImage);
        return view('admin.event.catergory_update')->with('catergory',$catergory);
    }


    public function admin_update(Request $request, $id)
    {
        $this->validate($request, [
            'name'=> 'required',
            'description'=> 'required',
            'catergory_images'=>'nullable|max:1999'
        ]);

        //Checking Whether files are images
        if($request->hasFile('catergory_images'))
        {
            $allowedfileExtension=['jpg','png','jpeg','gif'];
            $images = $request->file('catergory_images');
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

        //Storing an catergory in DB by admin
        $catergory = Catergory::findOrFail($id);
        $catergory->catergory_id=$id;
        $catergory->name =  $request->name;
        $catergory->description =  $request->description;
        $catergory->push();

        //Saving images
        if($request->hasFile('catergory_images'))
        {   
            //delete currently uploaded images
            $catergoryImages=CatergoryImage::where('catergory_id',$id)->get();
            if(($catergoryImages->count())>0)
            {
            foreach($catergoryImages as $catergoryImage)
                {
                    Storage::delete('public/images/catergory/'.$catergoryImage->imgurl);
                }
            }
            //
            $images = $request->file('catergory_images');
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
                $image_resize->save(public_path('storage/images/catergory/' .$fileNameToStore));
                
                //Adding URL to catergory_images table
                $catergory_image = CatergoryImage::findOrFail($id);
                $catergory_image->catergory_id = $id;
                $catergory_image->imgurl = $fileNameToStore;
                $catergory_image->push();
                
            }
        }
        //return to catergory
        return redirect('/admin/catergory');
    }


    public function destroy($id)
    {
        $catergoryImages=CatergoryImage::where('catergory_id',$id)->get();
        if(($catergoryImages->count())>0)
        {
            foreach($catergoryImages as $catergoryImage)
            {
                Storage::delete('public/images/catergory/'.$catergoryImage->imgurl);
            }
        }
        Catergory::where('catergory_id',$id)->delete();        
        return redirect('/admin/catergory');

    }

    public static function getCatergories()
    {
        //Use to return all catergories as an Array
        $catergories = Catergory::all();
        return $catergories;
    }  
}//end of class
