@extends('layouts.main')

@section('main')

<h1>Создать отчет</h1>

{{ Form::open(array('route' => 'reports.store')) }}
	<ul>
        <li>
            {{ Form::label('time_start', 'Время начала:') }}
            {{ Form::text('time_start') }}
        </li>

        <li>
            {{ Form::label('time_end', 'Время конца:') }}
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
			{{ Form::submit('Создать', array('class' => 'btn btn-info')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop


