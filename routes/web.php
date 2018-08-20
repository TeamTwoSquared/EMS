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

Route::get('/admin/login', function (){
    return view ('admin.login');

});

Route::post('/admin/dologin', 'admin\AccountsController@authenticate');

Route::get('/admin/dash', function (){
    return view ('admin.index');

});

Route::get('/admin/event', function (){
    return view ('admin.event');

});




