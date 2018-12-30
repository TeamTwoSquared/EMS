<?php

namespace App\Http\Controllers\service\packageService;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ServicePackage;
use App\PackageKeyword;
use App\PackageLocation;
use App\PackageType;
use App\ServiceKeyword;

class packageServiceController extends Controller
{
    public function index(){
        $packageInfo = ServicePackage::where('service_provider_id',session()->get('svp_id'))->get();
        return view('svp.package')->with('packageService',$packageInfo);
    }

    public function create(){
        return view('svp.addPackage');
    }

    public function store(Request $request){

        $exsistingServicePackage = ServicePackage::where('name',$request->name)->get();
        
        if(count($exsistingServicePackage) != 0){
            return redirect('/svp/packageService')->with('error','This service package is alrady exist !');
        }

        else{
            $servicePack = new ServicePackage();
            $servicePack->name = $request->name;
            $servicePack->price = $request->price;
            $servicePack->description = $request->description;
            $servicePack->service_provider_id=session()->get('svp_id');

            if($request->Package_image != null)
            {  
           
                 $image = $request->Package_image;
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
                 
                 $servicePack->imgurl=$fileNameToStore;   
             }

             if($request->package_video_url != null){
                 $servicePack->videourl=$request->package_video_url;
             }

             $servicePack->save();

             // uploading keywords..

            $this->uploadingKeywords($request,$servicePack->package_id);
            $this->uploadingTypes($request,$servicePack->package_id);
            $this->uploadingLocations($request,$servicePack->package_id);
    
            return redirect('/svp/packageService')->with('success','Successfully registered new service package !');
        }
    }

    public static function uploadingKeywords(Request $request,$id){
        
        for($i=1;$i<7;$i++) {
            $a="keyword";
            $a =$a.$i;
        
            if(($request->$a) != null){
                        $key = new PackageKeyword();
                        $a="keyword";
                        $a =$a.$i;
                        $key->package_id = $id;
                        $key->keyword = $request->$a;
                        $key->save();
            }
        }
    }

    public function uploadingLocations(Request $request , $id){
        for($i=7;$i<13;$i++) {
            $a="location";
            $a =$a.$i;
            if(($request->$a) != null){   
                $loc = new PackageLocation();
                $a="location";
                $a =$a.$i;
                $loc->package_id = $id;
                $loc->location= $request->$a;
                $loc->save();
            }
        }
    }

    public function uploadingTypes(Request $request,$id){

        for($i=13;$i<19;$i++) {
            $a="type";
            $a =$a.$i;
            if(($request->$a) != null){
                $types = new PackageType();
                $a="type";
                $a =$a.$i;
                $types->package_id = $id;
                $types->type= $request->$a;
                $types->save();
            }
        }    
    }


    public function show($package_id){
        return view('svp.viewPackage');
    }
}
