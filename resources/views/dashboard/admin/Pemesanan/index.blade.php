@extends('layouts.base')

@section('title')
    <title>Daftar Pesanan</title>
@endsection

@section('content')
    <div class="container">
        <h2 class="black">Daftar Pesanan</h2>
        <div class="row" style="height: 100%">
            <div style="margin-top: 20px;" class="table-container">
                @if (count($pesanan) < 1)
                    <h1 style="text-align: center; font-size: 24px;">Tidak ada data</h1>
                @else
                    <table class="table">
                        @php
                            $i = 0;
                        @endphp
                        <thead class="bg-4" style="color: white;">
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Nama Pemesan</th>
                                <th scope="col">Nama Kos</th>
                                <th scope="col">Jangka Penyewaan</th>
                                <th scope="col">Tangal Masuk</th>
                                <th scope="col">Tanggal Keluar</th>
                                <th scope="col">Status Pesanan</th>
                                <th scope="col">Detail</th>
                            </tr>
                        </thead>
                        <tbody style="background-color: white;">
                            @foreach ($pesanan as $item)
                                <tr style="text-align: start;">
                                    <td scope="row">{{ ++$i }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->nama_kos }}</td>
                                    <td>{{ $item->durasi }}</td>
                                    <td>{{ $item->tanggal_masuk }}</td>
                                    <td>{{ $item->tanggal_keluar }}</td>
                                    <td>{{ $item->status }}</td>
                                    @can('pemilik')
                                    <td>
                                        <a href="{{route('pemilik.pemesanan.detail', $item->id_user)}}">
                                            <img style="width: 30px; margin-right: 10px;"
                                                src="{{ asset('icons/ic_edit.svg') }}" alt="sf">
                                        </a>
                                    </td>
                                    @endcan
                                    @can('admin')
                                    <td>
                                        <a href="{{route('admin.pemesanan.detail', $item->id_user)}}">
                                            <img style="width: 30px; margin-right: 10px;"
                                                src="{{ asset('icons/ic_edit.svg') }}" alt="sf">
                                        </a>
                                    </td>
                                    @endcan
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>


    </div>
@endsection
