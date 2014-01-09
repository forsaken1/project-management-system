<?php

class Task extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'name' => 'required',
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

	public function reports()
	{
		return $this->hasMany('Report', 'task_id');
	}

	public function parents()
	{
		return $this->hasMany('TaskDepend', 'task_child');
	}

	public function childs()
	{
		return $this->hasMany('TaskDepend', 'task_parent');
	}
}
