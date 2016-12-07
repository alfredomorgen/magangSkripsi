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


Route::get('admin/searchCompany', function () {
    $search = urlencode(e(\Illuminate\Support\Facades\Input::get('search')));
    $route = "admin/search_company/$search";
    return redirect($route);
});

Route::get('admin/searchJobseeker',function(){
    $search = urlencode(e(\Illuminate\Support\Facades\Input::get('search')));
    $route = "admin/search_jobseeker/$search";
    return redirect($route);
});

Route::get('admin/searchJob',function(){
    $search = urlencode(e(\Illuminate\Support\Facades\Input::get('search')));
    $route = "admin/search_job/$search";
    return redirect($route);
});

Route::get('/{user_type}',[
   'uses' => 'ProfileController@loginType'
]);

Route::get('user/{user_id}', [
    'uses' => 'ProfileController@index',
    'as' => 'user.profile',
]);

Route::get('/{user_id}/edit', [
    'uses' => 'ProfileController@edit',
]);

Route::post('/{user_id}/update',[
    'uses' => 'ProfileController@update',
    'as' => 'user.update',
]);

Route::get('/admin/view_jobseeker/{id}',[
   'uses' => 'ProfileController@index'
]);

Route::get('/admin/search_company', [
    'uses' => 'SearchController@indexCompany'
]);

Route::get('admin/search_company/{search}', [
    'uses' => 'SearchController@searchCompany'
]);

Route::get('/admin/search_jobseeker', [
    'uses' => 'SearchController@indexJobseeker'
]);

Route::get('admin/search_jobseeker/{search}', [
    'uses' => 'SearchController@searchJobseeker'
]);

Route::get('/admin/search_job', [
    'uses' => 'SearchController@indexJob'
]);

Route::get('admin/search_job/{search}', [
    'uses' => 'SearchController@searchJob'
]);
//Route::get('/admin/view_job/{id}',[
//    'uses' => 'ProfileController@index'
//]);

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
    'as' => 'company.manage_post_delete'
]);

Route::get('/company/view_post_job',[
   'uses' => 'CompanyController@view_post',
    'as' => 'company.view_post_job'
]);

Route::get('job/{id}', [
    'uses' => 'CompanyController@view_job_detail',
    'as' => 'company.view_job_detail'
]);

Route::get('job/{id}/apply', [
    'uses' => 'JobseekerController@apply',
    'as' => 'jobseeker.apply'
]);

Route::get('company/searchJobseeker',function(){
    $search = urlencode(e(\Illuminate\Support\Facades\Input::get('search')));
    $route = "company/search_jobseeker/$search";
    return redirect($route);
});

Route::get('/company/search_jobseeker',[
    'uses' => 'SearchController@indexJobseeker',
    'as' => 'company.search_jobseeker'
]);

Route::get('/company/search_jobseeker/{search}',[
    'uses' => 'SearchController@searchJobseeker',
    'as' => 'company.search_jobseeker'
]);