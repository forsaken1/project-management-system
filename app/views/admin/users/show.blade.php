@extends('admin.layouts.main')

@section('main')

<h1>Show User</h1>

<p>{{ link_to_route('admin.users.index', 'Назад ко всем пользователям') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Имя</th>
			<th>Фамилия</th>
			<th>Логин</th>
			<th>Email</th>
			<th>Администратор</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $user->first_name }}}</td>
			<td>{{{ $user->last_name }}}</td>
			<td>{{{ $user->username }}}</td>
			<td>{{{ $user->email }}}</td>
			<td>{{{ $user->is_admin ? 'Да' : 'Нет' }}}</td>
            <td>{{ link_to_route('admin.users.edit', 'Редактировать', array($user->id), array('class' => 'btn btn-info')) }}</td>
            <td>
                {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.users.destroy', $user->id))) }}
                    {{ Form::submit('Удалить', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
            </td>
		</tr>
	</tbody>
</table>

@stop
