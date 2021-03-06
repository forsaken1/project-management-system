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

@if($project->employee->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Имя и Фамилия</th>
			</tr>
		</thead>

		<tbody>
			@foreach($project->employee as $employee)
				<tr>
					<td>{{{ $employee->name }}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	Нет участников
@endif

<h2>Стадии</h2>

@if ($project->stages->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Название</th>
				<th>Вес</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($project->stages as $stage)
				<tr>
					<td><a href = '/stages/{{{ $stage->id }}}'>{{{ $stage->name }}}</a></td>
					<td>{{{ $stage->weight }}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	Нет стадий
@endif

<script type="text/javascript">
$(function()
{
	localStorage.setItem('project_id', '{{{ $project->id }}}');
})
</script>

@stop
