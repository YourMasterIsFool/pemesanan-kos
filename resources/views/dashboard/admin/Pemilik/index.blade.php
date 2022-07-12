@extends('layouts.base')

@section('title')
    <title>Daftar Pemilik</title>
@endsection

@section('content')
    <div class="container">
        <h2 class="black">Daftar Pemilik</h2>
        <div class="row" style="height: 100%">
            <div style="display: flex; justify-content: end; margin-bottom: 10px;">
                <a href="{{ route('dashboard.daftarpemilik.createview') }}" class="btn1">Tambah Pemilik</a>
            </div>
            <div style="margin-top: 20px;" class="table-container">
                @if (count($pemilik) < 1)
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
                                <th scope="col">Email</th>
                                <th scope="col">Telepon</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Hapus</th>
                            </tr>
                        </thead>
                        <tbody style="background-color: white;">
                            @foreach ($pemilik as $user)
                                <tr>
                                    <td scope="row">{{ ++$i }}</td>
                                    <td>{{ $user->nama }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->nomor_telepon }}</td>
                                    <td>{{ $user->alamat }}</td>
                                    <td>
                                        <a href="{{ route('dashboard.daftarpemilik.editview', $user->id_user) }}">
                                            <img style="width: 30px; margin-right: 10px;"
                                                src="{{ asset('icons/ic_edit.svg') }}" alt="sf">
                                        </a>
                                    </td>

                                    <td>
                                        <a data-bs-toggle="modal" data-bs-target="#pemilikModal-{{$user->id_user}}"
                                            href="" onclick="event.preventDefault();">
                                            <img style="width: 30px; margin-right: 10px;"
                                                src="{{ asset('icons/ic_delete.svg') }}" alt="sf">
                                        </a>

                                        <form id="hapus-pemilik-{{$user->id_user}}"
                                            action="{{ route('dashboard.daftarpemilik.delete', $user->id_user) }}"
                                            method="POST" class="d-none">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="pemilikModal-{{$user->id_user}}" tabindex="-1" aria-labelledby="pemilikModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="pemilikModalLabel">Hapus Pemilik</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Hapus sekarang?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn2" data-bs-dismiss="modal">Batal</button>
                                                <button type="button" class="btn1"
                                                    onclick="document.getElementById('hapus-pemilik-{{$user->id_user}}').submit();">Hapus</button>
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
