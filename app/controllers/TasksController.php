<?php

class TasksController extends BaseController {

	/**
	 * Task Repository
	 *
	 * @var Task
	 */
	protected $task;

	public function __construct(Task $task)
	{
		$this->task = $task;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tasks = $this->task->with('project', 'employee', 'stage')->get();

		return View::make('tasks.index', compact('tasks'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$tasks = $this->task->all()->lists('name', 'id');

		return View::make('tasks.create', compact('tasks'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = array_except(Input::all(), array('parent', '_token'));
		$validation = Validator::make($input, Task::$rules);

		if ($validation->passes())
		{
			$id = Task::insertGetId($input);

			DB::table('task_task')->insert(array(
				'task_child' => $id,
				'task_parent' => Input::get('parent'),
			));

			return Redirect::route('tasks.index');
		}

		return Redirect::route('tasks.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$task = $this->task->findOrFail($id);

		return View::make('tasks.show', compact('task'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$task = $this->task->find($id);

		if (is_null($task))
		{
			return Redirect::route('tasks.index');
		}

		return View::make('tasks.edit', compact('task'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Task::$rules);

		if ($validation->passes())
		{
			$task = $this->task->find($id);
			$task->update($input);

			return Redirect::route('tasks.show', $id);
		}

		return Redirect::route('tasks.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->task->find($id)->delete();

		return Redirect::route('tasks.index');
	}

	public function depend()
	{
		$depends = TaskDepend::with('parent', 'child')->get();

		return View::make('tasks.depend', compact('depends'));
	}

	public function dependCreate()
	{
		$tasks = Task::all();

		return View::make('tasks.dependCreate', compact('tasks'));
	}

	public function dependSave()
	{
		if(Input::get('task_parent') == Input::get('task_child'))
		{
			return Redirect::route('tasks.dependCreate')
				->with('message', 'Задача не может быть зависимой сама себе!');
		}
		$input = array_except(Input::all(), array('_token'));
		TaskDepend::insert($input);
		return Redirect::route('tasks.depend');
	}

	public function dependDelete($id)
	{
		TaskDepend::find($id)->delete();

		return Redirect::route('tasks.depend');
	}

}
