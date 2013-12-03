@extends('admin.layouts.main')

@section('main')

<h1>Создать проект</h1>

{{ Form::open(array('route' => 'admin.projects.store')) }}
	<ul>
        <li>
            {{ Form::label('name', 'Название:') }}
            {{ Form::text('name') }}
        </li>

        <li>
            {{ Form::label('date_start', 'Дата начала:') }}
            {{ Form::text('date_start') }}
        </li>

        <li>
            {{ Form::label('date_end', 'Дата окончания:') }}
            {{ Form::text('date_end') }}
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


