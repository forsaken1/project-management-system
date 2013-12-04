@extends('layouts.scaffold')

@section('main')

<h1>Edit Report</h1>
{{ Form::model($report, array('method' => 'PATCH', 'route' => array('reports.update', $report->id))) }}
	<ul>
        <li>
            {{ Form::label('time_start', 'Time_start:') }}
            {{ Form::text('time_start') }}
        </li>

        <li>
            {{ Form::label('time_end', 'Time_end:') }}
            {{ Form::text('time_end') }}
        </li>

        <li>
            {{ Form::label('text', 'Text:') }}
            {{ Form::textarea('text') }}
        </li>

        <li>
            {{ Form::label('task_id', 'Task_id:') }}
            {{ Form::text('task_id') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('reports.show', 'Cancel', $report->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
