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

        if($request != null){
            $keywordArray=explode(',',$request);

            foreach($keywordArray as $sev_keyword) {
                $Keywords = new ServiceKeyword();
                $Keywords->service_id = $id;
                $Keywords->keyword = $sev_keyword;
                $Keywords->save();
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