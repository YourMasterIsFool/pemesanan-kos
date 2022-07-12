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
            
                <li class="item {{ Request::is('admin/dashboard') || Request::is('admin/dashboard') ? 'on' : '' }}">
                    <div class="nav_title_container">
                        <div class="nav_title_icon">
                            <img src="{{ asset('icons/ic_house.svg') }}" alt="sf">
                            <a class="nav_title" href="{{route('dashboard.admin.index')}}"
                                style="margin-right: 20px;">Dashboard</a>
                        </div>
                    </div>
                    
                </li>

                <li class="item {{ Request::is('admin/daftarpemilik') || Request::is('admin/daftarpemilik/*') ? 'on' : '' }}">
                    <div class="nav_title_container">
                        <div class="nav_title_icon">
                            <img src="{{ asset('icons/ic_house.svg') }}" alt="sf">
                            <a class="nav_title" href="{{route('dashboard.daftarpemilik.index')}}"
                                style="margin-right: 20px;">Daftar Pemilik</a>
                        </div>
                    </div>
                    
                </li>

                <li class="item">
                    <div class="nav_title_container">
                        <div class="nav_title_icon">
                            <img src="{{ asset('icons/ic_house.svg') }}" alt="sf">
                            <a class="nav_title" href=""
                                style="margin-right: 20px;">Daftar Kos</a>
                        </div>
                    </div>
                    
                </li>


                <li class="item">
                    <div class="nav_title_container">
                        <div class="nav_title_icon">
                            <img src="{{ asset('icons/ic_house.svg') }}" alt="sf">
                            <a class="nav_title" href=""
                                style="margin-right: 20px;">Kos</a>
                        </div>
                    </div>
                    
                </li>

                <li class="item">
                    <div class="nav_title_container">
                        <div class="nav_title_icon">
                            <img src="{{ asset('icons/ic_booking.svg') }}" alt="sf">
                            <a class="nav_title" href=""
                                style="margin-right: 20px;">Pemesanan</a>
                        </div>
                    </div>
                    
                </li>

                 <li class="item">
                    <div class="nav_title_container">
                        <div class="nav_title_icon">
                            <img src="{{ asset('icons/ic_pay.svg') }}" alt="sf">
                            <a class="nav_title" href=""
                                style="margin-right: 20px;">Pembayaran</a>
                        </div>
                    </div>
                    
                </li>

                <li class="item">
                    <div class="nav_title_container">
                        <div class="nav_title_icon">
                            <img src="{{ asset('icons/ic_booking.svg') }}" alt="sf">
                            <a class="nav_title" href=""
                                style="margin-right: 20px;">Daftar Booking</a>
                        </div>
                    </div>
                    
                </li>                
            
            {{-- End Admin Menu --}}
        </ul>

    </div>
</nav>
