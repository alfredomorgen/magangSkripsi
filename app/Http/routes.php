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

////////////////
// All users //
///////////////
Route::auth();

Route::get('/', [
    'uses' => 'SiteController@index',
]);

Route::get('/home', [
    'uses' => 'SiteController@index',
]);

Route::get('/login/{user_type}',[
    'uses' => 'SiteController@loginType'
]);

Route::get('/register/{user_type}',[
    'uses' => 'SiteController@registerType'
]);

Route::get('/search_job',[
    'uses' => 'JobController@search_job',
    'as' => 'job.search'
]);

Route::get('/job/{id}', [
    'uses' => 'JobController@index',
    'as' => 'job.index',
]);

///////////
// Admin //
///////////
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

//Axel edit
//Route::get('/admin/view_jobseeker/{id}',[
//   'uses' => 'SiteController@index'
//]);

Route::get('/admin/search_company', [
    'uses' => 'SearchController@indexCompany'
]);

Route::get('/admin/search_company/{search}', [
    'uses' => 'SearchController@searchCompany'
]);

Route::get('/admin/search_jobseeker', [
    'uses' => 'SearchController@indexJobseeker'
]);

Route::get('/admin/search_jobseeker/{search}', [
    'uses' => 'SearchController@searchJobseeker'
]);

Route::get('/admin/search_job', [
    'uses' => 'SearchController@indexJob'
]);

Route::get('/admin/search_job/{search}', [
    'uses' => 'SearchController@searchJob'
]);

Route::get('/admin/delete_job/{id}',[
    'uses' => 'AdminController@deleteJob'
]);

Route::get('/admin/delete_company/{id}',[
    'uses' => 'AdminController@deleteCompany'
]);
Route::get('/admin/delete_jobseeker/{id}',[
    'uses' => 'AdminController@deleteJobseeker'
]);

//Route::get('/admin/view_job/{id}',[
//    'uses' => 'ProfileController@index'
//]);

//////////////
// Company //
/////////////
Route::group(['middleware' => ['web']], function () {
    //
});

Route::get('/company/post_job', [
    'uses' => 'CompanyController@post_job',
    'as' => 'company.post_job'
]);

Route::post('/company/post_job/store',[
    'uses' => 'CompanyController@store',
    'as' => 'company.store'
]);

Route::get('/company/manage_post',[
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

Route::get('/company/searchJobseeker',function(){
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

Route::get('company/view_candidate',[
   'uses' => 'CompanyController@view_candidate',
    'as' => 'company.view_candidate'
]);

///////////////
// Jobseeker //
///////////////
Route::get('/user/{id}', [
    'uses' => 'JobseekerController@index',
    'as' => 'user.index',
]);

Route::get('/user/{user_id}/edit', [
    'uses' => 'JobseekerController@edit',
    'as' => 'jobseeker.edit',
]);

Route::post('/user/{user_id}/update',[
    'uses' => 'JobseekerController@update',
    'as' => 'jobseeker.update',
]);

Route::get('/job/{id}/apply', [
    'uses' => 'JobseekerController@apply',
    'as' => 'jobseeker.apply'
]);

