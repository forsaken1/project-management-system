@extends('layouts.main')

@section('main')

<h1>Отчеты по деятельности</h1>

<h2>Проекты</h2>

@if ($projects->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Название</th>
				<th>Количество участников</th>
				<th>Дата начала</th>
				<th>Дата окончания</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($projects as $project)
				<tr>
					<td><a href = '/statistics/projects/{{{ $project->id }}}'>{{{ $project->name }}}</a></td>
					<td>{{{ $project->employee->count() }}}</td>
					<td>{{{ $project->date_start }}}</td>
					<td>{{{ $project->date_end }}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	Нет проектов
@endif

<h2>Исполнители</h2>

@if($employees->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Имя и Фамилия</th>
			</tr>
		</thead>

		<tbody>
			@foreach($employees as $employee)
				<tr>
					<td><a href = '/statistics/employees/{{{ $employee->id }}}'>{{{ $employee->name }}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	Нет участников
@endif

<h2>Задачи</h2>

@if ($tasks->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Название</th>
				<th>Приоритет</th>
				<th>Статус</th>
				<th>Время работы</th>
				<th>Работник</th>
				<th>Проект</th>
				<th>Стадия</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($tasks as $task)
				<tr>
					<td><a href = '/statistics/tasks/{{{ $task->id }}}'>{{{ $task->name }}}</a></td>
					<td>{{{ Form::priority($task->priority) }}}</td>
					<td>{{{ Form::status($task->status) }}}</td>
					<td>{{{ $task->work_time }}} часов</td>
					<td>{{{ $task->employee ? $task->employee->name : 'Нет' }}}</td>
					<td>{{{ $task->project->name }}}</td>
					@if($task->stage)
						<td>{{{ $task->stage->name }}}</td>
					@else
						<td>Нет</td>
					@endif
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	Нет задач
@endif

@stop