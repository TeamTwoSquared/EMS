<?php

namespace App\Http\Controllers\service;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ServiceKeyword;

class ServiceKeywordsController extends Controller
{
    private static  $serviceId;

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }

   /* public static function passServiceId($id){
       self::$serviceId=$id;
       dd($serviceId);
    }

    public static function getServiceId(){
        dd(self::$serviceId);
    }*/

    public static function store2($request, $id){

        for($i=1;$i<7;$i++) {
            $a="keyword";
            $a =$a.$i;
        
            if(($request->$a) != null){
                        $key = new ServiceKeyword();
                        $a="keyword";
                        $a =$a.$i;
                        $key->service_id = $id;
                        $key->keyword = $request->$a;
                        $key->save();
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