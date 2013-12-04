@extends('layouts.main')

@section('main')

<h1>Задача: {{{ $task->name }}}</h1>

<p>{{ link_to_route('tasks.index', 'Назад ко всем задачам') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Название</th>
			<th>Приоритет</th>
			<th>Статус</th>
			<th>Время работы</th>
			<th>Стадия</th>
			<th>Работник</th>
			<th>Проект</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $task->name }}}</td>
			<td>{{{ $task->priority }}}</td>
			<td>{{{ $task->status }}}</td>
			<td>{{{ $task->work_time }}}</td>
			<td>{{{ $task->stage_id }}}</td>
			<td>{{{ $task->employer_id }}}</td>
			<td>{{{ $task->project_id }}}</td>
            <td>{{ link_to_route('tasks.edit', 'Редактировать', array($task->id), array('class' => 'btn btn-info')) }}</td>
            <td>
                {{ Form::open(array('method' => 'DELETE', 'route' => array('tasks.destroy', $task->id))) }}
                   {{ Form::submit('Удалить', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
            </td>
		</tr>
	</tbody>
</table>

@stop
