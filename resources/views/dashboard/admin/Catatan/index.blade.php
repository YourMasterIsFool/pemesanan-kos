@extends('layouts.base')

@section('title')
<title>Catatan Kos</title>
@endsection

@section('content')
<div class="container">
    <h2 class="black">Catatan Kos</h2>
    <div class="row" style="height: 100%">
        <div style="display: flex; justify-content: end; margin-bottom: 10px;">
            {{-- <a href="{{ route('admin.catatan.create') }}" class="btn1">Tambah Catatan</a> --}}
        </div>
        <div style="margin: 20px 0; display: flex; flex-direction: row ;justify-content: space-between; align-items: center">
            <form action="{{ route('admin.catatan.index') }}" style="display: flex; align-items:center;" method="GET">
                <div class="form-group" style="width: 160px; margin-right: 10px;">
                    <label for="bulan">Bulan</label>
                    <select required name="bulan" class="form-select" aria-label="Default select example">
                        <option selected value="all">Semua</option>
                        @foreach ($bulans as $key => $value)
                        @if ($input_bulan == $value)
                        <option selected value="{{ $key }}">{{ $value }}</option>
                        @else
                        <option value="{{ $key }}">{{ $value }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>


                <button type="submit" style="height: 40px; margin-top: 30px;" class="btn1">Cari</button>
            </form>

            <div>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCetak">
                    Launch demo modal
                </button>

                <!-- Modal -->
                <div class="modal fade" id="modalCetak" tabindex="-1" aria-labelledby="modalCetakLabel" aria-hidden="true">
                    <form action="{{ route('admin.catatan.cetak')}}" method="GET" class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">
                                    Cetak Catatan
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="">
                                        Bulan Awal
                                    </label>
                                    <input name="start_month" required class="form-control " type="month" id="start-month">
                                </div>

                                <div class="form-group">
                                    <label for="">
                                        Bulan Akhir
                                    </label>
                                    <input name="end_month" required class="form-control " type="month" id="end-month">
                                </div>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Cetak Catatan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <div style="margin-top: 20px;" class="">
            @if (count($catatans) < 1) <h1 style="text-align: center; font-size: 24px;">Tidak ada data</h1>
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
                        </tr>
                    </thead>
                    <tbody style="background-color: white;">
                        @foreach ($catatans as $item)
                        <tr>
                            <td scope="row">{{ ++$i }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->nomor_kamar }}</td>
                            <td>{{ date('F Y', strtotime($item->bulan)) }}</td>
                            <td>Rp. {{ number_format($item->jumlah) }}</td>

                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="pemilikModal-{{ $item->id }}" tabindex="-1" aria-labelledby="pemilikModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="pemilikModalLabel">Hapus Catatan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Hapus sekarang?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn2" data-bs-dismiss="modal">Batal</button>
                                        <button type="button" class="btn1" onclick="document.getElementById('hapus-pemilik-{{ $item->id }}').submit();">Hapus</button>
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

    <script>
        let startMonth = null;
        let endMonth = null;


        // $('#start-month').datepicker({
        //     changeMonth: true,
        //     changeYeaer: true,
        //     dateFormat: 'MM yy',


        // });

        // $('#end-month').datepicker({
        //     changeMonth: true,
        //     changeYeaer: true,
        //     dateFormat: 'MM yy',

        // });
    </script>

</div>

@endsection