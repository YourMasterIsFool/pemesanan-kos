<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Booking</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/client.css') }}" rel="stylesheet">
    <link href="{{ asset('js/app.js') }}" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #FAF3E3;
        }
    </style>
</head>

<body class="client">
    @include('sweetalert::alert')

    <div class="landing">
        <div class="client-header">
            @include('dashboard.client.client-navbar')
            <div class="client-title">
                <h5 style="color: black;">{{ Auth::user()->nama }}</h5>
                <div class="dropdown" style="margin-left: 30px;">
                    <a class="btn dropdown-toggle" style="background-color: #212529; color: white;" href="#"
                        role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    </a>


                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal" href=""
                            onclick="event.preventDefault();">
                            Logout
                        </a>

                        <a class="dropdown-item" href="{{ route('client.profile') }}">
                            Profil
                        </a>

                        <form id="logout-form" action="{{ route('user.logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container client-checkout">
            <div class="row justify-content-center">
                <div style="margin-top: 20px;" class="col content">
                    <div style="width: 900px;">
                        <h2 style="margin-bottom: 20px;">Booking</h2>
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
                                            <h2 class="value">{{ $detail_pesanan[0]->harga_sewa }}</h2>
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
                                                    <td>Rp. {{ $item->total }}</td>
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
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Logout sekarang?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn2" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn1"
                        onclick="document.getElementById('logout-form').submit();">Logout</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
