<div class="client-navbar">
    <ul>
        <a href="{{ route('welcome') }}">Home</a>
        <a href="{{ route('client.booking') }}">Daftar Booking</a>
        <a href="{{ route('client.pembayaran') }}">Pembayaran</a>
        <a href="{{ route('client.pemesanan') }}">
            <img style="width: 30px;" src="{{ asset('icons/ic_booking_black.svg') }}" alt="sf"><span
                class="badge text-bg-secondary" style="color: #3b3b3b; font-size: 18px;">4</span></img>
        </a>
    </ul>
</div>
