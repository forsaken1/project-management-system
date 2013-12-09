@extends('layouts.main')

@section('main')

<h1>Отчеты по проекту: {{{ $project->name }}}</h1>

@if($project->tasks->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Задача</th>
				<th>Исполнитель</th>
				<th>Продолжительность</th>
			</tr>
		</thead>

		<tbody>
			@foreach($project->tasks as $task)
				<tr>
					<td>{{{ $task->name }}}</td>
					<td>{{{ $task->employee ? $task->employee->name : 'Нет' }}}</td>
					<td>{{{ $task->work_time }}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	Всего затрачено времени: {{{ array_sum($task->lists('work_time')) }}}
@else
	Нет деятельности
@endif

@stop