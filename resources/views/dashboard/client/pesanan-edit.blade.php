<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Edit Pesanan</title>

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
                        <h2 style="margin-bottom: 20px;">Edit pesanan</h2>
                        <div class="detail-content" style="text-align: start;">
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

                            <h3 style="margin: 20px 0;">Pilih Tanggal</h3>
                            <form action="{{ route('client.pemesanan.edit.save', $detail_pesanan[0]->id_pesanan) }}"
                                method="POST">
                                @csrf
                                @method('POST')

                                <div style="display: flex;">
                                    <div
                                        style="width: 180px; margin-right:10px; display: flex; flex-direction: column;">
                                        <label for="">Tanggal Masuk</label>
                                        <input name="tanggal_masuk" class="form-control" type="datetime-local">
                                    </div>

                                    <div style="width: 180px; display: flex; flex-direction: column;">
                                        <label for="">Tanggal Keluar</label>
                                        <input name="tanggal_keluar" class="form-control" type="datetime-local">
                                    </div>
                                </div>

                                <div class="booking">
                                    <a href="{{ route('client.pemesanan') }}" class="btn2"
                                        style="margin-right: 10px;">Kembali</a>
                                    <button type="submit" style="cursor: pointer;" class="btn1">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>
