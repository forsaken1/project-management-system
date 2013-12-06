@extends('layouts.main')

@section('main')

<h1>Все задачи</h1>

<p>{{ link_to_route('tasks.create', 'Добавить новую задачу') }}</p>

@if ($tasks->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Название</th>
				<th>Приоритет</th>
				<th>Статус</th>
				<th>Время работы</th>
				<th>Работник</th>
				<th>Проект</th>
				<th>Стадия</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($tasks as $task)
				<tr>
					<td><a href = '/tasks/{{{ $task->id }}}'>{{{ $task->name }}}</a></td>
					<td>{{{ Form::priority($task->priority) }}}</td>
					<td>{{{ Form::status($task->status) }}}</td>
					<td>{{{ $task->work_time }}} часов</td>
					<td>{{{ $task->employee->user->first_name.' '.$task->employee->user->last_name }}}</td>
					<td><a href = '/projects/{{{ $task->project->id }}}'>{{{ $task->project->name }}}</a></td>
					<td><a href = '/stages/{{{ $task->stage->id }}}'>{{{ $task->stage->name }}}</a></td>
                    <td>{{ link_to_route('tasks.edit', 'Редактировать', array($task->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('tasks.destroy', $task->id))) }}
                            {{ Form::submit('Удалить', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	Нет задач
@endif

@stop
