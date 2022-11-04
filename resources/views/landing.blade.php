<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Info Kost</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/client.css') }}" rel="stylesheet">
    <link href="{{ asset('js/app.js') }}" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #FAF3E3;
        }
    </style>
</head>

<body>
    @include('sweetalert::alert')

    <div class="landing-page">
        <div class="img-container">
            <img class="landing-image" src="{{ asset('images/ic_bg.jpg') }}" alt="">
            <div class="color-overlay">

            </div>
            <div class="landing-navbar">
                <ul>
                    <li><a href="{{ route('home') }}"><img src="{{ asset('images/ic_logo.png') }}" alt=""></a>
                    </li>
                    <li><a class="btn3" href="{{ route('login') }}">Login</a></li>
                </ul>
            </div>
            <div class="landing-content">

                <div class="landing-content-1">
                    <h1>WELCOME <span>TO</span></h1>
                    <img src="{{ asset('images/ic_logo.png') }}" alt="">
                </div>
                <div class="landing-content-2">
                    <div class="land-item-1">
                        <h1>INFO <span>KOST</span></h1>
                    </div>
                    <div class="land-item-2">
                        <h1>Merupakan Platform yang memberikan informasi mengenai Kos-kosan di Kabupaten Banyuwangi</h1>
                    </div>
                </div>
                

            </div>
        </div>
    </div>


</body>

</html>
