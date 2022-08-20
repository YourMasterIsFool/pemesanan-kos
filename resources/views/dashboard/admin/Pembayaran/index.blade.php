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
                                <th scope="col">Status Pembayaran</th>
                            </tr>
                        </thead>
                        <tbody style="background-color: white;">
                            @foreach ($pembayarans as $item)
                                <tr style="text-align: start;">
                                    <td scope="row">{{ ++$i }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->nama_kos }}</td>
                                    <td>{{ $item->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>


    </div>
@endsection
