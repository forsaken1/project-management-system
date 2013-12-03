@extends('layouts.scaffold')

@section('main')

<h1>Все проекты</h1>

<p>{{ link_to_route('admin.projects.create', 'Создать новый проект') }}</p>

@if ($projects->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Название</th>
				<th>Дата начала</th>
				<th>Дата окончания</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($projects as $project)
				<tr>
					<td>{{{ $project->name }}}</td>
					<td>{{{ $project->date_start }}}</td>
                    <td>{{ link_to_route('admin.projects.edit', 'Редактировать', array($project->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.projects.destroy', $project->id))) }}
                            {{ Form::submit('Удалить', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	Нет проектов
@endif

@stop
