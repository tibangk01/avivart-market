<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? config('app.name') }} | {{ config('app.name') }}</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('public/vendors/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/vendors/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/vendors/dist/css/adminlte.min.css') }}">

    <style>
        body {
            background: rgb(2, 0, 36);
            background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(9, 9, 121, 1) 35%, rgba(0, 212, 255, 1) 100%);
        }

    </style>

</head>

<body class="hold-transition login-page txt-sm">

    @include('layouts.partials._validation_errors')

    <div class="login-box">
        <div class="login-logo">
        </div>
        @yield('body')
    </div>

    <script src="{{ asset('public/vendors/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('public/vendors/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('public/vendors/dist/js/adminlte.min.js') }}"></script>
</body>

</html>
