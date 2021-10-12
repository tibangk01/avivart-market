<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ config('app.name') }} - {{ $title ?? 'Laravel' }}</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <style type="text/css">
        @page {
            margin: 0cm 0cm;
        }

        body {
            /*border: 1px solid red;*/
            margin: 1cm;
            padding-top: 2cm;
        }

        header {
            /*border: 1px solid black;*/
            position: fixed;
            top: 1cm;
            left: 1cm;
            right: 1cm;
        }

        footer {
            /*border: 1px solid black;*/
            position: fixed; 
            bottom: 3.1cm;
            left: 1cm;
            right: 1cm;
        }
        
        .page-break {
            /*page-break-before: always;*/
            page-break-after: always;
        }

        .pagenum:before {
            content: counter(page);
        }

        #watermark {
            position: fixed;
            opacity: .3;

            transform: rotate(-45deg);

            /** 
                Set a position in the page for your image
                This should center it vertically
            **/
            bottom:   10cm;
            left:     2.5cm;

            /** Change image dimensions**/
            width:    14cm;
            height:   10cm;

            /** Your watermark should be behind every content**/
            z-index:  -1000;
        }

        img.logo {
            width: 100px;
            height: 60px;
        }

        .fs-10 {
            font-size: 10px;
        }

        .fs-11 {
            font-size: 11px;
        }

        .fs-12 {
            font-size: 12px;
        }

        .fs-13 {
            font-size: 13px;
        }

        .fs-14 {
            font-size: 14px;
        }

        .my-2 {
            margin-top: 15px;
            margin-bottom: 15px;
        }

        .my-3 {
            margin-top: 2cm;
            margin-bottom: 2cm;
        }
    </style>
</head>

<body>

    <!-- <div class="page-break"></div> -->

    <x-pdf.header />

    <x-pdf.footer />

    <main>
        @yield('body')
    </main>

</body>

</html>