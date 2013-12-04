@extends('layouts.main')

@section('main')

<h1>Создать задачу</h1>

{{ Form::open(array('route' => 'tasks.store')) }}
	<ul>
        <li>
            {{ Form::label('name', 'Название:') }}
            {{ Form::text('name') }}
        </li>

        <li>
            {{ Form::label('priority', 'Приоритет:') }}
            {{ Form::input('number', 'priority') }}
        </li>

        <li>
            {{ Form::label('status', 'Статус:') }}
            {{ Form::input('number', 'status') }}
        </li>

        <li>
            {{ Form::label('work_time', 'Время работы:') }}
            {{ Form::input('number', 'work_time') }}
        </li>

        <li>
            {{ Form::label('stage_id', 'Стадия:') }}
            {{ Form::input('number', 'stage_id') }}
        </li>

        <li>
            {{ Form::label('employer_id', 'Работник:') }}
            {{ Form::input('number', 'employer_id') }}
        </li>

        <li>
            {{ Form::label('project_id', 'Проект:') }}
            {{ Form::input('number', 'project_id') }}
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


