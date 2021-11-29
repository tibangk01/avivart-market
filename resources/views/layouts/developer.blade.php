<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/x-icon" href="{{ asset('favicon.jpg') }}">

	<title>{{ config('app.name') }} > Développeur > {{ $title ?? config('app.name') }}</title>
</head>
<body>

	<main>
		@yield('body')
	</main>

</body>
</html>