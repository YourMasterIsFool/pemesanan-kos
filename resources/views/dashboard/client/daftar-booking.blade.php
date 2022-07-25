<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Daftar Booking</title>

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

<body class="client">
    @include('sweetalert::alert')



    <div class="landing">
        <div class="client-header">
            @include('dashboard.client.client-navbar')
            <div class="client-title">
                <h5 style="color: black;">{{ Auth::user()->nama }}</h5>
                <div class="dropdown" style="margin-left: 30px;">
                    <a class="btn dropdown-toggle" style="background-color: #212529; color: white;" href="#"
                        role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    </a>


                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal" href=""
                            onclick="event.preventDefault();">
                            Logout
                        </a>

                        <a class="dropdown-item" href="{{route('client.profile')}}">
                            Profil
                        </a>

                        <form id="logout-form" action="{{ route('user.logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </div>
            </div>
        </div>
        <div class="client-welcome">
           <div>
                daftar booking
           </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Logout sekarang?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn2" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn1"
                        onclick="document.getElementById('logout-form').submit();">Logout</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
