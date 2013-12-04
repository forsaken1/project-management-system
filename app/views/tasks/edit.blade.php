@extends('layouts.scaffold')

@section('main')

<h1>Edit Task</h1>
{{ Form::model($task, array('method' => 'PATCH', 'route' => array('tasks.update', $task->id))) }}
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
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('tasks.show', 'Cancel', $task->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
