<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pemesanan Kos</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('js/app.js') }}" rel="stylesheet">


    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #FAF3E3;
        }
    </style>
</head>

<body class="antialiased">
    @include('sweetalert::alert')

    <div class="landing">
        <div>
            <h2 style="margin-bottom: 20px;">Selamat Datang di Website Pemesanan Kos</h2>
            <h3 style="font-weight: 200; margin-bottom: 12px; ">Mulai cari kos anda sekarang</h3>
            <a href="{{route('kos.search')}}" class="btn1">Cari</a>
        </div>
    </div>

</body>

</html>
