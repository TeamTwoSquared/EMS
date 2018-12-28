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
        
        for($i=7;$i<13;$i++) {
            $a="location";
            $a =$a.$i;
            if(($request->$a) != null){   
                $loc = new ServiceLocation();
                $a="location";
                $a =$a.$i;
                $loc->service_id = $id;
                $loc->location= $request->$a;
                $loc->save();
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