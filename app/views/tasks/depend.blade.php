@extends('layouts.main')

@section('main')

<h1>Все задачи</h1>

<p>{{ link_to_route('tasks.dependCreate', 'Добавить новую зависимость') }}</p>

@if ($depends->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Родительская задача</th>
				<th>Дочерняя задача</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($depends as $depend)
				<tr>
					<td><a href = '/tasks/{{{ $depend->parent->id }}}'>{{{ $depend->parent->name }}}</a></td>
					<td><a href = '/tasks/{{{ $depend->child->id }}}'>{{{ $depend->child->name }}}</a></td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('tasks.dependDelete', $depend->id))) }}
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