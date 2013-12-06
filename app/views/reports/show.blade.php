@extends('layouts.main')

@section('main')

<h1>Отчет #{{{ $report->id }}}</h1>

<p>{{ link_to_route('reports.index', 'Назад ко всем отчетам') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Время начала</th>
			<th>Время окончания</th>
			<th>Отчет</th>
			<th>Задача</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $report->time_start }}}</td>
			<td>{{{ $report->time_end }}}</td>
			<td>{{{ $report->text }}}</td>
			<td><a href = '/tasks/{{{ $report->task_id }}}'>{{{ $report->task->name }}}</a></td>
            <td>{{ link_to_route('reports.edit', 'Редактировать', array($report->id), array('class' => 'btn btn-info')) }}</td>
            <td>
                {{ Form::open(array('method' => 'DELETE', 'route' => array('reports.destroy', $report->id))) }}
                    {{ Form::submit('Удалить', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
            </td>
		</tr>
	</tbody>
</table>

@stop
