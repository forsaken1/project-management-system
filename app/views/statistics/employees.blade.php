@extends('layouts.main')

@section('main')

<h1>Отчеты по исполнителю: {{{ $employee->name }}}</h1>

@if($employee->reports->count())
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
			@foreach($employee->reports as $report)
				<tr>
					<td>{{{ $report->text }}}</td>
					<td>{{{ $report->time_start }}}</td>
					<td>{{{ $report->time_end }}}</td>
					<?php $start = new DateTime($report->time_start) ?>
					<?php $end = new DateTime($report->time_end) ?>
					<?php $t = 0 ?>
					<td>{{{ $t = $start->diff($end)->days }}}</td>
					<?php $all_time += $t ?>
				</tr>
			@endforeach
		</tbody>
	</table>

	Всего затрачено времени: {{{ $all_time }}}
@else
	Нет деятельности
@endif

@stop