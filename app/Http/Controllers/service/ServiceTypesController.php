<?php

namespace App\Http\Controllers\service;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ServiceType;

class ServiceTypesController extends Controller
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
            $serviceTypesArray=explode(',',$request);

            foreach($serviceTypesArray as $serviceType) {
                $service_type = new ServiceType();
                $service_type->type = $serviceType;
                $service_type->service_id = $id;
                $service_type->save();
            }
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