@extends('admin.layouts.main')

@section('main')

<h1>Редактировать проект</h1>

{{ Form::model($project, array('method' => 'PATCH', 'route' => array('admin.projects.update', $project->id))) }}
	<ul>
        <li>
            {{ Form::label('name', 'Название:') }}
            {{ Form::text('name') }}
        </li>

        <li>
            {{ Form::label('date_start', 'Дата начала:') }}
            {{ Form::text('date_start', $project->date_start) }}
        </li>

        <li>
            {{ Form::label('date_end', 'Дата окончания:') }}
            {{ Form::text('date_end', $project->date_end) }}
        </li>

		<li>
			{{ Form::submit('Сохранить', array('class' => 'btn btn-info')) }}
			{{ link_to_route('admin.projects.show', 'Cancel', $project->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

<link rel="stylesheet" type="text/css" href="/plugins/anytime/anytime.compressed.css" />
<script src="/plugins/anytime/jquery-migrate-1.0.0.js"></script><!-- if jQuery 1.9+ -->
<script src="/plugins/anytime/anytime.compressed.js"></script>

<script>
$('#date_start').AnyTime_noPicker().AnyTime_picker().focus();
$('#date_end').AnyTime_noPicker().AnyTime_picker().focus();
</script>

@stop
