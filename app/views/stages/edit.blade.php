@extends('layouts.main')

@section('main')

<h1>Редактировать стадию</h1>
{{ Form::model($stage, array('method' => 'PATCH', 'route' => array('stages.update', $stage->id))) }}
	<ul>
        <li>
            {{ Form::label('name', 'Название:') }}
            {{ Form::text('name') }}
        </li>

        <li>
            {{ Form::label('project_id', 'Проект:') }}
            {{ Form::select('project_id', Project::all()->lists('name', 'id'), $stage->project_id) }}
        </li>

        <li>
            {{ Form::label('weight', 'Вес:') }}
            {{ Form::input('number', 'weight') }}
        </li>

		<li>
			{{ Form::submit('Сохранить', array('class' => 'btn btn-info')) }}
			{{ link_to_route('stages.show', 'Отмена', $stage->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
