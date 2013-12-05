@extends('layouts.main')

@section('main')

<h1>Проект: {{{ $project->name }}}</h1>

<p>{{ link_to_route('projects.index', 'Назад ко всем проектам') }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Дата начала</th>
			<th>Дата окончания</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $project->date_start }}}</td>
			<td>{{{ $project->date_end }}}</td>
		</tr>
	</tbody>
</table>

<h2>Участники</h2>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Имя</th>
			<th>Фамилия</th>
		</tr>
	</thead>

	<tbody>
		@foreach($project->employee as $employee)
			<tr>
				<td>{{{ $employee->user->first_name }}}</td>
				<td>{{{ $employee->user->last_name }}}</td>
			</tr>
		@endforeach
	</tbody>
</table>
@stop
