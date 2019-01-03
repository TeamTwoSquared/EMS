<?php

namespace App\Http\Controllers\service;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use serviceCustomerBooking;


use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;
use App\Catergory;
use App\CatergoryImage;
use App\Http\Controllers\event\CatergoryImageController;


class ServiceCustomerBookingsController extends Controller
{

    public function index()
    {
        $catergories = Catergory::all();
        return view('svp.bookingInfo')->with('catergories',$catergories);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
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