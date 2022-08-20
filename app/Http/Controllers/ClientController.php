<?php

namespace App\Http\Controllers;

use App\Models\Kos;
use App\Models\Pembayaran;
use App\Models\Pemesanan;
use App\Models\Tagihan;
use Faker\Provider\Lorem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Carbon;

class ClientController extends Controller
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


    // PROFIL
    public function profileView(Request $request)
    {
        $total_pesanan = $this->getTotalPesanan($request->user()->id);
        $total_pembayaran = $this->getTotalPembayaran($request->user()->id);

        return view('dashboard.client.profile', compact('total_pesanan', 'total_pembayaran'));
    }

    public function homeView(Request $request)
    {
        $total_pesanan = $this->getTotalPesanan($request->user()->id);
        $total_pembayaran = $this->getTotalPembayaran($request->user()->id);

        return view('welcome', compact('total_pesanan', 'total_pembayaran'));
    }

    // BOOKING
    public function bookingView(Request $request)
    {
        $total_pesanan = $this->getTotalPesanan($request->user()->id);
        $total_pembayaran = $this->getTotalPembayaran($request->user()->id);

        return view('dashboard.client.daftar-booking', compact('total_pesanan', 'total_pembayaran'));
    }

    // PEMBAYARAN
    public function pembayaranView(Request $request)
    {
        $total_pesanan = $this->getTotalPesanan($request->user()->id);
        $total_pembayaran = $this->getTotalPembayaran($request->user()->id);

        $pembayaran = DB::table('pemesanans')
            ->join('users', 'pemesanans.users_id', '=', 'users.id')
            ->join('kos', 'pemesanans.kos_id', '=', 'kos.id')
            ->join('statuses', 'pemesanans.status_id', '=', 'statuses.id')
            ->select(
                'pemesanans.id as id_pesanan',
                'pemesanans.tanggal_masuk',
                'pemesanans.tanggal_keluar',
                'users.*',
                'users.id as id_user',
                'kos.id as id_kos',
                'kos.nama_kos',
                'statuses.status'
            )
            ->where('pemesanans.users_id', '=', $request->user()->id)
            ->where('pemesanans.status_id', '=', $this->STATUS_PEMBAYARAN_MENUNGGU_PEMBAYARAN)
            ->get();

        foreach ($pembayaran as $key => $value) {
            $pembayaran[$key]->tanggal_masuk = $this->timestampToDateFormat($pembayaran[$key]->tanggal_masuk);
            $pembayaran[$key]->tanggal_keluar = $this->timestampToDateFormat($pembayaran[$key]->tanggal_keluar);
        }


        return view('dashboard.client.pembayaran-index', compact(
            'total_pesanan',
            'total_pembayaran',
            'pembayaran'
        ));
    }

    // PEMESANAN
    public function pemesananView(Request $request)
    {
        $total_pembayaran = $this->getTotalPembayaran($request->user()->id);
        $total_pesanan = $this->getTotalPesanan($request->user()->id);

        $pesanan = DB::table('pemesanans')
            ->join('users', 'pemesanans.users_id', '=', 'users.id')
            ->join('kos', 'pemesanans.kos_id', '=', 'kos.id')
            ->join('statuses', 'pemesanans.status_id', '=', 'statuses.id')
            ->select(
                'pemesanans.id as id_pesanan',
                'pemesanans.tanggal_masuk',
                'pemesanans.tanggal_keluar',
                'users.*',
                'users.id as id_user',
                'kos.id as id_kos',
                'kos.nama_kos',
                'statuses.status'
            )
            ->where('pemesanans.users_id', '=', $request->user()->id)
            ->where('pemesanans.status_id', '=', $this->STATUS_PEMESANAN_MASUK)
            ->get();

        foreach ($pesanan as $key => $value) {
            $pesanan[$key]->tanggal_masuk = $this->timestampToDateFormat($pesanan[$key]->tanggal_masuk);
            $pesanan[$key]->tanggal_keluar = $this->timestampToDateFormat($pesanan[$key]->tanggal_keluar);
        }

        return view('dashboard.client.pemesanan', compact('total_pesanan', 'total_pembayaran', 'pesanan'));
    }

    public function pesanKos(Request $request, $id)
    {
        $pemesanan = Pemesanan::create([
            'users_id' => $request->user()->id,
            'kos_id' => $request->id,
            'status_id' => $this->STATUS_PEMESANAN_MASUK,
            'tanggal_masuk' => now()->get('timestamp'),
            'tanggal_keluar' => now()->get('timestamp')
        ]);

        $kos = Kos::find($id);

        $kos->update([
            'kamar_kosong' => $kos->kamar_kosong -= 1
        ]);

        Alert::success('info', 'Pesanan berhasil dibuat');
        return redirect()->route('client.pemesanan');
    }

    public function batalkanPesanan(Request $request, $id)
    {
        $pesanan = Pemesanan::find($id);

        $pesanan->update([
            'status_id' => $this->STATUS_PEMESANAN_BATAL
        ]);

        $kos = Kos::find($id);

        $kos->update([
            'kamar_kosong' => $kos->kamar_kosong += 1
        ]);

        Alert::success('info', 'Pesanan berhasil dihapus');
        return redirect()->route('client.pemesanan');
    }

    public function editPesananView(Request $request, $id)
    {
        $total_pesanan = $this->getTotalPesanan($request->user()->id);
        $total_pembayaran = $this->getTotalPembayaran($request->user()->id);

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
            ->where('pemesanans.id', '=', $id)
            ->get();


        // dd($detail_pesanan);


        return view('dashboard.client.pesanan-edit', compact('total_pesanan', 'total_pembayaran', 'detail_pesanan'));
    }

    public function editPesananSave(Request $request, $id)
    {
        if (!$request->tanggal_masuk && !$request->tanggal_keluar) {
            return redirect()->route('client.pemesanan');
        }
        $pesanan = Pemesanan::find($id);
        $pesanan->update([
            'tanggal_masuk' => strtotime($request->tanggal_masuk),
            'tanggal_keluar' => strtotime($request->tanggal_keluar)
        ]);

        Alert::success('info', 'Pesanan berhasil diupate');
        return redirect()->route('client.pemesanan');
    }

    public function bookingPesanan(Request $request, $id)
    {
        $pesanan = Pemesanan::find($id);
        $pesanan->update([
            'status_id' => $this->STATUS_PEMESANAN_BERHASIL
        ]);

        $harga_sewa = Kos::find($pesanan->kos_id)->harga_sewa;
        $total = (int)($this->dateDiffInDays($pesanan->tanggal_masuk, $pesanan->tanggal_keluar)) * (int)$harga_sewa;
        $durasi_sewa = (int)$this->dateDiffInDays($pesanan->tanggal_masuk, $pesanan->tanggal_keluar);
        $bulan_awal = $this->timestampToBulan($pesanan->tanggal_masuk);
        $id_bulan = $this->getIdBulan($bulan_awal);
        // dd($id_bulan);
        // dd($durasi_sewa);

        $pembayaran = Pembayaran::create([
            'pemesanan_id' => $pesanan->id,
            'users_id' => $pesanan->users_id,
            'kos_id' => $pesanan->kos_id,
            'status_id' => $this->STATUS_PEMBAYARAN_MENUNGGU_PEMBAYARAN,
            'total' => (int)$total,
            'sisa_tagihan' => (int)$total,
            'expired_at' => time() + 24 * 60 * 60
        ]);

        for ($i = (int)$id_bulan; $i < ($id_bulan + $durasi_sewa); $i++) {
            Tagihan::create([
                'pembayaran_id' => $pembayaran->id,
                'users_id' => $pesanan->users_id,
                'status_id' => $this->STATUS_PEMBAYARAN_MENUNGGU_PEMBAYARAN,
                'total' => (int)($total / $durasi_sewa),
                'bulan' => (string)$i
            ]);
        }

        Alert::success('info', 'Booking berhasil, lanjutkan proses pembayaran');
        return redirect()->route('client.pembayaran');
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


    public function getIdBulan($bulan)
    {
        $bulans = array(
            'Januari' => '1',
            'Februari' => '2',
            'Maret' => '3',
            'April' => '4',
            'Mei' => '5',
            'Juni' => '6',
            'Juli' => '7',
            'Agustus' => '8',
            'September' => '9',
            'Oktober' => '10',
            'November' => '11',
            'Desember' => '12',
        );

        foreach ($bulans as $key => $item) {
            if ($bulan === $key) {
                return $item;
            }
        }
    }


    function dateDiffInDays($date1, $date2)
    {
        $diff = $date2 - $date1;

        return abs(round($diff / 2630000));
    }


    public function getTotalPesanan($id_user)
    {
        $total_pesanan = DB::table('pemesanans')
            ->where('users_id', '=', $id_user)
            ->where('status_id', '=', $this->STATUS_PEMESANAN_MASUK)
            ->count();

        return $total_pesanan;
    }

    public function getTotalPembayaran($id_user)
    {
        $total_pesanan = DB::table('tagihans')
            ->where('users_id', '=', $id_user)
            ->where('status_id', '=', $this->STATUS_PEMBAYARAN_MENUNGGU_PEMBAYARAN)
            ->count();

        return $total_pesanan;
    }



    public function timestampToDateFormat($date)
    {

        $tanggal = Carbon::createFromTimestamp(
            $date
        )->locale('id')->translatedFormat('jS F Y h:i:s A');

        return $tanggal;
    }

    public function timestampToBulan($date)
    {

        $tanggal = Carbon::createFromTimestamp(
            $date
        )->locale('id')->translatedFormat('F');

        return $tanggal;
    }


    // MAPS
    public function index()
    {
        $data =  DB::table('pemilik_kos')
            ->join('kos', 'pemilik_kos.kos_id', '=', 'kos.id')
            ->join('users', 'pemilik_kos.user_id', '=', 'users.id')
            ->join('tipe_kos', 'pemilik_kos.tipe_kos_id', '=', 'tipe_kos.id')
            ->select(
                'kos.id',
                'tipe_kos.tipe',
                'kos.nama_kos as judul',
                'kos.alamat as lokasi',
                'kos.deskripsi',
                'kos.latitude',
                'kos.longitude'
            )
            ->get()->toArray();

        $kos = [];

        foreach ($data as $dataKos => $value) {
            array_push($kos, $this->createTemplateItemMaps($value));
        }


        return view('dashboard.client.search', compact('kos'));
    }

    public function detailKosById($id)
    {
        $data =  DB::table('pemilik_kos')
            ->join('kos', 'pemilik_kos.kos_id', '=', 'kos.id')
            ->join('users', 'pemilik_kos.user_id', '=', 'users.id')
            ->join('tipe_kos', 'pemilik_kos.tipe_kos_id', '=', 'tipe_kos.id')
            ->join('foto_kos', 'kos.id', '=', 'foto_kos.id')
            ->select(
                'kos.id',
                'users.nama as nama_pemilik',
                'tipe_kos.tipe',
                'kos.*',
                'foto_kos.*'
            )
            ->where('kos.id', '=', $id)
            ->get()->toArray();

        $kos = $this->createDetailTemplateMap($data[0]);

        // dd($data);

        return view('dashboard.client.detail-kos', compact('data', 'kos'));
    }

    public function createDetailTemplateMap($kos)
    {
        return ['coordinate' => [
            'latitude' => (float)$kos->latitude,
            'longitude' => (float)$kos->longitude
        ], 'template' => "<div class='maps-item'>
        <h1>{$kos->nama_kos}</h1>
        <div id='bodyContent'>
            <p class='lokasi'>{$kos->alamat}</p>
            <p class='tipe'>Tipe : kos {$kos->tipe}</p>
            <p class='deskripsi'>{$kos->deskripsi}</p>
            <a class='detail' href='/client/kos/{$kos->id}'>Detail Kos</a>
        </div>
    </div>"];
    }

    public function createTemplateItemMaps($kos)
    {
        return ['coordinate' => [
            'latitude' => (float)$kos->latitude,
            'longitude' => (float)$kos->longitude
        ], 'template' => "<div class='maps-item'>
        <h1>{$kos->judul}</h1>
        <div id='bodyContent'>
            <p class='lokasi'>{$kos->lokasi}</p>
            <p class='tipe'>Tipe : kos {$kos->tipe}</p>
            <p class='deskripsi'>{$kos->deskripsi}</p>
            <a class='detail' href='/client/kos/{$kos->id}'>Detail Kos</a>
        </div>
    </div>"];
    }
}
