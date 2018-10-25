<?php

namespace App\Http\Controllers\service;

use App\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ServiceLocation;

class ServiceLocationsController extends Controller
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
        if($request != null){
            $locationArray=explode(',',$request);
            foreach($locationArray as $service_locations) {
                $locations = new ServiceLocation();
                $locations->location = $service_locations;
                $locations->service_id = $id;
                $locations->save();
            }
        }
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