@extends('layouts.base')

@section('title')
    <title>Daftar Pembayaran</title>
@endsection

@section('content')
    <div class="container">
        <h2 class="black">Daftar Pembayaran</h2>
        <div class="row" style="height: 100%">
            <div style="margin-top: 20px;" class="">
                @if (count($pembayarans) < 1)
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
                                <th scope="col">Total Pembayaran</th>
                                <th scope="col">Sisa Tagihan</th>
                                <th scope="col">Status Pembayaran</th>
                                <th scope="col">Detail</th>
                            </tr>
                        </thead>
                        <tbody style="background-color: white;">
                            @foreach ($pembayarans as $item)
                                <tr style="text-align: start;">
                                    <td scope="row">{{ ++$i }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->nama_kos }}</td>
                                    <td>Rp. {{ $item->total }}</td>
                                    <td>Rp. {{ $item->sisa_tagihan }}</td>
                                    <td>{{ $item->status }}</td>
                                    @can('pemilik')
                                        <td>
                                            <a href="{{ route('pemilik.pembayaran.detail', $item->id_pembayaran) }}">
                                                <img style="width: 30px; margin-right: 10px;"
                                                    src="{{ asset('icons/ic_edit.svg') }}" alt="sf">
                                            </a>
                                        </td>
                                    @endcan
                                    @can('admin')
                                        <td>
                                            <a href="{{ route('admin.pembayaran.detail', $item->id_pembayaran) }}">
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
