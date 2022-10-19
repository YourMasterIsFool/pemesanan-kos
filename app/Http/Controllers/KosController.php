<?php

namespace App\Http\Controllers;

use App\Http\Requests\Kos\EditKosRequest;
use App\Http\Requests\Kos\TambahKosRequest;
use App\Models\FotoKos;
use App\Models\Kos;
use App\Models\PemilikKos;
use App\Models\TipeKos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class KosController extends Controller
{
    public function kosAdminView()
    {
        $kos = DB::table('pemilik_kos')
            ->join('kos', 'pemilik_kos.kos_id', '=', 'kos.id')
            ->join('users', 'pemilik_kos.user_id', '=', 'users.id')
            ->join('tipe_kos', 'pemilik_kos.tipe_kos_id', '=', 'tipe_kos.id')
            ->select('kos.id', 'users.nama as nama_pemilik', 'tipe_kos.tipe', 'kos.nama_kos', 'kos.jumlah_kamar', 'kos.kamar_kosong', 'kos.fasilitas', 'kos.alamat')
            ->get()->toArray();

        return view('dashboard.admin.Kos.index-admin', compact('kos'));
    }

    public function kosAdminMapView(){
        $data = DB::table('pemilik_kos')
            ->join('kos', 'pemilik_kos.kos_id', '=', 'kos.id')
            ->join('users', 'pemilik_kos.user_id', '=', 'users.id')
            ->select('kos.id', 'kos.nama_kos as judul', 'kos.alamat as lokasi', 'kos.deskripsi', 'kos.latitude', 'kos.longitude')
            ->get()->toArray();

        $kos = [];

        foreach ($data as $dataKos => $value) {
            array_push($kos, $this->createTemplateItemMaps($value));
        }

        return view('dashboard.admin.Kos.admin-kos-view', compact('kos'));
    }

    public function index(Request $request)
    {
        $kos = DB::table('pemilik_kos')
            ->join('kos', 'pemilik_kos.kos_id', '=', 'kos.id')
            ->join('users', 'pemilik_kos.user_id', '=', 'users.id')
            ->join('tipe_kos', 'pemilik_kos.tipe_kos_id', '=', 'tipe_kos.id')
            ->select('kos.id', 'tipe_kos.tipe', 'kos.nama_kos', 'kos.jumlah_kamar', 'kos.kamar_kosong', 'kos.fasilitas', 'kos.alamat')
            ->where('users.id', '=', $request->user()->id)
            ->get()->toArray();

        

        return view('dashboard.admin.Kos.index', compact('kos'));
    }

    public function viewKosMap(Request $request)
    {
        $data = DB::table('pemilik_kos')
            ->join('kos', 'pemilik_kos.kos_id', '=', 'kos.id')
            ->join('users', 'pemilik_kos.user_id', '=', 'users.id')
            ->select('kos.id', 'kos.nama_kos as judul', 'kos.alamat as lokasi', 'kos.deskripsi', 'kos.latitude', 'kos.longitude')
            ->where('users.id', '=', $request->user()->id)
            ->get()->toArray();

        $kos = [];

        foreach ($data as $dataKos => $value) {
            array_push($kos, $this->createTemplateItemMaps($value));
        }

        return view('dashboard.admin.Kos.kos-view', compact('kos'));
    }


    public function createView()
    {
        $tipe_kos = TipeKos::all();
        return view('dashboard.admin.Kos.create', compact('tipe_kos'));
    }


    public function save(TambahKosRequest $request)
    {
        $validated = $request->validated();

        $kos_baru = Kos::create([
            'nama_kos' => $request->nama,
            'alamat' => $request->alamat,
            'fasilitas' => $request->fasilitas,
            'nomor_telepon' => $request->nomor_telepon,
            'harga_sewa' => $request->harga_sewa,
            'deskripsi' => $request->deskripsi,
            'jumlah_kamar' => $request->jumlah_kamar,
            'kamar_kosong' => $request->jumlah_kamar,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude
        ]);

        $fileName = $request->foto->getClientOriginalName();
        $path_foto_kos = public_path() . "/kos";
        $request->foto->move($path_foto_kos, $fileName);

        FotoKos::create([
            'foto' => $fileName,
            'kos_id' => $kos_baru->id
        ]);

        PemilikKos::create([
            'user_id' => $request->user()->id,
            'kos_id' => $kos_baru->id,
            'tipe_kos_id' => $request->tipe_kos
        ]);

        Alert::success('info', 'Kos berhasil ditambahkan');
        return redirect()->route('dashboard.kos.index');
    }


    public function editView($id)
    {
        $kos = Kos::find($id);

        return view('dashboard.admin.Kos.edit', compact('kos'));
    }


    public function editSave(EditKosRequest $request, $id)
    {
        $validated = $request->validated();

        $kos = Kos::find($id);

        $kos_update = $kos->update([
            'nama_kos' => $request->nama,
            'alamat' => $request->alamat,
            'fasilitas' => $request->fasilitas,
            'nomor_telepon' => $request->nomor_telepon,
            'harga_sewa' => $request->harga_sewa,
            'deskripsi' => $request->deskripsi,
            'jumlah_kamar' => $request->jumlah_kamar,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude
        ]);

        Alert::success('info', 'Kos berhasil diupdate');
        return redirect()->route('dashboard.kos.index');
    }


    public function delete($id)
    {
        $kos = Kos::find($id);

        $kos->delete();

        Alert::success('info', 'Kos berhasil dihapus');
        return redirect()->route('dashboard.kos.index');
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
            <p class='deskripsi'>{$kos->deskripsi}</p>
        </div>
    </div>"];
    }
}
