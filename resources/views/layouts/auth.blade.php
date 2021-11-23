<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? config('app.name') }} < Authentification < {{ config('app.name') }}</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    
    <link rel="stylesheet" href="{{ asset('vendors/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/dist/css/adminlte.min.css') }}">

    <style>
        body {
            background: linear-gradient(90deg, rgba(2, 0, 36, 1) 10%, rgba(9, 9, 121, 1) 50%, rgba(0, 212, 255, 1) 100%);
        }

    </style>

</head>

<body class="hold-transition login-page text-sm">

    @include('layouts.partials._validation_errors')

    <div class="login-box">
        <div class="login-logo">
        </div>
        @yield('body')
    </div>

    <script src="{{ asset('vendors/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendors/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendors/dist/js/adminlte.min.js') }}"></script>
</body>

</html>
