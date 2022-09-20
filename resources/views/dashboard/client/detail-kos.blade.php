<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Detiail Kos</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/client.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #FAF3E3;
        }
    </style>
</head>

<body class="client">
    @include('sweetalert::alert')

    <div class="detail-maps-search">
        <div class="left" id="map">

        </div>
        <div class="right">
            <div class="detail-content">
                <div class="detail-header">
                    <div class="detail-item">
                        <h2 class="title">Nama Kos</h2>
                        <h2 class="separator">:</h2>
                        <h2 class="value">{{ $data[0]->nama_kos }}</h2>
                    </div>
                    <div class="detail-item">
                        <h2 class="title">Nama Pemilik</h2>
                        <h2 class="separator">:</h2>
                        <h2 class="value">{{ $data[0]->nama_pemilik }}</h2>
                    </div>
                </div>
                <div class="detail-body">
                    <div class="left">
                        <div class="detail-item small">
                            <h2 class="title">Tipe Kos</h2>
                            <h2 class="value">{{ $data[0]->tipe }}</h2>
                        </div>
                        <div class="detail-item small">
                            <h2 class="title">No. Telepon Pemilik</h2>
                            <h2 class="value">{{ $data[0]->nomor_telepon }}</h2>
                        </div>
                        <div class="detail-item small">
                            <h2 class="title">Jumlah Kamar</h2>
                            <h2 class="value">{{ $data[0]->jumlah_kamar }}</h2>
                        </div>
                        <div class="detail-item small">
                            <h2 class="title">Alamat</h2>
                            <h2 class="value">{{ $data[0]->alamat }}</h2>
                        </div>
                    </div>
                    <div>
                        <div class="detail-item small">
                            <h2 class="title">Fasilitas</h2>
                            <h2 class="value">{{ $data[0]->fasilitas }}</h2>
                        </div>
                        <div class="detail-item small">
                            <h2 class="title">Harga Sewa (bulan)</h2>
                            <h2 class="value">Rp. {{ $data[0]->harga_sewa }}</h2>
                        </div>
                        <div class="detail-item small">
                            <h2 class="title">Kamar Kosong</h2>
                            <h2 class="value">{{ $data[0]->kamar_kosong }}</h2>
                        </div>
                        <div class="detail-item small">
                            <h2 class="title">Deskripsi</h2>
                            <h2 class="value">{{ $data[0]->deskripsi }}</h2>
                        </div>
                    </div>
                </div>

                <div class="detail-foto">
                    <h2 class="title">Gambar Kos</h2>
                    <div class="gambar">
                        <img src="{{ asset('kos/' . $data[0]->foto) }}" alt="gambar-kamar">
                    </div>
                </div>

                <form action="{{ route('kos.pesan', $data[0]->kos_id) }}" method="POST">
                    @csrf
                    @method('POST')
                    <input type="text" value="{{ $data[0]->kos_id }}" hidden>

                    <div class="booking">
                        <a href="{{ route('client.welcome') }}" class="btn2" style="margin-right: 10px;">Cari Kos</a>
                        <button type="submit" style="cursor: pointer;" class="btn1">Pesan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        const kos = @json($kos);
    </script>
    <script src="{{ asset('maps/detailKosMaps.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyATWmlqT4BxhuydhfOPcFcfT6KvnPTsD_w&callback=initMap" async
        defer></script>

</body>

</html>
