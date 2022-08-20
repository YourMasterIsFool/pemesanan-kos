<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class PemesananController extends Controller
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

    public function index(Request $request)
    {
        if ($request->user()->roles[0]->role === 'Admin') {
            $pesanan = DB::table('pemesanans')
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
                ->orderByDesc('pemesanans.created_at')
                ->get();

            foreach ($pesanan as $key => $value) {
                $pesanan[$key]->durasi = $this->dateDiffInDays($pesanan[$key]->tanggal_masuk, $pesanan[$key]->tanggal_keluar);
                $pesanan[$key]->tanggal_masuk = $this->timestampToDateFormat($pesanan[$key]->tanggal_masuk);
                $pesanan[$key]->tanggal_keluar = $this->timestampToDateFormat($pesanan[$key]->tanggal_keluar);
            }

            $total_pesanan = $this->countPesanan($request->user()->id);


            return view('dashboard.admin.Pemesanan.index', compact('pesanan', 'total_pesanan'));
        }

        $pesanan = DB::table('pemesanans')
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
            ->orderByDesc('pemesanans.created_at')
            ->get();

        foreach ($pesanan as $key => $value) {
            $pesanan[$key]->durasi = $this->dateDiffInDays($pesanan[$key]->tanggal_masuk, $pesanan[$key]->tanggal_keluar);
            $pesanan[$key]->tanggal_masuk = $this->timestampToDateFormat($pesanan[$key]->tanggal_masuk);
            $pesanan[$key]->tanggal_keluar = $this->timestampToDateFormat($pesanan[$key]->tanggal_keluar);
        }

        $total_pesanan = $this->countPesanan($request->user()->id);


        return view('dashboard.admin.Pemesanan.index', compact('pesanan', 'total_pesanan'));
    }

    public function detail($id)
    {
        $detail = DB::table('pemesanans')
            ->join('users', 'pemesanans.users_id', '=', 'users.id')
            ->join('kos', 'pemesanans.kos_id', '=', 'kos.id')
            ->join('statuses', 'pemesanans.status_id', '=', 'statuses.id')
            ->select(
                'pemesanans.id as id_pesanan',
                'users.nama',
                'users.nik',
                'users.foto_ktp',
                'users.email',
                'users.jenis_kelamin',
                'users.alamat as alamat_pemesan',
                'users.nomor_telepon',
                'kos.*',
                'statuses.*'
            )
            ->where('users.id', '=', $id)
            ->get()[0];
        // dd($detail);
        return view('dashboard.admin.Pemesanan.detail', compact('detail'));
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

    public function countPesanan($pemilik_id)
    {
        $pesanan = DB::table('pemesanans')
            ->join('statuses', 'pemesanans.status_id', '=', 'statuses.id')
            ->join('pemilik_kos', 'pemesanans.kos_id', '=', 'pemilik_kos.kos_id')
            ->where('pemilik_kos.user_id', '=', $pemilik_id)
            ->where('pemesanans.status_id', '=', $this->STATUS_PEMESANAN_MASUK)
            ->get();

        return count($pesanan);
    }
}
