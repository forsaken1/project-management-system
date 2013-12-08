<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index()
	{
		return Redirect::to('/projects');
	}

	public function statistics()
	{
		$projects = Project::all();
		$employees = Employee::all();
		$tasks = Task::all();
		return View::make('statistics.index', compact('tasks', 'projects', 'employees'));
	}

}