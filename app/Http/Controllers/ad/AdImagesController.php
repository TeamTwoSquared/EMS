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


    public function store(Request $request)
    {
        $img=new AdsImage();
        $img->imgurl=$request->adds;

        $img->save();
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