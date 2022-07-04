<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pemesanan Kos</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #FAF3E3;
        }
    </style>
</head>

<body class="antialiased">
    @include('sweetalert::alert')

    <div class="maps-search">
        <div class="left" id="map">

        </div>
        <div class="right">

        </div>
    </div>

    

    <script src="{{ asset('maps/maps.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyATWmlqT4BxhuydhfOPcFcfT6KvnPTsD_w&callback=initMap" async
        defer></script>
        <script>
            const kos = @json($kos);
        </script>
</body>

</html>
