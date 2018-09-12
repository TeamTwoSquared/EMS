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

Route::get('/test', function () {
    return view('test');
});
//Route::get('/test2', 'event\CatergoryTemplatesController@getCatergories');

Route::get('/', function(){
    return view('welcome');
});

//Routes of Admin

Route::get('/admin/login', function (){
    return view ('admin.login');

});
Route::post('/admin/dologin', 'admin\AdminsController@authenticate');
Route::get('/admin/dash', 'admin\AdminsController@index');

Route::get('/admin/template', 'event\TemplatesController@admin_index');
Route::get('/admin/template/add', 'event\TemplatesController@admin_create');
Route::post('/admin/template/store', 'event\TemplatesController@admin_store');
Route::get('/admin/task/add/{id}', 'event\TasksController@template_task');

Route::get('/admin/task', 'event\TasksController@admin_index');
Route::get('/admin/task/add', 'event\TasksController@admin_create');
Route::post('/admin/task/store', 'event\TasksController@admin_store');


Route::get('/admin/catergory', function (){
    return view ('admin.event.catergory');

});
Route::get('/admin/profile', function (){
    return view ('admin.profile');

});
Route::get('/admin/settings', function (){
    return view ('admin.settings');

});
Route::post('/admin/save_profile', 'admin\AdminsController@save_profile');
Route::post('/admin/change_img', 'admin\AdminsController@change_img');
Route::get('/admin/logout', function (){
    session()->flush();
    return redirect('/admin/login')->with('success','Logged out Succesfully');

});

//Routes for Service providers 

Route::get('/svp/login', function (){
    return view ('svp.login');
});
Route::get('/svp/register', function (){
    return view ('svp.register');
});
Route::get('/svp/toverify', function (){
    return view ('svp.verify');
});
Route::post('/svp/doregister', 'svp\SVPsController@register');
Route::get('/svp/dash', 'svp\SVPsController@index');
Route::post('/svp/dologin', 'svp\SVPsController@authenticate');
Route::get('mail/send', 'MailController@send');

//Route::get('/svp/client','');
Route::get('/svp/service','service\ServicesController@index');
Route::get('/svp/booking','service\ServiceCustomerBookingsController@index');
Route::get('/svp/review','review\ReviewingsController@index');
Route::get('/svp/sideAdds','ad\AdsController@index');

Route::get('/svp/help',function(){
    return view('svp.help');
});




//Routes for Clients
Route::get('/client/login', function (){
    return view ('client.login');

});
Route::get('/client/register', function (){
    return view ('client.register');

});
Route::post('/client/doregister', 'client\ClientsController@register');
Route::get('/cient/dash', 'client\ClientsController@index');
Route::post('/client/dologin', 'client\ClientsController@authenticate');


// Routes for side Adds.

Route::get('svp/sideAdds','ad\AdsController@index');
Route::get('svp/sideAdds/create','ad\AdsController@create');
Route::post('/svp/sideAdds/store','ad\AdsController@store');
Route::post('/svp/sideAds/store','ad\AdImagesController@store');
Route::get('/svp/sideAdds/show/{{ad_id}}','ad\AdsController@show');
Route::get('/svp/sideAdds/edit/{{ad_id}}','ad\AdsController@edit');
Route::match('/svp/sideAdds/update','ad\AdsController@update');
Route::delete('/svp/sideAdds/delete','ad\AdsController@destroy');
