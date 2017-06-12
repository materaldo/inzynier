<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(['before' => 'auth'], function()
{
    Route::controller('/graves', 'GravesController');
    Route::controller('/places', 'PlacesController');
    Route::controller('/buried', 'BuriedController');
    Route::controller('/dispatchers', 'DispatchersController');
    Route::controller('/search', 'SearchController');
    Route::get('/data', 'HomeController@getData');
	Route::get('/map', 'HomeController@getMap');
    Route::get('/import', 'HomeController@getImport');

    Route::get('downloadBuried/{type}', 'BuriedController@downloadExcel');
    Route::get('downloadPlaces/{type}', 'PlacesController@downloadExcel');
    Route::get('downloadGraves/{type}', 'GravesController@downloadExcel');
    Route::get('downloadDispatchers/{type}', 'DispatchersController@downloadExcel');

    Route::post('importPlaces', 'HomeController@importPlaces');
    Route::post('importDispatchers', 'HomeController@importDispatchers');
    Route::post('importGraves', 'HomeController@importGraves');
    Route::post('importBuried', 'HomeController@importBuried');

});

//Route::when('/*', 'auth');
//Route::when('/users/login', 'guest');



// Confide routes
Route::get('users/create', 'UsersController@create');
Route::post('users', 'UsersController@store');
Route::get('users/login', 'UsersController@login');
Route::post('users/login', 'UsersController@doLogin');
Route::get('users/confirm/{code}', 'UsersController@confirm');
Route::get('users/forgot_password', 'UsersController@forgotPassword');
Route::post('users/forgot_password', 'UsersController@doForgotPassword');
Route::get('users/reset_password/{token}', 'UsersController@resetPassword');
Route::post('users/reset_password', 'UsersController@doResetPassword');
Route::get('users/logout', 'UsersController@logout')->after('invalidate-browser-cache');




Route::controller('/', 'HomeController');
