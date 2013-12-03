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

Route::group(array('before' => 'auth'), function() {
	Route::get('/',                        'HomeController@index');
});


Route::group(array('prefix' => 'user'), function() {
	Route::get( 'create',                  'UserController@create');
	Route::post('/',                       'UserController@store');
	Route::get( 'login',                   'UserController@login');
	Route::post('login',                   'UserController@do_login');
	Route::get( 'confirm/{code}',          'UserController@confirm');
	Route::get( 'forgot_password',         'UserController@forgot_password');
	Route::post('forgot_password',         'UserController@do_forgot_password');
	Route::get( 'reset_password/{token}',  'UserController@reset_password');
	Route::post('reset_password',          'UserController@do_reset_password');
	Route::get( 'logout',                  'UserController@logout');
});

App::missing(function ($exception) {
	return Response::view('errors.missing', array(), 404);
});