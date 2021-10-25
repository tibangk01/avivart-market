<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ config('app.name') }} - Impression - {{ $title ?? 'Laravel' }}</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <style type="text/css">
        @page {
            margin: 0cm 0cm;
        }

        body {
            /*border: 1px solid red;*/
            margin: 1cm;
            padding-top: 2cm;
            padding-bottom: 2cm;
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
            /*border: 1px solid black;*/
            position: fixed;
            opacity: .3;

            transform: rotate(-45deg);

            z-index: -1000;

            text-align: center;

            width: 20cm;
            height: 10cm;
        }

        #watermark img {
            width: 100%;
            height: 100%;
        }

        #watermark.portrait {
            top: 9.85cm;
            left: .5cm;
        }

        #watermark.landscape {
            top: 5.5cm;
            left: 4.85cm;
        }

        img.logo {
            width: 100px;
            height: 60px;
        }

        img.img25_25 {
            width: 25px;
            height: 25px;
        }

        img.img50_50 {
            width: 50px;
            height: 50px;
        }

        img.img75_75 {
            width: 75px;
            height: 75px;
        }

        img.img100_100 {
            width: 100px;
            height: 100px;
        }

        img.img150_150 {
            width: 150px;
            height: 150px;
        }

        img.img200_200 {
            width: 200px;
            height: 200px;
        }

        img.img250_250 {
            width: 250px;
            height: 250px;
        }

        img.img300_300 {
            width: 300px;
            height: 300px;
        }

        img.img350_350 {
            width: 350px;
            height: 350px;
        }

        img.img400_400 {
            width: 400px;
            height: 400px;
        }

        img.img450_450 {
            width: 450px;
            height: 450px;
        }

        img.img500_500 {
            width: 500px;
            height: 500px;
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

        .my-1 {
            margin-top: .5cm;
            margin-bottom: .5cm;
        }

        .my-2 {
            margin-top: 1cm;
            margin-bottom: 1cm;
        }

        .my-3 {
            margin-top: 1.5cm;
            margin-bottom: 1.5cm;
        }

        .my-4 {
            margin-top: 2cm;
            margin-bottom: 2cm;
        }
    </style>
</head>

<body>

    <!-- <div class="page-break"></div> -->

    <x-pdf.header :watermark="$watermark" :orientation="$orientation" />

    <x-pdf.footer />

    <main>
        @yield('body')
    </main>

</body>

</html>