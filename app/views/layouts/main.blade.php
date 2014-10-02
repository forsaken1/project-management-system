<!doctype html>
<html>
	<head>
		<meta charset="utf-8">

		<script src="/js/jquery.js"></script>
		<link rel="stylesheet" href="/css/bootstrap.css">
		<script src="/js/bootstrap.js"></script>

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