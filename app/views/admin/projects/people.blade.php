@extends('admin.layouts.main')

@section('main')

<h1>Добавить людей к проекту</h1>

<p>{{ link_to_route('admin.projects.index', 'Назад ко всем проектам') }}</p>

@if ($users->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Имя</th>
				<th>Фамилия</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($users as $user)
				<tr>
					<td>{{{ $user->first_name }}}</td>
					<td>{{{ $user->last_name }}}</td>
                    <td>
                        <input value = 'Назначить менеджером' class = 'btn btn-danger' style = 'width:200px' onclick = 'AddManager(this, {{{ $project_id }}}, {{{ $user->id }}})'>
                    </td>
                    <td>
                        <input value = 'Назначить исполнителем' class = 'btn btn-danger' style = 'width:200px' onclick = 'AddEmployee(this, {{{ $project_id }}}, {{{ $user->id }}})'>
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	Нет пользователей
@endif

@stop