<?php

namespace App\Http\Controllers\service;

use App\ServiceLocation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Service;
use App\Http\Controllers\service\ServiceImagesController;
use App\ServiceType;
use App\ServiceKeyword;
use App\ServiceImage;
use App\ServiceVideo;



class ServicesController extends Controller
{

    public function index()
    {
        $servicesInfo = Service::where('service_provider_id',session()->get('svp_id'))->get();
        return view('svp.services')->with('svpServices',$servicesInfo);
    }


    public function create()
    {
        return view('svp.addServices');
    }


    public function store(Request $request)
    {
        
        $exsistingService = Service::where('name',$request->name)->get();
        
        if(count($exsistingService) != 0){
            return redirect('/svp/service')->with('error','This service is alrady exist !');
        }

        else{
            $service = new Service();
            $service->name = $request->name;
            $service->price = $request->price;
            $service->description = $request->description;
            $service->service_provider_id=session()->get('svp_id');
            $service->save();

            ServiceImagesController::store2($request->service_image,$service->service_id);
            ServiceKeywordsController::store2($request,$service->service_id);
            ServiceLocationsController::store2($request,$service->service_id);
            ServiceTypesController::store2($request,$service->service_id);
            ServiceVideosController::store2($request->service_video_url,$service->service_id);

            return redirect('/svp/service')->with('success','Successfully registered new service !');
        }
    }


    public function show($service_id)
    {
        $serviceInfo=Service::where('service_id',$service_id)->get();
        $serviceLocations=ServiceLocation::where('service_id',$service_id)->get();
        $serviceTypes=ServiceType::where('service_id',$service_id)->get();
        $serviceKeywords=ServiceKeyword::where('service_id',$service_id)->get();
        $serviceImages=ServiceImage::where('service_id',$service_id)->get();
        $serviceVideos=ServiceVideo::where('service_id',$service_id)->get();
        return view('svp.viewService')->with('service_info',$serviceInfo)->with('service_locations',$serviceLocations)->with('service_types',$serviceTypes)->with('service_keywords',$serviceKeywords)->with('service_Images',$serviceImages)->with('service_videos',$serviceVideos);
    }


    public function edit($service_id)
    {
        $service = Service::find($service_id);
        $serviceLocations=ServiceLocation::where('service_id',$service_id)->get();
        $serviceTypes=ServiceType::where('service_id',$service_id)->get();
        $serviceKeywords=ServiceKeyword::where('service_id',$service_id)->get();
        $serviceImages=ServiceImage::where('service_id',$service_id)->get();
        $serviceVideos=ServiceVideo::where('service_id',$service_id)->get();

        $serviceImg=count(ServiceImage::where('service_id',$service_id)->get());
        
        if(count($serviceVideos) != 0){
            return view('svp.editService')->with('service_info',$service)->with('service_locations',$serviceLocations)->with('service_types',$serviceTypes)->with('service_keywords',$serviceKeywords)->with('service_images',$serviceImages)->with('service_videos',$serviceVideos[0]->videourl)->with('serviceID',$service_id)->with('service_img',$serviceImg);
        }
        else{
            return view('svp.editService')->with('service_info',$service)->with('service_locations',$serviceLocations)->with('service_types',$serviceTypes)->with('service_keywords',$serviceKeywords)->with('service_images',$serviceImages)->with('service_videos'," ")->with('serviceID',$service_id)->with('service_img',$serviceImg);
        }
    }


    public function update(Request $request)
    {
            $updateService=Service::find($request->serviceID);
            $updateService->service_id=$request->serviceID;
            $updateService->name = $request->sName;
            $updateService->price = $request->price;
            $updateService->description = $request->description;
            $updateService->service_provider_id=session()->get('svp_id');
            $updateService->save();

            // calling functions

            ServiceKeywordsController::update($request);
            ServiceLocationsController::update($request);
            ServiceTypesController::update($request);
            ServiceVideosController::update($request);
            ServiceImagesController::update($request);

            return redirect('/svp/service')->with('success','Successfully Updated The Service !');

    }


    public  function destroy($service_id)
    {
        $serviceDelete = Service::find($service_id);
        $serviceDelete->delete();

        return redirect('/svp/service')->with('success','Successfully Deleted Service !');
    }

    public function test(){
        return view('svp.help');
    }
}