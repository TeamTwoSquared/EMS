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
    return view('mail.verify');
});
Route::get('/test2/{id}', 'svp\SVPsController@sendActivationLink');
Route::get('/', function(){
    return view('index');
});
Route::get('/aboutus', function(){
    return view('aboutus');
});

Route::get('/contactus', function(){
    return view('contactus');
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
Route::get('/admin/template/edit/{id}', 'event\TemplatesController@admin_edit');
Route::get('/admin/template/block/{id}','event\TemplatesController@block');
Route::get('/admin/template/delete/{id}','event\TemplatesController@destroy');
Route::post('/admin/template/edit/update/{id}','event\TemplatesController@admin_update');

Route::get('/admin/task/add/{id}', 'event\TasksController@template_task');
Route::get('/admin/task', 'event\TasksController@admin_index');
Route::get('/admin/task/add', 'event\TasksController@admin_create');
Route::post('/admin/task/store', 'event\TasksController@admin_store');
Route::get('/admin/task/edit/{id}', 'event\TasksController@admin_edit');
Route::get('/admin/task/block/{id}','event\TasksController@block');
Route::get('/admin/task/delete/{id}','event\TasksController@destroy');
Route::post('/admin/task/edit/update/{id}','event\TasksController@admin_update');


Route::get('/admin/catergory', 'event\CatergoriesController@admin_index');
Route::get('/admin/catergory/add', 'event\CatergoriesController@admin_create');
Route::post('/admin/catergory/store', 'event\CatergoriesController@admin_store');
Route::get('/admin/catergory/edit/{id}', 'event\CatergoriesController@admin_edit');
Route::get('/admin/catergory/delete/{id}','event\CatergoriesController@destroy');
Route::post('/admin/catergory/edit/update/{id}','event\CatergoriesController@admin_update');

/*Route::get('/admin/catergory', function (){
    return view ('admin.event.catergory');
});*/
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
Route::get('/svpverification/{id}', 'svp\SVPsController@sendActivationLink');
Route::get('/svpverification/{id}/{key}', 'svp\SVPsController@doVerify');

//Route::get('/svp/client','');
Route::get('/svp/service','service\ServicesController@index');
Route::get('/svp/booking','service\ServiceCustomerBookingsController@index');
Route::get('/svp/review','review\ReviewingsController@index');
Route::get('/svp/sideAdds','ad\AdsController@index');

Route::get('/svp/help',function(){
    return view('svp.help');
});

Route::get('/svp/profile', function (){
    return view ('svp.profile');

});
Route::get('/svp/settings', function (){
    return view ('admin.settings');

});
Route::post('/svp/save_profile', 'svp\SVPsController@save_profile');
Route::post('/svp/change_img', 'svp\SVPsController@change_img');
Route::get('/svp/logout','svp\SVPsController@isLogout');


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
//Route::get('/clverification/{id}/{key}', '');

// Routes for client's catergory

Route::get('/client/catergory','client\ClientEventsController@index');
Route::get('/client/catergory/{$catergoryItems->name}/templates','client\ClientEventsController@show');
Route::get('/client/catergory/newCatergory','client\ClientEventsControlelr@create');
Route::post('/client/catergory/addNewCatergory','client\ClinetEventsControlelr@store');




// Routes for side Adds.

Route::get('svp/sideAdds','ad\AdsController@index');
Route::get('svp/sideAdds/create','ad\AdsController@create');
Route::post('/svp/sideAdds/store','ad\AdsController@store');
Route::post('/svp/sideAds/store','ad\AdImagesController@store');
Route::get('/svp/sideAdds/show/{{ad_id}}','ad\AdsController@show');
Route::get('/svp/sideAdds/edit/{{ad_id}}','ad\AdsController@edit');
Route::match('/svp/sideAdds/update','ad\AdsController@update');
Route::delete('/svp/sideAdds/delete','ad\AdsController@destroy');

//pansilu
Route::get('/pansilu/{id}','chat\ChatsController@show');