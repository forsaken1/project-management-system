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
			<?php $all_time = 0; ?>
			@foreach($project->tasks as $task)
				<tr>
					<td>{{{ $task->name }}}</td>
					<td>{{{ $task->employee ? $task->employee->name : 'Нет' }}}</td>
					<?php
						$diff = 0;
						foreach($task->reports as $report)
						{
							$start = date_create($report->time_start);
							$end = date_create($report->time_end);
							$diff += $end->diff($start)->format("%h");
						}
						$all_time += $diff;
					?>
					<td>{{{ $diff }}} часов</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	Всего затрачено времени: {{{ $all_time }}} часов
@else
	Нет деятельности
@endif

@stop