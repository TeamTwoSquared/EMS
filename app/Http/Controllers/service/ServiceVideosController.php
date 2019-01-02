<?php

namespace App\Http\Controllers\service;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ServiceVideo;
use Illuminate\Support\Facades\DB;

class ServiceVideosController extends Controller
{
    public static function store2($request,$id)
    {
        if($request != null) {
          
                $service_video = new ServiceVideo();
                $service_video->service_id = $id;
                $service_video->videourl = $request;
                $service_video->save();
        
        }
    }

    public static function update(Request $request)
    {
    
        $findUrl=ServiceVideo::where('service_id',$request->serviceID)->get();
        
        if(count($findUrl) != 0){
            $find_url=$findUrl[0];
            DB::table('service_videos')->where('service_id', $request->serviceID)->where('videourl',$find_url->videourl)->delete();

        }
        if(($request->url) != null) {
          
            $service_video = new ServiceVideo();
            $service_video->service_id = $request->serviceID;
            $service_video->videourl = $request->url;
            $service_video->save();
    
        }
    }

    public static function getVideos($service_id)
    {
        $serviceVideos=ServiceVideo::where('service_id',$service_id)->get();
        return $serviceVideos;
    }
}