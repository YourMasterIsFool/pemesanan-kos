<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pembayaran;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Support\Carbon;

class BookingController extends Controller
{
    private $STATUS_PEMESANAN_MASUK = 1;
    private $STATUS_PEMESANAN_BERHASIL = 2;
    private $STATUS_PEMESANAN_BATAL = 3;
    private $STATUS_PEMBAYARAN_MENUNGGU_PEMBAYARAN = 4;
    private $STATUS_PEMBAYARAN_MENUNGGU_KONFIRMASI_PEMBAYARAN = 5;
    private $STATUS_PEMBAYARAN_TERKONFIRMASI = 6;
    private $STATUS_PEMBAYARAN_DIBATALKAN = 7;
    private $STATUS_BOOOKING_BERLANGSUNG = 8;
    private $STATUS_BOOOKING_BERAKHIR = 9;
    private $STATUS_DIBAYAR_SEBAGIAN = 10;
    private $STATUS_LUNAS = 11;


    public function index(Request $request)
    {
        $bookings = DB::table('bookings')
            ->join('pemesanans', 'bookings.pemesanan_id', '=', 'pemesanans.id')
            ->join('users', 'bookings.users_id', '=', 'users.id')
            ->join('statuses', 'bookings.status_id', '=', 'statuses.id')
            ->join('kos', 'pemesanans.kos_id', '=', 'kos.id')
            ->select(
                'bookings.*',
                'users.nama',
                'users.alamat',
                'pemesanans.tanggal_masuk',
                'pemesanans.tanggal_keluar',
                'kos.nama_kos'
            )
            ->get();

        foreach ($bookings as $key => $value) {
            $bookings[$key]->durasi = $this->dateDiffInDays($bookings[$key]->tanggal_masuk, $bookings[$key]->tanggal_keluar);
        }

        return view('dashboard.admin.Booking.index', compact('bookings'));
    }

    public function detail($id)
    {

        $id_pemesan = Booking::find($id)->users_id;
        $pembayaran = Pembayaran::where('users_id', $id_pemesan)->get();

        $bookings = DB::table('bookings')
            ->join('users', 'bookings.users_id', '=', 'users.id')
            ->join('statuses', 'bookings.status_id', '=', 'statuses.id')
            ->select('bookings.*', 'statuses.*')
            ->where('users.id', '=', $id_pemesan)
            ->where('statuses.id', '=', $this->STATUS_BOOOKING_BERLANGSUNG)
            ->get();

        if (count($bookings) < 1) {
            return view('dashboard.client.daftar-booking', compact(
                'total_pesanan',
                'total_pembayaran',
                'bookings',
            ));
        } else {
            $detail_pesanan = DB::table('pemesanans')
                ->join('users', 'pemesanans.users_id', '=', 'users.id')
                ->join('kos', 'pemesanans.kos_id', '=', 'kos.id')
                ->join('statuses', 'pemesanans.status_id', '=', 'statuses.id')
                ->select(
                    'pemesanans.id as id_pesanan',
                    'pemesanans.tanggal_masuk',
                    'pemesanans.tanggal_keluar',
                    'users.*',
                    'users.id as id_user',
                    'kos.*',
                    'kos.id as id_kos',
                    'kos.nama_kos',
                    'statuses.status'
                )
                ->where('pemesanans.id', '=', $bookings[0]->pemesanan_id)
                ->get();

            $detail = DB::table('pembayarans')
                ->join('users', 'pembayarans.users_id', '=', 'users.id')
                ->join('kos', 'pembayarans.kos_id', '=', 'kos.id')
                ->join('statuses', 'pembayarans.status_id', '=', 'statuses.id')
                ->join('pemesanans', 'pembayarans.pemesanan_id', '=', 'pemesanans.id')
                ->select(
                    'pembayarans.id as id_pembayaran',
                    'pembayarans.pemesanan_id as id_pemesanan',
                    'pembayarans.total',
                    'pembayarans.sisa_tagihan',
                    'users.*',
                    'users.id as id_user',
                    'users.alamat as alamat_pemesan',
                    'kos.*',
                    'statuses.*',
                    'pemesanans.tanggal_masuk',
                    'pemesanans.tanggal_keluar',
                )
                ->where('pembayarans.id', '=', $pembayaran[0]->id)
                ->get()[0];

            $detail->durasi_booking = $this->dateDiffInDays($detail->tanggal_masuk, $detail->tanggal_keluar);
            $detail->tanggal_masuk = $this->timestampToDateFormat($detail->tanggal_masuk);
            $detail->tanggal_keluar = $this->timestampToDateFormat($detail->tanggal_keluar);

            $tagihans = DB::table('tagihans')
                ->join('users', 'tagihans.users_id', '=', 'users.id')
                ->join('statuses', 'tagihans.status_id', '=', 'statuses.id')
                ->select('tagihans.*', 'statuses.*', 'tagihans.id as id_tagihan')
                ->where('users.id', '=', $id_pemesan)
                ->get();

            foreach ($tagihans as $tagihan_key => $tagihan) {
                foreach ($this->getBulan() as $key_bulan => $bulan) {
                    // dd($tagihan->bulan == 4);

                    if ($tagihan->bulan == $key_bulan) {
                        $tagihans[$tagihan_key]->bulan = $bulan;
                    }
                }
            }

            return view('dashboard.admin.Booking.detail', compact(
                'bookings',
                'detail_pesanan',
                'tagihans',
                'detail'
            ));
        }
    }


    public function getBulan()
    {
        return array(
            '1' => 'Januari',
            '2' => 'Februari',
            '3' => 'Maret',
            '4' => 'April',
            '5' => 'Mei',
            '6' => 'Juni',
            '7' => 'Juli',
            '8' => 'Agustus',
            '9' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        );
    }

    function dateDiffInDays($date1, $date2)
    {
        $diff = $date2 - $date1;

        return abs(round($diff / 2630000)) . ' Bulan';
    }

    public function timestampToDateFormat($date)
    {

        $tanggal = Carbon::createFromTimestamp(
            $date
        )->locale('id')->translatedFormat('jS F Y h:i:s A');

        return $tanggal;
    }
}
