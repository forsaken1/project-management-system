<?php

class Report extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'time_start' => 'required',
		'time_end' => 'required',
		'text' => 'required',
		'task_id' => 'required'
	);
}
