@extends('layouts.main')

@section('main')

<link rel=stylesheet href="/plugins/jQueryGantt/platform.css" type="text/css">
<link rel=stylesheet href="/plugins/jQueryGantt/libs/dateField/jquery.dateField.css" type="text/css">
<link rel=stylesheet href="/plugins/jQueryGantt/gantt.css" type="text/css">

<script src="/plugins/jquery-ui/jquery-1.7.js"></script>
<script src="/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
 
<script src="/plugins/jQueryGantt/libs/jquery.livequery.min.js"></script>
<script src="/plugins/jQueryGantt/libs/jquery.timers.js"></script>
<script src="/plugins/jQueryGantt/libs/platform.js"></script>
<script src="/plugins/jQueryGantt/libs/date.js"></script>
<script src="/plugins/jQueryGantt/libs/i18nJs.js"></script>
<script src="/plugins/jQueryGantt/libs/dateField/jquery.dateField.js"></script>
<script src="/plugins/jQueryGantt/libs/JST/jquery.JST.js"></script>
 
<script src="/plugins/jQueryGantt/ganttUtilities.js"></script>
<script src="/plugins/jQueryGantt/ganttTask.js"></script>
<script src="/plugins/jQueryGantt/ganttDrawer.js"></script>
<script src="/plugins/jQueryGantt/ganttGridEditor.js"></script>
<script src="/plugins/jQueryGantt/ganttMaster.js"></script>

@if($projects->count())
	@foreach($projects as $project)
		<?php
			date_default_timezone_set('Pacific/Fiji');
			setlocale(LC_ALL, 'ru_RU');
			foreach($project->tasks as $task)
			{
				if(!$task->reports->count())
					continue;

				$max = date_create('1970-01-01 00:00:00');
				$min = date_create('2100-12-12 00:00:00');
				foreach($task->reports as $report)
				{
					$min = ($d = date_create($report->time_start) ) < $min ? $d : $min;
					$max = ($d = date_create($report->time_end  ) ) > $max ? $d : $max;
				}
				$data[] = array(
					'label' => $task->name,
					'start' => $min->format("Y-m-d"),
					'end'   => $max->format("Y-m-d")
				);
			}
			$gantti = new Gantti($data, array(
				'title'      => substr($project->name, 0, 10).'.',
				'cellwidth'  => 25,
				'cellheight' => 35
			));
			//echo $gantti;
		?>
	@endforeach
@else
	Нет проектов
@endif

@stop