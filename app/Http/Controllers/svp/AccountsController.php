<?php

namespace App\Http\Controllers\svp;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AddSvpModel;

class AccountsController extends Controller
{
    public function addServiceProvider(Request $req){

            $validateData=$req->validate([
                'name'=>'bail|required|max:255',
                'userName'=>'ail|requied|max:20',
                'pWord'=>'bail|requied|max:8',
                'email'=>'bail|requied|max:30',
                'address'=>'bail|requied|max:100']
            );
/*
            @if($validateData->any())
                <div class="error class" >
                    <ul>
                        @foreach($validateData->any() as $error)
                            <li>{{$error}}</li>
                        @foreach
                    <ul>
                </div>
            @endif
*/

            $svp=new serviceProviders();
            $svp->name=$req->name;
            $svp->userName=$req->userName;
            $svp->password=$req->pWord;
            $svp->email=$req->email;
            $svp->address=$req->address;
           
            $svp->save();
    }


    public function deleteServiceProvider(){
        //
    }

    public function updateServiceProviderInfo(){
        //
    }
}
