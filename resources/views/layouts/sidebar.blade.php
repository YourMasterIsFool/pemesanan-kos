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
            <li class="{{ Request::is('home') || Request::is('home/*') ? 'active' : '' }}">
                <a href="">Home</a>
            </li>


            <li class="item" id="mn1">
                <div class="nav_title_container">
                    <div class="nav_title_icon">
                        <img src="{{ asset('icons/ic_clipboard.png') }}" alt="sf">
                        <a class="nav_title" href="#mn1" style="margin-right: 20px;">Pendaftaran</a>
                        <a href="#" class="untarget"></a>
                    </div>
                    <img class="anchor" src="{{ asset('icons/ic_angle_down.png') }}" alt="sf">
                </div>
                <div class="submenu">
                    <a href="" class="item_active">Pendaftaran Santri</a>
                    <a href="" class="">Daftar Santri</a>
                </div>
            </li>



            <li class="item" id="mn2">
                <div class="nav_title_container">
                    <div class="nav_title_icon">
                        <img src="{{ asset('icons/ic_sitemap.png') }}" alt="sf">
                        <a class="" href="#mn2" style="margin-right: 20px;">LMY</a>
                        <a href="#" class="untarget"></a>
                    </div>
                    <img class="anchor" src="{{ asset('icons/ic_angle_down.png') }}" alt="sf">
                </div>
                <div class="submenu">
                    <a href="">Daftar TPQ & RTQ</a>
                    <a href="">Daftar Pengurus</a>
                </div>
            </li>


            <li class="item" id="mn3">
                <div class="nav_title_container">
                    <div class="nav_title_icon">
                        <img src="{{ asset('icons/ic_book.png') }}" alt="sf">
                        <a class="" href="#mn3" style="margin-right: 20px;">Laporan</a>
                        <a href="#" class="untarget"></a>
                    </div>
                    <img class="anchor" src="{{ asset('icons/ic_angle_down.png') }}" alt="sf">
                </div>
                <div class="submenu">
                    <a href="">Ikhtibar</a>
                    <a href="">TPQ & RTQ</a>
                </div>
            </li>
        </ul>

    </div>
</nav>
