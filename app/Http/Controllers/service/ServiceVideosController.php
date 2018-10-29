<?php

namespace App\Http\Controllers\service;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ServiceVideo;

class ServiceVideosController extends Controller
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
    {
        if($request != null) {
          //  $videoUrlArray= explode(',', $request);
          //  dd($videoUrlArray);
          //  foreach($videoUrlArray as $serviceVideoUrl) {
                $service_video = new ServiceVideo();
                $service_video->service_id = $id;
                $service_video->videourl = $request;
                $service_video->save();
           // }
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