@extends('layouts.base')

@section('title')
    <title>Detail Pesanan</title>
@endsection

@section('content')
    <div class="container">
        <div class="container client-checkout">
            <div class="row justify-content-center">
                <div style="margin-top: 20px;" class="col content">
                    <div style="width: 900px;">
                        <div class="detail-content" style="text-align: start;">
                            <h5>Detail Kos</h5>
                            <div class="detail-body" style="margin-top: 0;">
                                <div class="">
                                    <div class="detail-item small">
                                        <h2 class="title">Nama Kos</h2>
                                        <h2 class="value">{{ $detail->nama_kos }}</h2>
                                    </div>
                                    <div class="detail-item small">
                                        <h2 class="title">Harga Sewa</h2>
                                        <h2 class="value">Rp. {{ $detail->harga_sewa }}</h2>
                                    </div>
                                    <div class="detail-item small">
                                        <h2 class="title">Fasilitas</h2>
                                        <h2 class="value">{{ $detail->fasilitas }}</h2>
                                    </div>
                                </div>
                                <div>
                                    <div class="detail-item small">
                                        <h2 class="title">Alamat Kos</h2>
                                        <h2 class="value">{{ $detail->alamat }}</h2>
                                    </div>
                                    <div class="detail-item small">
                                        <h2 class="title">Deskripsi</h2>
                                        <h2 class="value">{{ $detail->deskripsi }}</h2>
                                    </div>
                                </div>
                            </div>

                            <h5 style="margin-top: 20px;">Detail Pemesan</h5>
                            <div class="detail-body" style="margin-top: 0;">
                                <div style="margin-right: 50px;">
                                    <div class="detail-item small">
                                        <h2 class="title">Nama Pemesan</h2>
                                        <h2 class="value">{{ $detail->nama }}</h2>
                                    </div>
                                    <div class="detail-item small">
                                        <h2 class="title">NIK</h2>
                                        <h2 class="value">{{ $detail->nik }}</h2>
                                    </div>
                                    <div class="detail-item small">
                                        <h2 class="title">Email</h2>
                                        <h2 class="value">{{ $detail->email }}</h2>
                                    </div>
                                    <div class="detail-item small">
                                        <h2 class="title">Status Pesanan</h2>
                                        <h2 class="value">{{ $detail->status }}</h2>
                                    </div>
                                </div>
                                <div style="margin-right: 50px;">
                                    <div class="detail-item small">
                                        <h2 class="title">Jenis Kelamin</h2>
                                        <h2 class="value">
                                            {{ $detail->jenis_kelamin === '1' ? 'Laki - Laki' : 'Perempuan' }}
                                        </h2>
                                    </div>
                                    <div class="detail-item small">
                                        <h2 class="title">Nomor Telepon</h2>
                                        <h2 class="value">{{ $detail->nomor_telepon }}</h2>
                                    </div>
                                    <div class="detail-item small" style="max-width: 150px;">
                                        <h2 class="title">Alamat</h2>
                                        <h2 class="value">{{ $detail->alamat_pemesan }}</h2>
                                    </div>
                                </div>
                                <div style="margin-bottom: 50px;">
                                    <div class="detail-item small">
                                        <h2 class="title">Foto Ktp</h2>
                                        <img style="width: 220px" src="{{ asset('ktp/' . $detail->foto_ktp) }}" alt="foto-ktp" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
