<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

    <!-- Fonts -->
    <link rel="icon" href="{{ asset('icons/ic_rs.png') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="{{ asset('css/client.css') }}" rel="stylesheet">

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
                </ul>
            </div>
            <div class="landing-content">
                <div class="content">
                    <div class="form-login">
                        <p style="text-align: center; font-weight: bold; font-size: 25px; margin-bottom: 50px" class="font-1">
                            Website Pemesanan Kos</p>
                        <p style="text-align: start; font-size: 20px; margin-bottom: 20px" class="font-1">
                            Login</p>
                        <form method="POST" action="{{ route('user.login.auth') }}">
                            @csrf
        
                            <div class="row mb-3">
                                <div class="col">
                                    <input id="email" type="text"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" placeholder="Email" required autocomplete="username">
        
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
        
                            <div class="row mb-3">
                                <div class="col">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password" required
                                        autocomplete="new-password" placeholder="Password">
        
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
        
        
                            <div class="row mt-4">
                                <div class="col"
                                    style="text-align: center; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                                    <a href="{{route('user.register.view')}}" style="font-size: 12px; margin-bottom: 12px;" class="font-2">Belum punya akun?</a>
                                    <button type="submit" class="btn1" style="margin-right: 5px;">
                                        Login
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>
