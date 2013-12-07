@extends('layouts.main')

@section('main')

<h1>Все отчеты</h1>

<p>{{ link_to_route('reports.create', 'Добавить новый отчет') }}</p>

@if ($reports->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>#</th>
				<th>Работник</th>
				<th>Отчет</th>
				<th>Время начала</th>
				<th>Время окончания</th>
				<th>Задача</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($reports as $report)
				<tr>
					<td><a href = '/reports/{{{ $report->id }}}'>{{{ $report->id }}}</a></td>
					<td>{{{ $report->employee ? $report->employee->name : 'Нет' }}}</td>
					<td>{{{ $report->text }}}</td>
					<td>{{{ $report->time_start }}}</td>
					<td>{{{ $report->time_end }}}</td>
					<td><a href = '/tasks/{{{ $report->task_id }}}'>{{{ $report->task->name }}}</a></td>
                    <td>{{ link_to_route('reports.edit', 'Редактировать', array($report->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('reports.destroy', $report->id))) }}
                            {{ Form::submit('Удалить', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	Нет отчетов
@endif

@stop
