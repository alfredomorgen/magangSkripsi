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

<<<<<<< HEAD
Route::get('admin/search',function(){
    $search = urlencode(e(\Illuminate\Support\Facades\Input::get('search')));
    $route = "admin/search_company/$search";
    return redirect($route);
=======
Route::get('/{user_id}', [
    'uses' => 'ProfileController@index',
]);

Route::get('/admin/search_company',function(){
   return view('admin/search_company');
>>>>>>> 3a1b130747efeeaf0c568d38d5e3bccb5781c53e
});
Route::get('admin/search_company/{search}','AdminController@searchCompany');
Route::get('admin/view_search','AdminController@index');

Route::group(['middleware' => ['web']], function () {
    //

});



Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/company/post_job', function(){
    return view('company.post_job');
});