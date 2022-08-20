<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class PembayaranController extends Controller
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
    //

    public function index(Request $request)
    {
        $pembayarans = DB::table('pembayarans')
            ->join('users', 'pembayarans.users_id', '=', 'users.id')
            ->join('kos', 'pembayarans.kos_id', '=', 'kos.id')
            ->join('statuses', 'pembayarans.status_id', '=', 'statuses.id')
            ->join('pemilik_kos', 'pembayarans.kos_id', '=', 'pemilik_kos.kos_id')
            ->join('pemesanans', 'pembayarans.pemesanan_id', '=', 'pemesanans.id')
            ->select(
                'pembayarans.id as id_pembayaran',
                'pembayarans.pemesanan_id as id_pemesanan',
                'pembayarans.sisa_tagihan',
                'users.*',
                'users.id as id_user',
                'kos.id as id_kos',
                'kos.nama_kos',
                'statuses.status',
                'pemilik_kos.*',
                'pemilik_kos.user_id as id_pemilik',
                'pembayarans.total'
            )
            ->where('pemilik_kos.user_id', '=', $request->user()->id)
            ->get();

        return view('dashboard.admin.Pembayaran.index', compact('pembayarans'));
    }

    public function detail($id)
    {
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
                'users.nama',
                'users.id as id_user',
                'users.nik',
                'users.foto_ktp',
                'users.email',
                'users.jenis_kelamin',
                'users.alamat as alamat_pemesan',
                'users.nomor_telepon',
                'kos.*',
                'statuses.*',
                'pemesanans.tanggal_masuk',
                'pemesanans.tanggal_keluar',
            )
            ->where('pembayarans.id', '=', $id)
            ->get()[0];

        $detail->durasi_booking = $this->dateDiffInDays($detail->tanggal_masuk, $detail->tanggal_keluar);
        $detail->tanggal_masuk = $this->timestampToDateFormat($detail->tanggal_masuk);
        $detail->tanggal_keluar = $this->timestampToDateFormat($detail->tanggal_keluar);

        $tagihans = DB::table('tagihans')
            ->join('users', 'tagihans.users_id', '=', 'users.id')
            ->join('statuses', 'tagihans.status_id', '=', 'statuses.id')
            ->select('tagihans.*', 'statuses.*')
            ->where('users.id', '=', $detail->id_user)
            ->get();

        foreach ($tagihans as $tagihan_key => $tagihan) {
            foreach ($this->getBulan() as $key_bulan => $bulan) {
                // dd($tagihan->bulan == 4);

                if ($tagihan->bulan == $key_bulan) {
                    $tagihans[$tagihan_key]->bulan = $bulan;
                }
            }
        }

        // dd($tagihans);

        return view('dashboard.admin.Pembayaran.detail', compact('detail', 'tagihans'));
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
        // Calculating the difference in timestamps
        $diff = $date2 - $date1;

        return abs(round($diff / 2630000)) . ' Bulan';
    }

    public function timestampToDateFormat($date)
    {

        $tanggal = Carbon::createFromTimestamp(
            $date
        )->locale('id')->translatedFormat('jS F Y h:i:s');

        return $tanggal;
    }
}
