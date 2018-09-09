<?php
namespace App\Http\Controllers\ad;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ad;
use App\AdsImage;

class AdsController extends Controller
{

    public function index()
    {
        return view('sideAdds\addsForm');
    }


    public function create()
    {
        //
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

        return redirect('/svp/sideAdds')->with('success','Submited Successfully !');

        return redirect('/svp/sideAdds')->with('error','errors');
    }


    public function show($id)
    {
      //  $adInfo=Ad::where('ad_id',$id)->get();
      //  return view('sideAdds/showSideAdds');
    }


    public function edit($id)
    {
        
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