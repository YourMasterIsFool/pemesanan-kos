@extends('layouts.base')

@section('title')
    <title>Tambah Catatan</title>
@endsection

@section('content')
    <div class="container">
        <h2 class="black" style="margin-bottom: 20px;">Tambah Catatan</h2>
        <div class="bg-4" style="padding: 10px; border-radius: 5px;">
            <form method="POST" action="{{ route('admin.catatan.save') }}" enctype="multipart/form-data">
                @csrf
                <div class="double_form">
                    <div class="left">
                        <div class="row mb-3">
                            <div class="col">
                                <label for="nama" class="font-1">Nama Penyewa</label>
                                <input id="nama" type="text"
                                    class="form-control @error('nama') is-invalid @enderror" name="nama"
                                    value="{{ old('nama') }}" autocomplete="username" required>

                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label for="nomor_kamar" class="font-1">Nomor Kamar</label>
                                <input id="nomor_kamar" type="text"
                                    class="form-control @error('nomor_kamar') is-invalid @enderror" name="nomor_kamar"
                                    value="{{ old('nomor_kamar') }}" autocomplete="username" required>

                                @error('nomor_kamar')
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
                                <label for="bulan" class="font-1">Bulan</label>
                                <input id="bulan" type="text"
                                    class="form-control @error('bulan') is-invalid @enderror" name="bulan"
                                    value="{{ old('bulan') }}" autocomplete="bulan" required>

                                @error('bulan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label for="jumlah" class="font-1">Jumlah Pembayaran</label>
                                <input id="jumlah" type="number"
                                    class="form-control @error('jumlah') is-invalid @enderror" name="jumlah"
                                    value="{{ old('jumlah') }}" autocomplete="username" required>

                                @error('jumlah')
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
