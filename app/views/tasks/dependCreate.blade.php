@extends('layouts.main')

@section('main')

<h1>Создать зависимость</h1>

{{ Form::open(array('route' => 'tasks.dependSave')) }}
	<ul>
        <li>
            {{ Form::label('task_parent', 'Родительская задача:') }}
            {{ Form::select('task_parent', $tasks->lists('name', 'id')) }}
        </li>

        <li>
            {{ Form::label('task_child', 'Дочерняя задача:') }}
            {{ Form::select('task_child', $tasks->lists('name', 'id')) }}
        </li>
        <br>

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