<?php

class StagesController extends BaseController {

	/**
	 * Stage Repository
	 *
	 * @var Stage
	 */
	protected $stage;

	public function __construct(Stage $stage)
	{
		$this->stage = $stage;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$stages = $this->stage->all();

		return View::make('stages.index', compact('stages'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('stages.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Stage::$rules);

		if ($validation->passes())
		{
			$this->stage->create($input);

			return Redirect::route('stages.index');
		}

		return Redirect::route('stages.create')
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
		$stage = $this->stage->findOrFail($id);

		return View::make('stages.show', compact('stage'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$stage = $this->stage->find($id);

		if (is_null($stage))
		{
			return Redirect::route('stages.index');
		}

		return View::make('stages.edit', compact('stage'));
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
		$validation = Validator::make($input, Stage::$rules);

		if ($validation->passes())
		{
			$stage = $this->stage->find($id);
			$stage->update($input);

			return Redirect::route('stages.show', $id);
		}

		return Redirect::route('stages.edit', $id)
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
		$this->stage->find($id)->delete();

		return Redirect::route('stages.index');
	}

}
