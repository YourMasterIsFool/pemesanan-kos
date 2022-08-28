@extends('layouts.base')

@section('title')
    <title>Daftar Booking</title>
@endsection

@section('content')
    <div class="container">
        <h2 class="black">Daftar Booking</h2>
        <div class="row" style="height: 100%">
            <div style="margin-top: 20px;" class="">
                @if (count($bookings) < 1)
                    <h1 style="text-align: center; font-size: 24px;">Tidak ada data</h1>
                @else
                    <table class="table">
                        @php
                            $i = 0;
                        @endphp
                        <thead class="bg-4" style="color: white;">
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Kode Booking</th>
                                <th scope="col">Nama Pemesan</th>
                                <th scope="col" style="width: 200px;">Alamat</th>
                                <th scope="col">Durasi Booking</th>
                                <th scope="col">Nomor Kamar</th>
                                <th scope="col">Detail</th>
                            </tr>
                        </thead>
                        <tbody style="background-color: white;">
                            @foreach ($bookings as $item)
                                <tr style="text-align: start;">
                                    <td scope="row">{{ ++$i }}</td>
                                    <td>{{ $item->kode_booking }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ $item->durasi }}</td>
                                    <td>{{ $item->nomor_kamar }}</td>
                                    @can('pemilik')
                                        <td>
                                            <a href="{{ route('pemilik.booking.detail', $item->id) }}">
                                                <img style="width: 30px; margin-right: 10px;"
                                                    src="{{ asset('icons/ic_edit.svg') }}" alt="sf">
                                            </a>
                                        </td>
                                    @endcan
                                    @can('admin')
                                        <td>
                                            <a href="{{ route('admin.booking.detail', $item->id) }}">
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
