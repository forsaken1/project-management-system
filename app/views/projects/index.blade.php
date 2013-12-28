@extends('layouts.main')

@section('main')

<h1>Все проекты</h1>

@if ($projects->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Название</th>
				<th>Количество участников</th>
				<th>Дата начала</th>
				<th>Дата окончания</th>
				<th>Статус</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($projects as $project)
				<tr>
					<td><a href = '/projects/{{{ $project->id }}}'>{{{ $project->name }}}</a></td>
					<td>{{{ $project->employee->count() }}}</td>
					<td>{{{ $project->date_start }}}</td>
					<td>{{{ $project->date_end }}}</td>
					<td>{{{ $project->getStatus() }}}%</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	Нет проектов
@endif

@stop
