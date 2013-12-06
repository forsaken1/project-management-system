<?php

class Task extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'name' => 'required',
		'project_id' => 'required',
	);

	public function employee()
	{
		return $this->belongsTo('Employee', 'employer_id');
	}

	public function project()
	{
		return $this->belongsTo('Project', 'project_id');
	}

	public function stage()
	{
		return $this->belongsTo('Stage', 'stage_id');
	}
}
