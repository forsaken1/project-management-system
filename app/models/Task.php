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
}
