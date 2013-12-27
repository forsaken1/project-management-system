@extends('layouts.main')

@section('main')

<h1>Отчеты по задаче: {{{ $task->name }}}</h1>

@if($task->reports->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Отчет</th>
				<th>Время начала</th>
				<th>Время конца</th>
			</tr>
		</thead>

		<tbody>
			<?php $all_time = 0 ?>
			@foreach($task->reports as $report)
				<tr>
					<td>{{{ $report->text }}}</td>
					<td>{{{ $report->time_start }}}</td>
					<td>{{{ $report->time_end }}}</td>
					<?php $start = new DateTime($report->time_start) ?>
					<?php $end = new DateTime($report->time_end) ?>
					<?php $t = 0 ?>
					<td>{{{ $t = $end->diff($start)->format("%h") }}} часов</td>
					<?php $all_time += $t ?>
				</tr>
			@endforeach
		</tbody>
	</table>

	Всего затрачено времени: {{{ $all_time }}} часов
@else
	Нет деятельности
@endif

@stop