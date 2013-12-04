@extends('layouts.scaffold')

@section('main')

<h1>Show Stage</h1>

<p>{{ link_to_route('stages.index', 'Return to all stages') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Name</th>
				<th>Project_id</th>
				<th>Weight</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $stage->name }}}</td>
					<td>{{{ $stage->project_id }}}</td>
					<td>{{{ $stage->weight }}}</td>
                    <td>{{ link_to_route('stages.edit', 'Edit', array($stage->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('stages.destroy', $stage->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
