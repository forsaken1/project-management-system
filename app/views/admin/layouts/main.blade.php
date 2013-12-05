<!doctype html>
<html>
	<head>
		<meta charset="utf-8">

		{{ Basset::show('bootstrapper.css') }}
		{{ Basset::show('bootstrapper.js') }}

		<link type="text/css" href="/plugins/calendar/css/jquery.simple-dtpicker.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="/css/styles.css" />

		<script type="text/javascript" src="/plugins/calendar/js/jquery.simple-dtpicker.js"></script>
		<script type="text/javascript" src="/js/scripts.js"></script>
	</head>

	<body>

		<div class="container">

			@include('admin.layouts.blocks.header')

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