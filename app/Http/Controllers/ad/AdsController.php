<?php
namespace App\Http\Controllers\ad;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SettingsController;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;
use App\Ad;
use App\SVP;
use App\AdsImage;
use GuzzleHttp\Client;

class AdsController extends Controller
{

    public function svp_index()
    {
        $allAds=Ad::where('service_provider_id', session()->get('svp_id'))->get();
        return view('svp.ads.manage')->with('ads',$allAds);
    }

    public function create()
    {
        return view('svp.ads.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=> 'required'
        ]);

        //Checking Whether files are images
        if($request->hasFile('bottom_ad_images'))
        {
            $allowedfileExtension=['jpg','png','jpeg','gif'];
            $images = $request->file('bottom_ad_images');
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

        if($request->hasFile('right_ad_images'))
        {
            $allowedfileExtension=['jpg','png','jpeg','gif'];
            $images = $request->file('right_ad_images');
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

        if($request->ad_type==1 && $request->content==NULL) return redirect()->back()->with('error','Please Enter Contents for Your Text-Ad');
        //Saving Ad
        $ad=new Ad();
        $ad->title=$request->name;
        $ad->body=$request->content;
        $ad->price = $request->price;
        $ad->service_provider_id=session()->get('svp_id');
        $ad->type = $request->ad_type;
        //Saving Ad position
        if(isset($request->position[1])) $ad->position = 2;
        else if($request->position[0]==0) $ad->position = 0;
        else if($request->position[0]==1) $ad->position = 1;
        $ad->save();

        //Saving Ads images
        if($request->hasFile('bottom_ad_images'))
        {
            $images = $request->file('bottom_ad_images');
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
                $image_resize->resize(600, 300);
                $image_resize->save(public_path('storage/images/ad/'.$fileNameToStore));
                
                //Adding URL to template_images table
                $ad_image = new AdsImage();
                $ad_image->ad_id = $ad->ad_id;
                $ad_image->imgurl = $fileNameToStore;
                $ad_image->position = $ad->position;
                $ad_image->save();
                
            }
        }

        if($request->hasFile('right_ad_images'))
        {
            $images = $request->file('right_ad_images');
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
                $image_resize->resize(600, 300);
                $image_resize->save(public_path('storage/images/ad/'.$fileNameToStore));
                
                //Adding URL to template_images table
                $ad_image = new AdsImage();
                $ad_image->ad_id = $ad->ad_id;
                $ad_image->imgurl = $fileNameToStore;
                $ad_image->position = $ad->position;
                $ad_image->save();
                
            }
        }

        return redirect('/svp/ads')->with('success','Advertisement is Submitted for Approval');


    }

    public static function clickInc($id)
    {
        $ad = Ad::find($id);
        $ad->numberOfclicks = $ad->numberOfclicks + 1;
        $ad->save();
    }

    public static function impressionInc($id)
    {
        $ad = Ad::find($id);
        $ad->impressions = $ad->impressions + 1;
        $ad->save();
    }


    public function edit($id)
    {
        $editAdds=Ad::find($id);
        return view('svp.ads.update')->with('ad',$editAdds);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'=> 'required'
        ]);

        //Checking Whether files are images
        if($request->hasFile('bottom_ad_images'))
        {
            $allowedfileExtension=['jpg','png','jpeg','gif'];
            $images = $request->file('bottom_ad_images');
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

        if($request->hasFile('right_ad_images'))
        {
            $allowedfileExtension=['jpg','png','jpeg','gif'];
            $images = $request->file('right_ad_images');
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

        if($request->ad_type==1 && $request->content==NULL) return redirect()->back()->with('error','Please Enter Contents for Your Text-Ad');
        
        $ad= Ad::find($id);
        
        AdsController::picsDestroy($ad->ad_id);
        
        //Saving Ad
        $ad->title=$request->name;
        $ad->body=$request->content;
        $ad->price = $request->price;
        $ad->type = $request->ad_type;
        $ad->isapprove = 0;
        //Saving Ad position
        if(isset($request->position[1])) $ad->position = 2;
        else if($request->position[0]==0) $ad->position = 0;
        else if($request->position[0]==1) $ad->position = 1;
        $ad->save();

        //Saving Ads images
        if($request->hasFile('bottom_ad_images'))
        {
            $images = $request->file('bottom_ad_images');
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
                $image_resize->resize(600, 300);
                $image_resize->save(public_path('storage/images/ad/'.$fileNameToStore));
                
                //Adding URL to template_images table
                $ad_image = new AdsImage();
                $ad_image->ad_id = $ad->ad_id;
                $ad_image->imgurl = $fileNameToStore;
                $ad_image->position = $ad->position;
                $ad_image->save();
                
            }
        }

        if($request->hasFile('right_ad_images'))
        {
            $images = $request->file('right_ad_images');
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
                $image_resize->resize(400, 200);
                $image_resize->save(public_path('storage/images/ad/'.$fileNameToStore));
                
                //Adding URL to template_images table
                $ad_image = new AdsImage();
                $ad_image->ad_id = $ad->ad_id;
                $ad_image->imgurl = $fileNameToStore;
                $ad_image->position = $ad->position;
                $ad_image->save();
                
            }
        }

        return redirect('/svp/ads')->with('success','Advertisement is Submitted for Approval');


    }

    public function destroy($id)
    {
        $adImages = AdsImage::where('ad_id',$id)->get();
        if(($adImages->count())>0)
        {
            foreach($adImages as $adImage)
            {
                Storage::delete('public/images/ad/'.$adImage->imgurl);
            }
        }
        Ad::where('ad_id',$id)->delete();
        return redirect('/svp/ads');
    }

    public static function picsDestroy($id)
    {
        $adImages = AdsImage::where('ad_id',$id)->get();
        if(($adImages->count())>0)
        {
            foreach($adImages as $adImage)
            {
                Storage::delete('public/images/ad/'.$adImage->imgurl);
            }
        }
        AdsImage::where('ad_id',$id)->delete();
    }

    public function getContent($id)
    {
        $payhere = SettingsController::getPayHereDetails();
        $ad = Ad::find($id);
        $svp = SVP::find($ad->service_provider_id);

        return view('svp.ads.payModalContent')->with('payhere',$payhere)->with('ad',$ad)->with('svp',$svp);
    }

    public function pay_done()
    {
        return redirect('/svp/ads');
    }
    
    public function pay_cancel()
    {
        return redirect('/svp/ads');
    }

    public function pay_notify(Request $request)
    {
        $merchant_id = $request->merchant_id;
        $order_id = $request->order_id;
        $payhere_amount = $request->payhere_amount;
        $payhere_currency = $request->payhere_currency;
        $status_code = $request->status_code;
        $md5sig = $request->md5sig;

        $payhere = SettingsController::getPayHereDetails();
        $ad = Ad::find($order_id);

        $merchant_secret = $payhere->merchant_secret;

        $local_md5sig = strtoupper (md5 ( $merchant_id . $order_id . $payhere_amount . $payhere_currency . $status_code . strtoupper(md5($merchant_secret)) ) );

        if (($local_md5sig === $md5sig) && ($status_code == 2))//Success
        {
            $ad->isapprove = 1;
            $ad->last_payment_id = $request->payment_id;
            $ad->last_payment_date = date("Y/m/d");
            $ad->save;
        }

        else if (($local_md5sig === $md5sig) && ($status_code == 0))//Pending
        {
            $ad->isapprove = 3;
            $ad->save;
        }

    }
}