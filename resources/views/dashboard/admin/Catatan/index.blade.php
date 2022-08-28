@extends('layouts.base')

@section('title')
    <title>Catatan Kos</title>
@endsection

@section('content')
    <div class="container">
        <h2 class="black">Catatan Kos</h2>
        <div class="row" style="height: 100%">
            <div style="display: flex; justify-content: end; margin-bottom: 10px;">
                <a href="{{ route('admin.catatan.create') }}" class="btn1">Tambah Catatan</a>
            </div>
            <div style="margin-top: 20px;" class="">
                @if (count($catatans) < 1)
                    <h1 style="text-align: center; font-size: 24px;">Tidak ada data</h1>
                @else
                    <table class="table">
                        @php
                            $i = 0;
                        @endphp
                        <thead class="bg-4" style="color: white;">
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Nomor Kamar</th>
                                <th scope="col">Bulan</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Hapus</th>
                            </tr>
                        </thead>
                        <tbody style="background-color: white;">
                            @foreach ($catatans as $item)
                                <tr>
                                    <td scope="row">{{ ++$i }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->nomor_kamar }}</td>
                                    <td>{{ $item->bulan }}</td>
                                    <td>Rp. {{ number_format($item->jumlah) }}</td>
                                    <td>
                                        <a href="{{ route('admin.catatan.edit.view', $item->id) }}">
                                            <img style="width: 30px; margin-right: 10px;"
                                                src="{{ asset('icons/ic_edit.svg') }}" alt="sf">
                                        </a>
                                    </td>

                                    <td>
                                        <a data-bs-toggle="modal" data-bs-target="#pemilikModal-{{ $item->id }}"
                                            href="" onclick="event.preventDefault();">
                                            <img style="width: 30px; margin-right: 10px;"
                                                src="{{ asset('icons/ic_delete.svg') }}" alt="sf">
                                        </a>

                                        <form id="hapus-pemilik-{{ $item->id }}"
                                            action="{{ route('admin.catatan.delete', $item->id) }}" method="POST"
                                            class="d-none">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="pemilikModal-{{ $item->id }}" tabindex="-1"
                                    aria-labelledby="pemilikModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="pemilikModalLabel">Hapus Catatan</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Hapus sekarang?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn2" data-bs-dismiss="modal">Batal</button>
                                                <button type="button" class="btn1"
                                                    onclick="document.getElementById('hapus-pemilik-{{ $item->id }}').submit();">Hapus</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>


    </div>
@endsection
