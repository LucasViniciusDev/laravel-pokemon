<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel Pokemon</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    @include('components.navbar')

    <input id="app-url" type="text" value="{{ \config('app.url') }}" style="display: none;">
    <script src="{{ asset('js/jquery.js') }}" type="text/javascript"></script>
	<div class="container">
		<main role="main">
			@hasSection('body')
				@yield('body')
			@endif
		</main>
    </div>
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap.js') }}" type="text/javascript"></script>
</body>

</html>
