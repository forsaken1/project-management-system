@extends('layouts.main')

@section('main')

<h1>Редактировать отчет</h1>
{{ Form::model($report, array('method' => 'PATCH', 'route' => array('reports.update', $report->id))) }}
	<ul>
        <li>
            {{ Form::label('time_start', 'Время начала:') }}
            {{ Form::text('time_start') }}
        </li>

        <li>
            {{ Form::label('time_end', 'Время окончания:') }}
            {{ Form::text('time_end') }}
        </li>

        <li>
            {{ Form::label('text', 'Отчет:') }}
            {{ Form::textarea('text') }}
        </li>

        <li>
            {{ Form::label('task_id', 'Задача:') }}
            {{ Form::text('task_id') }}
        </li>

		<li>
			{{ Form::submit('Редактировать', array('class' => 'btn btn-info')) }}
			{{ link_to_route('reports.show', 'Отмена', $report->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
