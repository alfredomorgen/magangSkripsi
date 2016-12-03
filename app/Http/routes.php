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


Route::get('admin/search', function () {
    $search = urlencode(e(\Illuminate\Support\Facades\Input::get('search')));
    $route = "admin/search_company/$search";
    return redirect($route);
});

Route::get('/{user_id}', [
    'uses' => 'ProfileController@index',
]);

Route::get('/admin/search_company', function () {
    return view('admin/search_company');
});

Route::get('admin/search_company/{search}', 'AdminController@searchCompany');
Route::get('admin/view_search', 'AdminController@index');

Route::group(['middleware' => ['web']], function () {
    //
});


Route::get('/home', 'HomeController@index');

Route::get('/company/post_job', [
    'uses' => 'CompanyController@post_job',
    'as' => 'company.post_job'
]);

Route::post('company/post_job/store',[
    'uses' => 'CompanyController@store',
    'as' => 'company.store'
]);

Route::get('company/manage_post',[
   'uses' => 'CompanyController@manage_post',
    'as' => 'company.manage_post'
]);

Route::get('/company/post_job/edit/{id}',[
    'uses' => 'CompanyController@manage_post_edit',
    'as' => 'company.manage_post_edit'

]);

Route::post('/company/post_job/update/{id}',[
    'uses' => 'CompanyController@manage_post_update',
    'as' => 'company.manage_post_update'

]);

Route::get('/company/post_job/delete/{id}',[
    'uses' => 'CompanyController@manage_post_delete',
    'aa' => 'company.manage_post_delete'
]);