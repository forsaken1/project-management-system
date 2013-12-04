<?php

class ProjectsController extends BaseController {

	/**
	 * Project Repository
	 *
	 * @var Project
	 */
	protected $project;

	public function __construct(Project $project)
	{
		$this->project = $project;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$projects = $this->project->all();

        return View::make('projects.index', compact('projects'));
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

        return View::make('projects.show', compact('project'));
	}

}
