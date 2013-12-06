@extends('layouts.main')

@section('main')

<h1>Редактировать задачу</h1>
{{ Form::model($task, array('method' => 'PATCH', 'route' => array('tasks.update', $task->id))) }}
	<ul>
        <li>
            {{ Form::label('name', 'Название:') }}
            {{ Form::text('name') }}
        </li>

        <li>
            {{ Form::label('priority', 'Приоритет:') }}
            {{ Form::prioritySelector($task->priority) }}
        </li>

        <li>
            {{ Form::label('status', 'Статус:') }}
            {{ Form::statusSelector($task->status) }}
        </li>

        <li>
            {{ Form::label('work_time', 'Время работы:') }}
            {{ Form::input('number', 'work_time') }}
        </li>

        <li>
            {{ Form::label('stage_id', 'Стадия:') }}
            {{ Form::select('stage_id', Stage::all()->lists('name', 'id'), $task->stage->id) }}
        </li>

        <li>
            {{ Form::label('employer_id', 'Работник:') }}
            {{ Form::select('employer_id', Employee::all()->lists('name', 'id'), $task->employee_id) }}
        </li>

		<li>
			{{ Form::submit('Сохранить', array('class' => 'btn btn-info')) }}
			{{ link_to_route('tasks.show', 'Отмена', $task->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
