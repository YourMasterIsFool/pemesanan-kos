@extends('layouts.base')

@section('title')
    <title>Daftar Kos</title>
@endsection

@section('content')
    <div class="container">
        <h2 class="black">Daftar Kos</h2>
        <div class="row" style="height: 100%">
            <div style="display: flex; justify-content: end; margin-bottom: 10px;">                
                <a target="_blank" href="{{ route('dashboard.daftarmapkos.index') }}" class="btn2">Lihat Kos</a>
            </div>
            <div style="margin-top: 20px;" class="table-container">
                @if (count($kos) < 1)
                    <h1 style="text-align: center; font-size: 24px;">Tidak ada data</h1>
                @else
                    <table class="table">
                        @php
                            $i = 0;
                        @endphp
                        <thead class="bg-4" style="color: white;">
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Nama Kos</th>
                                <th scope="col">Nama Pemilik</th>
                                <th scope="col">Tipe Kos</th>
                                <th scope="col">Jumlah Kamar</th>
                                <th scope="col">Kamar Kosong</th>
                                <th scope="col">Fasilitas</th>
                                <th scope="col">Lokasi</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Hapus</th>
                            </tr>
                        </thead>
                        <tbody style="background-color: white;">
                            @foreach ($kos as $item)
                                <tr style="text-align: start;">
                                    <td scope="row">{{ ++$i }}</td>
                                    <td>{{ $item->nama_kos }}</td>
                                    <td>{{ $item->nama_pemilik }}</td>
                                    <td>{{ $item->tipe }}</td>
                                    <td>{{ $item->jumlah_kamar }}</td>
                                    <td>{{ $item->kamar_kosong }}</td>
                                    <td>{{ $item->fasilitas }}</td>
                                    <td style="max-width: 200px;">{{ $item->alamat }}</td>
                                    <td>
                                        <a href="{{ route('dashboard.kos.editview', $item->id) }}">
                                            <img style="width: 30px; margin-right: 10px;"
                                                src="{{ asset('icons/ic_edit.svg') }}" alt="sf">
                                        </a>
                                    </td>

                                    <td>
                                        <a data-bs-toggle="modal" data-bs-target="#kosModal-{{$item->id}}"
                                            href="" onclick="event.preventDefault();">
                                            <img style="width: 30px; margin-right: 10px;"
                                                src="{{ asset('icons/ic_delete.svg') }}" alt="sf">
                                        </a>

                                        <form id="hapus-kos-{{$item->id}}"
                                            action="{{ route('dashboard.kos.delete', $item->id) }}"
                                            method="POST" class="d-none">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="kosModal-{{$item->id}}" tabindex="-1" aria-labelledby="kosModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="kosModalLabel">Hapus Kos</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Hapus sekarang?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn2" data-bs-dismiss="modal">Batal</button>
                                                <button type="button" class="btn1"
                                                    onclick="document.getElementById('hapus-kos-{{$item->id}}').submit();">Hapus</button>
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
