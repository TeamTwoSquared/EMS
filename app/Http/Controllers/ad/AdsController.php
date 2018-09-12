<?php
namespace App\Http\Controllers\ad;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ad;
use App\AdsImage;


class AdsController extends Controller
{

    public function index($id)
    {
        // get all the adds of particular svp when svp is login..

        $addsInfo=Ad::where('service_provider_id',$id)->get();
         
        // to be display all the adds details on sideAds.

        return view('sideAdds\sideAds')-with('addsInfo',$addsInfo);
    }

    public function create()
    {
        return view('sideAdds\addsForm');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=> 'required',
            'body'=> 'required',
            'service_provider_id'=>'required'
        ]);


        $ad=new Ad();
        $ad->title=$request->title;
        $ad->body=$request->text_body;
        $ad->service_provider_id=$request->id;

        $ad->save();
        AdImagesController::store($ad->ad_id);

        return redirect('/svp/sideAdds')->with('success','Submited Successfully !');

        return redirect('/svp/sideAdds')->with('error','errors');
    }

    public function show($id)
    {
        return view('sideAdds/showSideAdds');
        
    }

    public function edit($id)
    {
        $editAdds=Ad::where('ad_id',$id)->get();
        return view('sideAdds/editSideAdds')->with('editAd',$editAdds);
    }

    public function update(Request $request, $id)
    {
        
        $updateAdds=Ad::where('ad_id',$id)->update($request->all());

        return redirect('/svp/sideAds','Updated Successfully !');


    }

    public function destroy($id)
    {
        $deleteAdds=Ad::where('ad_id',$id)->delete();
    }
}