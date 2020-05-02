<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<title>Monsieur Négoce</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" href="{{ asset('favicon.png') }}" type="image/png" sizes="16x16">

	<!-- Font awsome -->
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />

	<!-- jQuery and Popper.js -->
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>

	<!-- Bulma -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.2/css/bulma.min.css" />

	<!-- BootstrapCDN -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

	<!-- Laravel -->
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>

	<x-header />

	<div class="container-fluid">

		<div class="row">
			<div class="col-md-2">
				<aside>
					<x-sidebar />
				</aside>
			</div>
			<div class="col-md-10">
				<main>
					{{ $slot }}
				</main>
			</div>
		</div>
	</div>

	<x-footer></x-footer>

</body>

</html>