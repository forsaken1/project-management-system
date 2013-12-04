@extends('layouts.scaffold')

@section('main')

<h1>Create Task</h1>

{{ Form::open(array('route' => 'tasks.store')) }}
	<ul>
        <li>
            {{ Form::label('priority', 'Priority:') }}
            {{ Form::input('number', 'priority') }}
        </li>

        <li>
            {{ Form::label('status', 'Status:') }}
            {{ Form::input('number', 'status') }}
        </li>

        <li>
            {{ Form::label('work_time', 'Work_time:') }}
            {{ Form::input('number', 'work_time') }}
        </li>

        <li>
            {{ Form::label('stage_id', 'Stage_id:') }}
            {{ Form::input('number', 'stage_id') }}
        </li>

        <li>
            {{ Form::label('employer_id', 'Employer_id:') }}
            {{ Form::input('number', 'employer_id') }}
        </li>

        <li>
            {{ Form::label('project_id', 'Project_id:') }}
            {{ Form::input('number', 'project_id') }}
        </li>

        <li>
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name') }}
        </li>

		<li>
			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop


