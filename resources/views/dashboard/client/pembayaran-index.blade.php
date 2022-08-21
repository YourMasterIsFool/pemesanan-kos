<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pembayaran</title>

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

                        <a class="dropdown-item" href="{{route('client.profile')}}">
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
                    @if (count($tagihans) < 1)
                        <h1 style="text-align: center; font-size: 24px;">Tidak ada data</h1>
                    @else
                        <h2 style="margin-bottom: 20px;">Pembayaran Anda</h2>
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
                                    <th scope="col">Upload Bukti Pembayaran</th>
                                </tr>
                            </thead>
                            <tbody style="background-color: white;">
                                @foreach ($tagihans as $item)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $item->bulan }}</td>
                                        <td>Rp. {{ $item->total }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>
                                            @if ($item->status === 'Menunggu Pembayaran')
                                                <a data-bs-toggle="modal" class="btn2"
                                                    data-bs-target="#buktiModal-{{ $item->id_tagihan }}" href=""
                                                    onclick="event.preventDefault();">
                                                    Upload
                                                </a>
                                            @else
                                                <a target="_blank" href="{{asset('bukti/' . $item->bukti)}}">Link</a>
                                            @endif
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="buktiModal-{{ $item->id_tagihan }}" tabindex="-1"
                                        aria-labelledby="kosModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="kosModalLabel">Upload</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">


                                                    <form id="uplad-bukti-{{ $item->id_tagihan }}"
                                                        enctype="multipart/form-data"
                                                        action="{{ route('client.pembayaran.upload', $item->id_tagihan) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('POST')

                                                        <label for="bukti" style="margin-bottom: 15px;">Upload Bukti
                                                            Pembayaran bulan {{ $item->bulan }}</label>
                                                        <input id="bukti" type='file'
                                                            class="form-control @error('bukti') is-invalid @enderror"
                                                            name="bukti" value="{{ old('bukti') }}"
                                                            autocomplete="username">
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn2"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="button" class="btn1"
                                                        onclick="document.getElementById('uplad-bukti-{{ $item->id_tagihan }}').submit();">Upload</button>
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
