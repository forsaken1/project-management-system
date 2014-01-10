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
		return View::make('statistics.gantt');
	}

	public function getGantt($id)
	{
		date_default_timezone_set('Pacific/Fiji');
		setlocale(LC_ALL, 'ru_RU');

		$projects = Project::with('tasks', 'tasks.reports')->get();
		$tasks_ = Task::where('project_id', $id)->with('project', 'parents')->get();

		foreach($tasks_ as $i => $task)
		{
			unset($depends);
			unset($max);
			unset($min);

			if($task->parents->count())
			{
				$depends = '';
				foreach($task->parents as $parent)
				{
					$depends .= $parent->parent->id . ',';
				}
			}

			if($task->reports->count())
			{
				$max = date_create('1970-01-01 00:00:00');
				$min = date_create('2100-12-12 00:00:00');
				foreach($task->reports as $report)
				{
					$min = ($d = date_create($report->time_start) ) < $min ? $d : $min;
					$max = ($d = date_create($report->time_end  ) ) > $max ? $d : $max;
				}
				$min = strtotime($min->format("Y-m-d")) * 1000;
				$max = strtotime($max->format("Y-m-d")) * 1000;
			}
	
			$tasks[$i] = array(
				'id' => $task->id,
				'name' => $task->name,
				'code' => '',
				'level' => 0,
				'status' => isset($depends) ? 'STATUS_SUSPENDED' : $this->getStatus($task->status),
				'start' => isset($min) ? $min : strtotime($task->project->date_start) * 1000,
				'end' => isset($max) ? $max : strtotime($task->project->date_end) * 1000,
				'duration' => $task->work_time,
				'startIsMilestone' => false,
				'endIsMilestone' => false,
				'collapsed' => false,
				'assigs' => array(),
				'depends' => isset($depends) ? $depends : '',
			);
		}

		return Response::json(array('result' => array(
			'tasks' => $tasks,
			'selectedRow' => 1,
			'deletedTaskIds' => array(),
			'resources' => array(),
			'roles' => array(),
			'canWrite' => true,
			'canWriteOnParent' => false,
		)));
	}

	public function getStatus($status)
	{
		if($status == 0)
			return 'STATUS_SUSPENDED';
		else if($status == 1)
			return 'STATUS_ACTIVE';
		else if($status == 2)
			return 'STATUS_ACTIVE';
		else if($status == 3)
			return 'STATUS_DONE';
		else if($status == 4)
			return 'STATUS_DONE';
	}

}