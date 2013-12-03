<!doctype html>
<html>
	<head>
		<meta charset="utf-8">

		{{ Basset::show('bootstrapper.css') }}
		{{ Basset::show('bootstrapper.js') }}

		<style>
			table form { margin-bottom: 0; }
			form ul { margin-left: 0; list-style: none; }
			.error { color: red; font-style: italic; }
			body { padding-top: 20px; }
			.header-margin { height:20px; }
		</style>
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