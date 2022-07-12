@extends('layouts.base')

@section('title')
    <title>Tambah Pemilik</title>
@endsection

@section('content')
    <div class="container">
        <h2 class="black" style="margin-bottom: 20px;">Tambah Pemilik</h2>
        <div class="bg-4" style="padding: 10px; border-radius: 5px;">
            <form method="POST" action="{{ route('dashboard.daftarpemilik.save') }}" enctype="multipart/form-data">
                @csrf
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
                                <label for="password" class="font-1">Password</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    autocomplete="password">

                                @error('password')
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
                        style="text-align: center; display: flex; justify-content: end;">
                        <button type="submit" class="btn1" style="margin-right: 5px;">
                            Tambah
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
