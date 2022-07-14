@extends('layouts.base')

@section('title')
    <title>Tambah Kos</title>
@endsection

@section('content')
    <div class="container">
        <h2 class="black" style="margin-bottom: 20px;">Tambah Kos</h2>
        <div class="bg-4" style="padding: 10px; border-radius: 5px;">
            <form method="POST" action="{{ route('dashboard.kos.save') }}" enctype="multipart/form-data">
                @csrf
                <div class="double_form">
                    <div class="left">
                        <div class="row mb-3">
                            <div class="col">
                                <label for="nama" class="font-1">Nama Kos</label>
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
                                <label for="nomor_telepon" class="font-1">Nomor Telepon</label>
                                <input id="nomor_telepon" type="number"
                                    class="form-control @error('nomor_telepon') is-invalid @enderror" name="nomor_telepon"
                                    value="{{ old('nomor_telepon') }}" autocomplete="username">

                                @error('nomor_telepon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label for="foto" class="font-1">Foto Kos</label>
                                <input id="foto" type='file'
                                    class="form-control @error('foto') is-invalid @enderror" name="foto"
                                    value="{{ old('foto') }}" autocomplete="username">

                                @error('foto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label for="alamat" class="font-1">Alamat</label>
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
                                <label for="tipe_kos" class="font-1">Tipe Kos</label>
                                <select class="form-select @error('tipe_kos') is-invalid @enderror" name="tipe_kos"
                                    aria-label="Default select example">
                                    <option selected>Pilih tipe kos</option>
                                    @foreach ($tipe_kos as $kos)
                                        <option value="{{ $kos->id }}">{{ $kos->tipe }}</option>
                                    @endforeach
                                </select>

                                @error('tipe_kos')
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
                                <label for="fasilitas" class="font-1">Fasilitas</label>
                                <input id="fasilitas" type="text"
                                    class="form-control @error('fasilitas') is-invalid @enderror" name="fasilitas"
                                    value="{{ old('fasilitas') }}" autocomplete="fasilitas">

                                @error('fasilitas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label for="harga_sewa" class="font-1">Harga Sewa</label>
                                <input id="harga_sewa" type='number'
                                    class="form-control @error('harga_sewa') is-invalid @enderror" name="harga_sewa"
                                    value="{{ old('harga_sewa') }}" autocomplete="username">

                                @error('harga_sewa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label for="jumlah_kamar" class="font-1">Jumlah Kamar</label>
                                <input id="jumlah_kamar" type='number'
                                    class="form-control @error('jumlah_kamar') is-invalid @enderror" name="jumlah_kamar"
                                    value="{{ old('jumlah_kamar') }}" autocomplete="username">

                                @error('jumlah_kamar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label for="deskripsi" class="font-1">Deskrkpsi</label>
                                <input id="deskripsi" type='text'
                                    class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi"
                                    value="{{ old('deskripsi') }}" autocomplete="username">

                                @error('deskripsi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="maps-insert" style="width: 100%; height: 500px; padding: 20px;">
                        <div class="left" id="map" style=" height: 100%;">

                        </div>
                    </div>
                </div>

                <div class="double_form">
                    <div class="left">
                        <div class="row mb-3">
                            <div class="col">
                                <label for="latitude" class="font-1">Latitude</label>
                                <input id="latitude" type='text'
                                    class="form-control @error('latitude') is-invalid @enderror" name="latitude"
                                    value="{{ old('latitude') }}" autocomplete="latitude">

                                @error('latitude')
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
                                <label for="longitude" class="font-1">Longitude</label>
                                <input id="longitude" type='text'
                                    class="form-control @error('longitude') is-invalid @enderror" name="longitude"
                                    value="{{ old('longitude') }}" autocomplete="longitude">

                                @error('longitude')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>



                <div class="row" style="margin-top: 20px;">
                    <div class="col" style="text-align: center; display: flex; justify-content: end;">
                        <button type="submit" class="btn1" style="margin-right: 5px;">
                            Tambah
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset('maps/mapsInsert.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyATWmlqT4BxhuydhfOPcFcfT6KvnPTsD_w&callback=initMap" async
        defer></script>
@endpush
