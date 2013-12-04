<!doctype html>
<html>
	<head>
		<meta charset="utf-8">

		{{ Basset::show('bootstrapper.css') }}
		{{ Basset::show('bootstrapper.js') }}

		<link rel="stylesheet" type="text/css" href="/css/styles.css" />
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