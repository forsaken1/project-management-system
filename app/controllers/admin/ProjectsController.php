<?php namespace Admin;

class ProjectsController extends \BaseController {

	/**
	 * Project Repository
	 *
	 * @var Project
	 */
	protected $project;

	public function __construct(\Project $project)
	{
		$this->project = $project;
	}

	public function people($project_id)
	{
		$users = \User::where('is_admin', '=', 0)->get();

		return \View::make('admin.projects.people', compact('users', 'project_id'));
	}

	public function addEmployee($project_id, $user_id, $manager = 0)
	{
		$employer = \Employee::where('project_id', '=', $project_id)
			->where('user_id', '=', $user_id)
			->where('is_manager', '=', $manager)
			->first();

		if($employer)
		{
			$employer->delete();
			return \Response::json(array('result' => 0));
		}
		else
		{
			$employer = new \Employee;
			$employer->project_id = $project_id;
			$employer->user_id = $user_id;
			$employer->is_manager = $manager;
			$employer->save();

			return \Response::json(array('result' => 1));
		}
	}

	public function addManager($project_id, $user_id)
	{
		return $this->addEmployee($project_id, $user_id, 1);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$projects = $this->project->all();

		return \View::make('admin.projects.index', compact('projects'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return \View::make('admin.projects.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = \Input::all();
		$validation = \Validator::make($input, \Project::$rules);

		if ($validation->passes())
		{
			$this->project->create($input);

			return \Redirect::route('admin.projects.index');
		}

		return \Redirect::route('admin.projects.create')
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
		$project = $this->project->findOrFail($id);

		return \View::make('admin.projects.show', compact('project'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$project = $this->project->find($id);

		if (is_null($project))
		{
			return \Redirect::route('admin.projects.index');
		}

		return \View::make('admin.projects.edit', compact('project'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(\Input::all(), '_method');
		$validation = \Validator::make($input, \Project::$rules);

		if ($validation->passes())
		{
			$project = $this->project->find($id);
			$project->update($input);

			return \Redirect::route('admin.projects.show', $id);
		}

		return \Redirect::route('admin.projects.edit', $id)
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
		$this->project->find($id)->delete();

		return \Redirect::route('admin.projects.index');
	}

}
