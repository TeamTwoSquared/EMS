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

//Routes of Admin

Route::get('/admin/login', function (){
    return view ('admin.login');

});

Route::post('/admin/dologin', 'admin\AccountsController@authenticate');

Route::get('/admin/dash', 'admin\AccountsController@index');

Route::get('/admin/event', function (){
    return view ('admin.event');

});

Route::get('/admin/profile', function (){
    return view ('admin.profile');

});

Route::get('/admin/settings', function (){
    return view ('admin.settings');

});

Route::post('/admin/save_profile', 'admin\AccountsController@save_profile');
Route::post('/admin/change_img', 'admin\AccountsController@change_img');
 
Route::get('/admin/logout', function (){
    session()->flush();
    return redirect('/admin/login')->with('success','Logged out Succesfully');

});

//Routes for Service providers




