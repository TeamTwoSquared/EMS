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


    public function store()
    {

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