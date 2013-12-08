@extends('layouts.main')

@section('main')

<h1>Стадия: {{{ $stage->name }}}</h1>

<p>{{ link_to_route('stages.index', 'Назад ко всем стадиям') }}</p>

<table class="table table-striped">
	<thead>
		<tr>	
			<th>Проект</th>
			<th>Вес</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td><a href = '/projects/{{{ $stage->project->id }}}'>{{{ $stage->project->name }}}</a></td>
			<td>{{{ $stage->weight }}}</td>
		</tr>
	</tbody>
</table>

<h2>Задачи</h2>

@if ($stage->tasks->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Название</th>
				<th>Приоритет</th>
				<th>Статус</th>
				<th>Время работы</th>
				<th>Работник</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($stage->tasks as $task)
				<tr>
					<td><a href = '/tasks/{{{ $task->id }}}'>{{{ $task->name }}}</a></td>
					<td>{{{ $task->priority }}}</td>
					<td>{{{ $task->status }}}</td>
					<td>{{{ $task->work_time }}}</td>
					<td>{{{ $task->employee->name }}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	Нет задач
@endif

@stop
