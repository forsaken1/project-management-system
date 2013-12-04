@extends('layouts.main')

@section('main')

<h1>Проект: {{{ $project->name }}}</h1>

<p>{{ link_to_route('projects.index', 'Назад ко всем проектам') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Название</th>
			<th>Дата начала</th>
			<th>Дата окончания</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $project->name }}}</td>
			<td>{{{ $project->date_start }}}</td>
			<td>{{{ $project->date_end }}}</td>
		</tr>
	</tbody>
</table>

@stop
