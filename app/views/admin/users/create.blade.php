@extends('admin.layouts.main')

@section('main')

<h1>Создать пользователя</h1>

{{ Form::open(array('route' => 'admin.users.store')) }}
	<ul>
        <li>
            {{ Form::label('first_name', 'Имя:') }}
            {{ Form::text('first_name') }}
        </li>

        <li>
            {{ Form::label('last_name', 'Фамилия:') }}
            {{ Form::text('last_name') }}
        </li>

        <li>
            {{ Form::label('email', 'Email:') }}
            {{ Form::text('email') }}
        </li>

        <li>
            {{ Form::label('username', 'Логин:') }}
            {{ Form::text('username') }}
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
            {{ Form::checkbox('is_admin', '1') }}
            <br>
        </li>

		<li>
			{{ Form::submit('Создать', array('class' => 'btn btn-info')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop


