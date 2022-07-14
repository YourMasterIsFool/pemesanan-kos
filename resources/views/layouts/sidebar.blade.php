<nav class="sidebar">
    <div class="profile">
        {{-- <a href="{{ route('user.profil.view') }}">
            <img src={{ Auth::user()->photo ? asset('images/' . Auth::user()->photo) : asset('icons/user-white.svg') }}
                alt="">
        </a> --}}
        <div class="name">
            <p class="font-1 " style="font-size: 20px">Pemesanan Kos</p>
        </div>
    </div>
    <hr style="color: white; margin:0;">
    <div class="navigation" id="navigation">
        <ul>

            {{-- Admin Menu --}}

            @can('admin')
                <li class="item {{ Request::is('admin/dashboard') || Request::is('admin/dashboard') ? 'on' : '' }}">
                    <div class="nav_title_container">
                        <div class="nav_title_icon">
                            <img src="{{ asset('icons/ic_house.svg') }}" alt="sf">
                            <a class="nav_title" href="{{ route('dashboard.admin.index') }}"
                                style="margin-right: 20px;">Dashboard</a>
                        </div>
                    </div>
                </li>


                <li
                    class="item {{ Request::is('admin/daftarpemilik') || Request::is('admin/daftarpemilik/*') ? 'on' : '' }}">
                    <div class="nav_title_container">
                        <div class="nav_title_icon">
                            <img src="{{ asset('icons/ic_org.svg') }}" alt="sf">
                            <a class="nav_title" href="{{ route('dashboard.daftarpemilik.index') }}"
                                style="margin-right: 20px;">Daftar Pemilik</a>
                        </div>
                    </div>

                </li>

                <li class="item {{ Request::is('admin/kos') || Request::is('admin/kos/*') ? 'on' : '' }}">
                    <div class="nav_title_container">
                        <div class="nav_title_icon">
                            <img src="{{ asset('icons/ic_house.svg') }}" alt="sf">
                            <a class="nav_title" href="{{ route('dashboard.daftarkos.index') }}"
                                style="margin-right: 20px;">Daftar Kos</a>
                        </div>
                    </div>

                </li>

                <li class="item">
                    <div class="nav_title_container">
                        <div class="nav_title_icon">
                            <img src="{{ asset('icons/ic_pay.svg') }}" alt="sf">
                            <a class="nav_title" href="" style="margin-right: 20px;">Pembayaran</a>
                        </div>
                    </div>
                </li>

                <li class="item">
                    <div class="nav_title_container">
                        <div class="nav_title_icon">
                            <img src="{{ asset('icons/ic_booking.svg') }}" alt="sf">
                            <a class="nav_title" href="" style="margin-right: 20px;">Pemesanan</a>
                        </div>
                    </div>
                </li>

                <li class="item">
                    <div class="nav_title_container">
                        <div class="nav_title_icon">
                            <img src="{{ asset('icons/ic_booking.svg') }}" alt="sf">
                            <a class="nav_title" href="" style="margin-right: 20px;">Daftar Booking</a>
                        </div>
                    </div>
                </li>

                <li class="item">
                    <div class="nav_title_container">
                        <div class="nav_title_icon">
                            <img src="{{ asset('icons/ic_book_solid.svg') }}" alt="sf">
                            <a class="nav_title" href="" style="margin-right: 20px;">Catatan</a>
                        </div>
                    </div>
                </li>
            @endcan

            {{-- End Admin Menu --}}

            {{-- Pemilik --}}
            @can('pemilik')
                <li class="item {{ Request::is('pemilik/dashboard') || Request::is('pemilik/dashboard') ? 'on' : '' }}">
                    <div class="nav_title_container">
                        <div class="nav_title_icon">
                            <img src="{{ asset('icons/ic_house.svg') }}" alt="sf">
                            <a class="nav_title" href="{{ route('dashboard.pemilik.index') }}"
                                style="margin-right: 20px;">Dashboard</a>
                        </div>
                    </div>
                </li>

                <li class="item {{ Request::is('pemilik/kos') || Request::is('pemilik/kos/*') ? 'on' : '' }}">
                    <div class="nav_title_container">
                        <div class="nav_title_icon">
                            <img src="{{ asset('icons/ic_house.svg') }}" alt="sf">
                            <a class="nav_title" href="{{ route('dashboard.kos.index') }}"
                                style="margin-right: 20px;">Kos</a>
                        </div>
                    </div>
                </li>

                <li class="item {{ Request::is('pemilik/pemesanan') || Request::is('pemilik/pemesanan/*') ? 'on' : '' }}">
                    <div class="nav_title_container">
                        <div class="nav_title_icon">
                            <img src="{{ asset('icons/ic_booking.svg') }}" alt="sf">
                            <a class="nav_title" href="{{route('pemilik.pemesanan.index')}}" style="margin-right: 20px;">Pemesanan <span
                                    class="badge text-bg-secondary">4</span></a>
                        </div>
                    </div>
                </li>

                <li class="item">
                    <div class="nav_title_container">
                        <div class="nav_title_icon">
                            <img src="{{ asset('icons/ic_pay.svg') }}" alt="sf">
                            <a class="nav_title" href="" style="margin-right: 20px;">Pembayaran</a>
                        </div>
                    </div>
                </li>

                <li class="item">
                    <div class="nav_title_container">
                        <div class="nav_title_icon">
                            <img src="{{ asset('icons/ic_address.svg') }}" alt="sf">
                            <a class="nav_title" href="" style="margin-right: 20px;">Daftar Booking</a>
                        </div>
                    </div>
                </li>
            @endcan
            {{-- Pemilik --}}

        </ul>

    </div>
</nav>
