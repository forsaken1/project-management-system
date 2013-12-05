<?php

class Project extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'name' => 'required',
		'date_start' => 'required'
	);

	public function employee()
	{
		return $this->hasMany('Employee', 'project_id');
	}
}
