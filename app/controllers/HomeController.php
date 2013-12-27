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

	public function projects($id)
	{
		$project = Project::find($id);

		return View::make('statistics.projects', compact('project'));
	}

	public function tasks($id)
	{
		$task = Task::find($id);

		return View::make('statistics.tasks', compact('task'));	
	}

	public function employees($id)
	{
		$employee = Employee::find($id);

		return View::make('statistics.employees', compact('employee'));
	}

	public function gantt()
	{
		$projects = Project::with('tasks', 'tasks.reports')->get();

		return View::make('statistics.gantt', compact('projects'));
	}

}