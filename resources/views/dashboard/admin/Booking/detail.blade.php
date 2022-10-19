@extends('layouts.base')

@section('title')
    <title>Detail Booking</title>
@endsection

@section('content')
    <div class="container client-checkout">
        <div class="row justify-content-center">
            <div style="margin-top: 20px;" class="col content">
                <div>
                    <div class="detail-content" style="text-align: start;">
                        @if (isset($detail_pesanan))
                            <h3>Detail Kos</h3>
                            <div class="detail-body" style="margin-top: 0;">
                                <div class="left">
                                    <div class="detail-item small">
                                        <h2 class="title">Nama Kos</h2>
                                        <h2 class="value">{{ $detail_pesanan[0]->nama_kos }}</h2>
                                    </div>
                                    <div class="detail-item small">
                                        <h2 class="title">Harga Sewa</h2>
                                        <h2 class="value">{{ number_format($detail_pesanan[0]->harga_sewa, 0) }}</h2>
                                    </div>
                                    <div class="detail-item small">
                                        <h2 class="title">Fasilitas</h2>
                                        <h2 class="value">{{ $detail_pesanan[0]->fasilitas }}</h2>
                                    </div>
                                </div>
                                <div>
                                    <div class="detail-item small">
                                        <h2 class="title">Nomor Telepon</h2>
                                        <h2 class="value">{{ $detail_pesanan[0]->nomor_telepon }}</h2>
                                    </div>
                                    <div class="detail-item small">
                                        <h2 class="title">Alamat</h2>
                                        <h2 class="value">{{ $detail_pesanan[0]->alamat }}</h2>
                                    </div>
                                    <div class="detail-item small">
                                        <h2 class="title">Deskripsi</h2>
                                        <h2 class="value">{{ $detail_pesanan[0]->deskripsi }}</h2>
                                    </div>
                                </div>
                            </div>
                        @else
                            <h1 style="text-align: center; font-size: 24px;">Tidak ada data</h1>
                        @endif

                        @if (isset($detail))
                            <h3 style="margin-top: 60px;">Detail Pemesan</h3>
                            <div class="detail-body" style="margin-top: 20px;">
                                <div style="margin-right: 50px; width: 180px;">
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
                                        <h2 class="value">{{ $detail->tanggal_masuk }} -
                                            {{ $detail->tanggal_keluar }}</h2>
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
                                        <img style="width: 220px" src="{{ asset('ktp/' . $detail->foto_ktp) }}"
                                            alt="foto-ktp">
                                    </div>
                                </div>
                            </div>
                        @else
                        @endif

                        @if (isset($tagihans))
                            <h3 style="margin-top: 60px;">Detail Pembayaran</h3>
                            <div style="margin-top: 20px;" class="detail-body">
                                <table class="table" style="width: 1100px;">
                                    @php
                                        $i = 0;
                                    @endphp
                                    <thead class="bg-4" style="color: white;">
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Bulan</th>
                                            <th scope="col">Jumlah</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Bukti Pembayaran</th>
                                        </tr>
                                    </thead>
                                    @php
                                        $i = 0;
                                    @endphp
                                    <tbody>
                                        @foreach ($tagihans as $item)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $item->bulan }}</td>
                                                <td>Rp. {{ number_format($item->total, 0) }}</td>
                                                <td>{{ $item->status }}</td>
                                                @if ($item->status === 'Menunggu Pembayaran')
                                                    <td>Belum dibayar</td>
                                                @else
                                                    <td> <a target="_blank"
                                                            href="{{ asset('bukti/' . $item->bukti) }}">Link</a>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        @else
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
