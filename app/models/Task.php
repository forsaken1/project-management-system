<?php

class Task extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'priority' => 'required',
		'status' => 'required',
		'work_time' => 'required',
		'stage_id' => 'required',
		'employer_id' => 'required',
		'project_id' => 'required',
		'name' => 'required'
	);
}
