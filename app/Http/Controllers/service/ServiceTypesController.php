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
        /*
        if($request != null){
            $serviceTypesArray=explode(',',$request);

            foreach($serviceTypesArray as $serviceType) {
                $service_type = new ServiceType();
                $service_type->type = $serviceType;
                $service_type->service_id = $id;
                $service_type->save();
            }
        }
        */

        for($i=13;$i<19;$i++) {
            $a="type";
            $a =$a.$i;
            if(($request->$a) != null){
                $types = new ServiceType();
                $a="type";
                $a =$a.$i;
                $types->service_id = $id;
                $types->type= $request->$a;
                $types->save();
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