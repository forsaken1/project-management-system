@extends('layouts.scaffold')

@section('main')

<h1>Show Project</h1>

<p>{{ link_to_route('admin.projects.index', 'Return to all projects') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Name</th>
				<th>Date_start</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $project->name }}}</td>
					<td>{{{ $project->date_start }}}</td>
                    <td>{{ link_to_route('admin.projects.edit', 'Edit', array($project->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.projects.destroy', $project->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
