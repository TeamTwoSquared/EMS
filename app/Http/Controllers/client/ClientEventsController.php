<?php

namespace App\Http\Controllers\client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Catergory;
use App\CatergoryImage;
use DB;

class ClientEventsController extends Controller
{

    public function index()
    {
       $catgry=DB::select('select*from catergories');
     //  return view('client.catergory')->with('cat',$catgry);
        return view('client.index')->with('cat',$catgry);
        //dd($catgry);
    }


    public function create()
    {
       // return view('client.catergoryTemplates');
    }


    public function store(Request $request)
    {
        $newCatgry=new Catergory();
        $newCatgty->name=$request->catName;
        $newCatgry->description=$request->catDescription;
        $newCatgry->numberOftemplates=$request->NumOfTemplates;
        $newCatgry->save();
    }


    public function show()
    {
        return view('client.catergoryTemplates');
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