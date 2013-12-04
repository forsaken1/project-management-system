@extends('layouts.scaffold')

@section('main')

<h1>Show Report</h1>

<p>{{ link_to_route('reports.index', 'Return to all reports') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Time_start</th>
				<th>Time_end</th>
				<th>Text</th>
				<th>Task_id</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $report->time_start }}}</td>
					<td>{{{ $report->time_end }}}</td>
					<td>{{{ $report->text }}}</td>
					<td>{{{ $report->task_id }}}</td>
                    <td>{{ link_to_route('reports.edit', 'Edit', array($report->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('reports.destroy', $report->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
