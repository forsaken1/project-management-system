<?php

include 'macros.php';

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

Route::pattern('id',         '[0-9]+');
Route::pattern('user_id',    '[0-9]+');
Route::pattern('project_id', '[0-9]+');
Route::pattern('is_manager', '[0-9]+');

Route::group(array('before' => 'auth'), function() {
	Route::get('/',                        'HomeController@index');
	Route::get('statistics',               'HomeController@statistics');
	Route::get('gant',                     'HomeController@gant');
	
	Route::get('projects', array('as' => 'projects.index', 'uses' => 'ProjectsController@index'));
	Route::get('projects/{id}',            'ProjectsController@show');

	Route::resource('tasks',               'TasksController');
	Route::resource('stages',              'StagesController');
	Route::resource('reports',             'ReportsController');
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

Route::group(array('prefix' => 'admin'), function() {
	Route::get('/', function() {
		return Redirect::route('admin.projects.index');
	});

	Route::get('projects/people/{project_id}', array('as' => 'admin.projects.people', 'uses' => 'Admin\ProjectsController@people'));
	Route::post('projects/people/{project_id}/{user_id}/{is_manager}', 'Admin\ProjectsController@addPeople');
	
	Route::resource('projects',            'Admin\ProjectsController');
	Route::resource('users',               'Admin\UsersController');
});

App::missing(function ($exception) {
	return Response::view('errors.missing', array(), 404);
});


