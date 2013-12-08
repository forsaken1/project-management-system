@extends('layouts.main')

@section('main')

<h1>Личный кабинет</h1>

<ul>
	<li>Имя: {{{ $user->first_name }}}</li>
	<li>Фамилия: {{{ $user->last_name }}}</li>
	<li>Логин: {{{ $user->username }}}</li>
	<li>Email: {{{ $user->email }}}</li>
	<li>Администратор: {{{ $user->is_admin ? 'Да' : 'Нет' }}}</li>
</ul>

@stop