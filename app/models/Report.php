<?php

class Report extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'text' => 'required',
		'task_id' => 'required',
	);
}
