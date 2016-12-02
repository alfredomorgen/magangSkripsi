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

Route::get('admin/search',function(){
    $search = urlencode(e(\Illuminate\Support\Facades\Input::get('search')));
    $route = "admin/search_company/$search";
    return redirect($route);
});
Route::get('admin/search_company/{search}','AdminController@searchCompany');
Route::get('admin/view_search','AdminController@index');

Route::group(['middleware' => ['web']], function () {
    //

});



Route::auth();

Route::get('/home', 'HomeController@index');
