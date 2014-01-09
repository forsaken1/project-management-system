<?php

class TaskDepend extends Eloquent {
	protected $guarded = array();
	protected $table = 'task_task';

	public static $rules = array();

	public function child()
	{
		return $this->belongsTo('Task', 'task_child');
	}

	public function parent()
	{
		return $this->belongsTo('Task', 'task_parent');
	}
}
