<?php

use Zizaco\Confide\ConfideUser;

class User extends ConfideUser {

	public function employee()
	{
		return $this->hasMany('Employee', 'user_id');
	}

	public function getRoleInProject($id)
	{
		$e = $this->employee;
		return isset($e->lists('role', 'project_id')[$id]) ? $e->lists('role', 'project_id')[$id] : 0;
	}
}