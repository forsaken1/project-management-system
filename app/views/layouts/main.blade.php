<!doctype html>
<html>
	<head>
		<meta charset="utf-8">

		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
		<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>

		<link type="text/css" href="/plugins/calendar/css/jquery.simple-dtpicker.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="/css/styles.css" />
		<link rel="stylesheet" type="text/css" href="/css/screen.css" />

		<script type="text/javascript" src="/plugins/calendar/js/jquery.simple-dtpicker.js"></script>
		<script type="text/javascript" src="/js/scripts.js"></script>
	</head>

	<body>

		<div class="container">

			@include('layouts.blocks.header')

			<div class = 'header-margin'></div>

			@if (Session::has('message'))
				<div class="flash alert">
					<p>{{ Session::get('message') }}</p>
				</div>
			@endif

			@yield('main')
		</div>

	</body>

</html>