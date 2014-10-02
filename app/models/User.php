<?php

use Zizaco\Confide\ConfideUser;

class User extends ConfideUser {

	public static $rules = array(
        'username' => 'required|alpha_dash|unique:users',
        'email' => 'required|email|unique:users',
        'password' => 'required|between:4,11|confirmed',
        'password_confirmation' => 'between:4,11',
		'first_name' => 'max:64',
		'last_name' => 'max:64',
	);

	function beforeSave($forced = false)
	{
		unset($this->password_confirmation);
		parent::beforeSave();
	}

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