<?php

namespace App\Http\Controllers\client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Client;

class ClientsController extends Controller
{

    public function index()
    {
        //
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

    public function isOnline($id){
        $client=Client::where('customer_id',$id)->get();
        if($client[0]->isonline == 1){
            return "Active Now";
        }
        else{
            return " Off line";
        }
    }

    public function isLogout(){
        $client = Client::find(session()->get('customer_id'));
        $client->isonline=0;
        $client->save();
        session()->flush();
        return redirect('/client/login')->with('success','Logged out Succesfully');
    }
}