@extends('layouts.main')

@section('main')

<h1>Задача: {{{ $task->name }}}</h1>

<p>{{ link_to_route('tasks.index', 'Назад ко всем задачам') }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Приоритет</th>
			<th>Статус</th>
			<th>Время работы</th>
			<th>Работник</th>
			<th>Проект</th>
			<th>Стадия</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ Form::priority($task->priority) }}}</td>
			<td>{{{ Form::status($task->status) }}}</td>
			<td>{{{ $task->work_time }}} часов</td>
			<td>{{{ $task->employee ? $task->employee->name : 'Нет' }}}</td>
			<td><a href = '/projects/{{{ $task->project->id }}}'>{{{ $task->project->name }}}</a></td>
			@if($task->stage)
				<td><a href = '/stages/{{{ $task->stage->id }}}'>{{{ $task->stage->name }}}</a></td>
			@else
				<td>Нет</td>
			@endif
            <td>{{ link_to_route('tasks.edit', 'Редактировать', array($task->id), array('class' => 'btn btn-info')) }}</td>
            <td>
                {{ Form::open(array('method' => 'DELETE', 'route' => array('tasks.destroy', $task->id))) }}
                    {{ Form::submit('Удалить', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
            </td>
		</tr>
	</tbody>
</table>

<h2>Отчеты</h2>

@if ($task->reports->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>#</th>
				<th>Работник</th>
				<th>Отчет</th>
				<th>Время начала</th>
				<th>Время окончания</th>
				<th>Задача</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($task->reports as $report)
				<tr>
					<td><a href = '/reports/{{{ $report->id }}}'>{{{ $report->id }}}</a></td>
					<td>{{{ $report->employee ? $report->employee->name : 'Нет' }}}</td>
					<td>{{{ $report->text }}}</td>
					<td>{{{ $report->time_start }}}</td>
					<td>{{{ $report->time_end }}}</td>
					<td><a href = '/tasks/{{{ $report->task_id }}}'>{{{ $report->task->name }}}</a></td>
                    <td>{{ link_to_route('reports.edit', 'Редактировать', array($report->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('reports.destroy', $report->id))) }}
                            {{ Form::submit('Удалить', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	Нет отчетов
@endif

<h2>Дочерние задачи</h2>

<?php
	$tasks_ = DB::table('task_task')->where('task_parent', $task->id)->get();
	foreach($tasks_ as $val)
	{
		$tasks[] = Task::find($val->task_child);
	}
?>

@if (isset($tasks) && count($tasks))
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
					<td>{{{ $task->employee ? $task->employee->name : 'Нет' }}}</td>
					<td><a href = '/projects/{{{ $task->project->id }}}'>{{{ $task->project->name }}}</a></td>
					@if($task->stage)
						<td><a href = '/stages/{{{ $task->stage->id }}}'>{{{ $task->stage->name }}}</a></td>
					@else
						<td>Нет</td>
					@endif
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
