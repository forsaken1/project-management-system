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
            {{ Form::label('work_time', 'Время работы:') }}
            {{ Form::input('number', 'work_time') }}
        </li>
        
        <li>
            {{ Form::label('priority', 'Приоритет:') }}
            {{ Form::prioritySelector('priority') }}
        </li>

        <li>
            {{ Form::label('status', 'Статус:') }}
            {{ Form::statusSelector('status') }}
        </li>

        <li>
            {{ Form::label('stage_id', 'Стадия:') }}
            {{ Form::select('stage_id', ['0' => 'Нет'] + Stage::all()->lists('name', 'id')) }}
        </li>

        <li>
            {{ Form::label('employer_id', 'Работник:') }}
            {{ Form::select('employer_id', ['0' => 'Нет'] + Employee::all()->lists('name', 'id')) }}
        </li>

        <li>
            {{ Form::label('project_id', 'Проект:') }}
            {{ Form::select('project_id', Project::all()->lists('name', 'id')) }}
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


