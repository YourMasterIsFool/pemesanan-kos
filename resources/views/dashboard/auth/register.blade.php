<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Register</title>

    <!-- Fonts -->
    <link rel="icon" href="{{ asset('icons/ic_rs.png') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>

<body>
    @include('sweetalert::alert')

    <div class="login-container" style="overflow-y: scroll;">
        <div class="content">
            <div class="form-register" style="max-height: 600px; overflow-y: scroll;">
                <p style="text-align: center; font-weight: bold; font-size: 25px; margin-bottom: 30px" class="font-1">
                    Website Pemesanan Kos</p>
                <p style="text-align: start; font-weight: bold; font-size: 18px; margin-bottom: 20px" class="font-1">
                    Register Pengguna</p>
                <form method="POST" action="{{ route('user.register.create') }}" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <div class="double_form">
                        <div class="left">
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="nama" class="font-1">Nama Lengkap</label>
                                    <input id="nama" type="text"
                                        class="form-control @error('nama') is-invalid @enderror" name="nama"
                                        value="{{ old('nama') }}" autocomplete="username">

                                    @error('nama')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <label for="nik" class="font-1">NIK</label>
                                    <input id="nik" type="text"
                                        class="form-control @error('nik') is-invalid @enderror" name="nik"
                                        value="{{ old('nik') }}" autocomplete="username">

                                    @error('nik')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <label for="alamat" class="font-1">Alamat Lengkap</label>
                                    <input id="alamat" type="text"
                                        class="form-control @error('alamat') is-invalid @enderror" name="alamat"
                                        value="{{ old('alamat') }}" autocomplete="username">

                                    @error('alamat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <label for="password" class="font-1">Password</label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="ktp" class="font-1">Upload Foto KTP</label>
                                    <input id="ktp" type='file'
                                        class="form-control @error('ktp') is-invalid @enderror" name="ktp"
                                        autocomplete="ktp">

                                    @error('ktp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        </div>


                        <div class="right">
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="no_telepon" class="font-1">Nomor Telepon</label>
                                    <input id="no_telepon" type="number"
                                        class="form-control @error('no_telepon') is-invalid @enderror" name="no_telepon"
                                        value="{{ old('no_telepon') }}" autocomplete="no_telepon">

                                    @error('no_telepon')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <label for="email" class="font-1">Email</label>
                                    <input id="email" type="text"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" autocomplete="username">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <label for="jenis_kelamin" class="font-1">Jenis Kelamin</label>
                                    <select class="form-select @error('jenis_kelamin') is-invalid @enderror"
                                        id="jenis_kelamin" name="jenis_kelamin" aria-label="Default select example">
                                        <option selected>Pilih Jenis Kelamin</option>
                                        @foreach ($jenis_kelamin as $kelamin)
                                            <option value="{{ $kelamin->id }}">{{ $kelamin->tipe }}</option>
                                        @endforeach
                                    </select>

                                    @error('jenis_kelamin')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <label for="password_confirmation" class="font-1">Konfirmasi Password</label>
                                    <input id="password_confirmation" type="password"
                                        class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation"
                                        autocomplete="new-password">

                                    @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                        </div>
                    </div>


                    <div class="row mt-4">
                        <div class="col"
                            style="text-align: center; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <a href="{{ route('user.login.view') }}" style="font-size: 12px; margin-bottom: 12px;"
                                class="font-2">Sudah punya akun?</a>
                            <button type="submit" class="btn1" style="margin-right: 5px;">
                                Register
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>
