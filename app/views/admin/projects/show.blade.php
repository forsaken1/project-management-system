@extends('admin.layouts.main')

@section('main')

<h1>Проект: {{{ $project->name }}}</h1>

<p>{{ link_to_route('admin.projects.index', 'Назад ко всем проектам') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Название</th>
			<th>Дата начала</th>
			<th>Дата окончания</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $project->name }}}</td>
			<td>{{{ $project->date_start }}}</td>
			<td>{{{ $project->date_end }}}</td>
            <td>{{ link_to_route('admin.projects.edit', 'Редактировать', array($project->id), array('class' => 'btn btn-info')) }}</td>
            <td>
                {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.projects.destroy', $project->id))) }}
                    {{ Form::submit('Удалить', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
            </td>
		</tr>
	</tbody>
</table>

@stop
