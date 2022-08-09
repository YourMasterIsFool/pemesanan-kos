<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class PembayaranController extends Controller
{
    private $STATUS_PEMESANAN_PESAN = 1;
    private $STATUS_PEMESANAN_BATAL = 2;
    private $STATUS_PEMESANAN_BOOKING = 3;
    private $STATUS_PEMESANAN_SELESAI = 4;
    private $STATUS_PEMBAYARAN_MENUNGGU_PEMBAYARAN = 5;
    private $STATUS_PEMBAYARAN_MENUNGGU_KONFIRMASI = 6;
    private $STATUS_PEMBAYARAN_TERKONFIRMASI = 7;
    //

    public function index(Request $request)
    {
        $pembayarans = DB::table('pemesanans')
            ->join('users', 'pemesanans.users_id', '=', 'users.id')
            ->join('kos', 'pemesanans.kos_id', '=', 'kos.id')
            ->join('statuses', 'pemesanans.status_id', '=', 'statuses.id')
            ->join('pemilik_kos', 'pemesanans.kos_id', '=', 'pemilik_kos.kos_id')
            ->select(
                'pemesanans.id as id_pesanan',
                'pemesanans.tanggal_masuk',
                'pemesanans.tanggal_keluar',
                'users.*',
                'users.id as id_user',
                'kos.id as id_kos',
                'kos.nama_kos',
                'statuses.status',
                'pemilik_kos.*',
                'pemilik_kos.user_id as id_pemilik'
            )
            ->where('pemilik_kos.user_id', '=', $request->user()->id)
            ->where('pemesanans.status_id', '=', $this->STATUS_PEMBAYARAN_MENUNGGU_PEMBAYARAN)
            ->get();

        foreach ($pembayarans as $key => $value) {
            $pembayarans[$key]->durasi = $this->dateDiffInDays($pembayarans[0]->tanggal_masuk, $pembayarans[0]->tanggal_keluar);
            $pembayarans[$key]->tanggal_masuk = $this->timestampToDateFormat($pembayarans[$key]->tanggal_masuk);
            $pembayarans[$key]->tanggal_keluar = $this->timestampToDateFormat($pembayarans[$key]->tanggal_keluar);
        }

        return view('dashboard.admin.Pembayaran.index', compact('pembayarans'));
    }

    public function countPesanan($pemilik_id)
    {
        $pesanan = DB::table('pemesanans')
            ->join('statuses', 'pemesanans.status_id', '=', 'statuses.id')
            ->join('pemilik_kos', 'pemesanans.kos_id', '=', 'pemilik_kos.kos_id')
            ->where('pemilik_kos.user_id', '=', $pemilik_id)
            ->where('pemesanans.status_id', '=', $this->STATUS_PEMESANAN_PESAN)
            ->get();

        return count($pesanan);
    }

    function dateDiffInDays($date1, $date2)
    {
        // Calculating the difference in timestamps
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
