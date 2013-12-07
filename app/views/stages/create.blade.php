@extends('layouts.main')

@section('main')

<h1>Создать стадию</h1>

{{ Form::open(array('route' => 'stages.store')) }}
	<ul>
        <li>
            {{ Form::label('name', 'Название:') }}
            {{ Form::text('name') }}
        </li>

        <li>
            {{ Form::label('project_id', 'Проект:') }}
            {{ Form::select('project_id', Project::all()->lists('name', 'id')) }}
        </li>

        <li>
            {{ Form::label('weight', 'Вес:') }}
            {{ Form::input('number', 'weight') }}
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


