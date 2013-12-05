<?php

class Employee extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'user_id' => 'required',
		'project_id' => 'required',
		'is_manager' => 'required',
	);
}
