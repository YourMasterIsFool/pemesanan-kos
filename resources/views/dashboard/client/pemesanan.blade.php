<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pemesanan</title>

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
                    @if (count($pesanan) < 1)
                        <h1 style="text-align: center; font-size: 24px;">Tidak ada data</h1>
                    @else
                        <h2 style="margin-bottom: 20px;">Pesanan kos anda</h2>
                        <table class="table" style="width: 1100px;">
                            @php
                                $i = 0;
                            @endphp
                            <thead class="bg-4" style="color: white;">
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Nama Kos</th>
                                    <th scope="col">Tanggal Masuk</th>
                                    <th scope="col">Tanggal Keluar</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Booking</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Batal</th>
                                </tr>
                            </thead>
                            <tbody style="background-color: white;">
                                @foreach ($pesanan as $order)
                                    <tr>
                                        <td scope="row">{{ ++$i }}</td>
                                        <td>{{ $order->nama_kos }}</td>
                                        <td>{{ $order->tanggal_masuk ?? 'kosong' }}</td>
                                        <td>{{ $order->tanggal_keluar ?? 'kosong' }}</td>
                                        <td>{{ $order->status }}</td>
                                        <td>
                                            <a data-bs-toggle="modal" href=""
                                                data-bs-target="#bookingModal-{{ $order->id_pesanan }}"
                                                onclick="event.preventDefault();">
                                                <img style="width: 30px; margin-right: 10px;"
                                                    src="{{ asset('icons/ic_check.svg') }}" alt="sf">
                                            </a>

                                            <form id="booking-pesanan-{{ $order->id_pesanan }}"
                                                action="{{ route('client.pemesanan.edit.booking', $order->id_pesanan) }}"
                                                method="POST" class="d-none">
                                                @csrf
                                                @method('POST')
                                            </form>
                                        </td>

                                        <td>
                                            <a href="{{ route('client.pemesanan.edit.view', $order->id_pesanan) }}">
                                                <img style="width: 30px; margin-right: 10px;"
                                                    src="{{ asset('icons/ic_edit.svg') }}" alt="sf">
                                            </a>
                                        </td>

                                        <td>
                                            <a data-bs-toggle="modal" href=""
                                                data-bs-target="#pesananModal-{{ $order->id_pesanan }}"
                                                onclick="event.preventDefault();">
                                                <img style="width: 30px; margin-right: 10px;"
                                                    src="{{ asset('icons/ic_delete.svg') }}" alt="sf">
                                            </a>

                                            <form id="hapus-pesanan-{{ $order->id_pesanan }}"
                                                action="{{ route('client.pemesanan.batal', $order->id_pesanan) }}"
                                                method="POST" class="d-none">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="bookingModal-{{ $order->id_pesanan }}" tabindex="-1"
                                        aria-labelledby="booking-modal-label" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="booking-modal-label">Booking Pesanan
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Booking sekarang?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn2"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="button" class="btn1"
                                                        onclick="document.getElementById('booking-pesanan-{{ $order->id_pesanan }}').submit();">Booking</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="pesananModal-{{ $order->id_pesanan }}"
                                        tabindex="-1" aria-labelledby="pesanan-modal-label" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="pesanan-modal-label">Hapus Pesanan
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Hapus sekarang?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn2"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="button" class="btn1"
                                                        onclick="document.getElementById('hapus-pesanan-{{ $order->id_pesanan }}').submit();">Batalkan</button>
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
    </div>
</body>

</html>
