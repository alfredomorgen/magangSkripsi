<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();

Route::get('/', function () {
    return view('home');
});
Route::get('/home', function () {
    return view('home');
});

Route::get('/admin/search_company',function(){
   return view('admin/search_company');
});


Route::group(['middleware' => ['web']], function () {
    //



});



Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/company/post_job', function(){
    return view('company.post_job');
});