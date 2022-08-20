@extends('layouts.base')

@section('title')
    <title>Detail Pembayaran</title>
@endsection

@section('content')
    <div class="container">
        <div class="container client-checkout">
            <div class="row justify-content-center">
                <div style="margin-top: 20px;" class="col content">
                    <div>
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
                                    <h2 class="title">Status Pembayaran</h2>
                                    <h2 class="value">{{ $detail->status }}</h2>
                                </div>
                                <div class="detail-item small">
                                    <h2 class="title">Durasi Booking</h2>
                                    <h2 class="value">{{ $detail->tanggal_masuk }} - {{ $detail->tanggal_keluar }}</h2>
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
                                    <img style="width: 220px" src="{{ asset('ktp/' . $detail->foto_ktp) }}" alt="foto-ktp">
                                </div>
                            </div>
                        </div>

                        <h5 style="margin-top: 70px;">Detail Pembayaran</h5>
                        <div class="container text-center">
                            <div class="row">
                                <div class="col">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="color: #3b3b3b">No</th>
                                                <th scope="col" style="color: #3b3b3b">Bulan</th>
                                                <th scope="col" style="color: #3b3b3b">Jumlah</th>
                                                <th scope="col" style="color: #3b3b3b">Status</th>
                                                <th scope="col" style="color: #3b3b3b">Bukti Pembayaran</th>
                                            </tr>
                                        </thead>
                                        @php
                                            $i = 0;
                                        @endphp
                                        <tbody>
                                            @foreach ($tagihans as $item)
                                                <tr>
                                                    <td>{{++$i}}</td>
                                                    <td>{{$item->bulan}}</td>
                                                    <td>Rp. {{$item->total}}</td>
                                                    <td>{{$item->status}}</td>
                                                    <td><a href="">Link</a></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
