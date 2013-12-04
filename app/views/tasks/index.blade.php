@extends('layouts.scaffold')

@section('main')

<h1>All Tasks</h1>

<p>{{ link_to_route('tasks.create', 'Add new task') }}</p>

@if ($tasks->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Priority</th>
				<th>Status</th>
				<th>Work_time</th>
				<th>Stage_id</th>
				<th>Employer_id</th>
				<th>Project_id</th>
				<th>Name</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($tasks as $task)
				<tr>
					<td>{{{ $task->priority }}}</td>
					<td>{{{ $task->status }}}</td>
					<td>{{{ $task->work_time }}}</td>
					<td>{{{ $task->stage_id }}}</td>
					<td>{{{ $task->employer_id }}}</td>
					<td>{{{ $task->project_id }}}</td>
					<td>{{{ $task->name }}}</td>
                    <td>{{ link_to_route('tasks.edit', 'Edit', array($task->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('tasks.destroy', $task->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no tasks
@endif

@stop
