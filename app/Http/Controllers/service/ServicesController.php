<?php

namespace App\Http\Controllers\service;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service;

class ServicesController extends Controller
{

    public function index()
    {
        return view('svp.service');
    }


    public function create()
    {
        return view('svp.service');
    }


    public function store(Request $request)
    {
        $service = new Service();
        $service->name = $request->name;
        $service->price = $request->price;
        $service->description = $request->description;
        $service->isavailable = $request->isavailable;
        $service->service_provider_id = $request->service_provider_id;
        $service->save();
    }


    public function show($id)
    {
        $service = Service::find($id);
        return $service;
    }


    public function edit($id)
    {
        $service = Service::find($id);
        return view('service.edit')->with('service.$service');

    }


    public function update(Request $request, $id)
    {
        $service = Service::find('$id');
        $service->name = $request->name;
        $service->price = $request->price;
        $service->description = $request->description;
        $service->isavailable = $request->isavailable;
        $service->service_provider_id = $request->service_provider_id;
        $service->save();
    }


    public function destroy($id)
    {
        $service = Service::find($id);
        $service->delete();
    }
}