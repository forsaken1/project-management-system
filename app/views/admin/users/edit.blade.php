@extends('admin.layouts.main')

@section('main')

<h1>Редактировать пользователя: {{{ $user->first_name.' '.$user->last_name }}}</h1>
{{ Form::model($user, array('method' => 'PATCH', 'route' => array('admin.users.update', $user->id))) }}
	<ul>
        <li>
            {{ Form::label('first_name', 'Имя:') }}
            {{ Form::text('first_name', $user->first_name) }}
        </li>

        <li>
            {{ Form::label('last_name', 'Фамилия:') }}
            {{ Form::text('last_name', $user->last_name) }}
        </li>

        <li>
            {{ Form::label('email', 'Email:') }}
            {{ Form::text('email', $user->email) }}
        </li>

        <li>
            {{ Form::label('username', 'Логин:') }}
            {{ Form::text('username', $user->username) }}
        </li>

        <li>
            {{ Form::label('password', 'Пароль:') }}
            {{ Form::password('password') }}
        </li>

        <li>
            {{ Form::label('password_confirmation', 'Подтверждение пароля:') }}
            {{ Form::password('password_confirmation') }}
        </li>

        <li>
            {{ Form::label('is_admin', 'Администратор') }}
            {{ Form::checkbox('is_admin', '1', $user->is_admin) }}
            <br>
        </li>

		<li>
			{{ Form::submit('Редактировать', array('class' => 'btn btn-info')) }}
			{{ link_to_route('admin.users.show', 'Отмена', $user->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
