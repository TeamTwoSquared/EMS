<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('registation',function(){
    return view('serviceProvider.svp_registation_form');
});

Route::post('insertServiceProvider','svp\AccountsController@addServiceProvider');