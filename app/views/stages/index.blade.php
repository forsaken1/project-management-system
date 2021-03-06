@extends('layouts.main')

@section('main')

<h1>Все стадии</h1>

<p>{{ link_to_route('stages.create', 'Добавить новую стадию') }}</p>

@if ($stages->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Название</th>
				<th>Проект</th>
				<th>Вес</th>
				<th>Статус</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($stages as $stage)
				<tr>
					<td><a href = '/stages/{{{ $stage->id }}}'>{{{ $stage->name }}}</a></td>
					<td><a href = '/projects/{{{ $stage->project->id }}}'>{{{ $stage->project->name }}}</a></td>
					<td>{{{ $stage->weight }}}</td>
					<td>{{{ $stage->completed ? 'Завершена' : 'В работе' }}}</td>
                    <td>{{ link_to_route('stages.edit', 'Редактировать', array($stage->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('stages.destroy', $stage->id))) }}
                            {{ Form::submit('Удалить', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	Нет стадий
@endif

@stop
