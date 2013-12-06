<?php

class Report extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'text' => 'required',
		'task_id' => 'required',
	);

	public function employee()
	{
		return $this->belongsTo('Employee', 'employer_id');
	}

	public function task()
	{
		return $this->belongsTo('Task', 'task_id');
	}
}
