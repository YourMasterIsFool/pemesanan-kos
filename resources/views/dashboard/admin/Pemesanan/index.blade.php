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
                                {{-- <th scope="col">Edit</th>
                                <th scope="col">Hapus</th> --}}
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
                                    {{-- <td>
                                        <a href="{{ route('dashboard.kos.editview', $item->id) }}">
                                            <img style="width: 30px; margin-right: 10px;"
                                                src="{{ asset('icons/ic_edit.svg') }}" alt="sf">
                                        </a>
                                    </td> --}}

                                    {{-- <td>
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
                                    </td> --}}
                                </tr>
                                <!-- Modal -->
                                {{-- <div class="modal fade" id="kosModal-{{$item->id}}" tabindex="-1" aria-labelledby="kosModalLabel"
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
                                </div> --}}
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>


    </div>
@endsection
