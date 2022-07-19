<?php

namespace App\Http\Controllers;

use Faker\Provider\Lorem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function profileView()
    {
        return view('dashboard.client.profile');
    }

    public function bookingView()
    {
        return view('dashboard.client.daftar-booking');
    }

    public function pembayaranView()
    {
        return view('dashboard.client.pembayaran');
    }
    public function pemesananView()
    {
        return view('dashboard.client.pemesanan');
    }

    public function index()
    {
        $data =  DB::table('pemilik_kos')
            ->join('kos', 'pemilik_kos.kos_id', '=', 'kos.id')
            ->join('users', 'pemilik_kos.user_id', '=', 'users.id')
            ->join('tipe_kos', 'pemilik_kos.tipe_kos_id', '=', 'tipe_kos.id')
            ->select('kos.id', 'tipe_kos.tipe', 'kos.nama_kos as judul', 'kos.alamat as lokasi', 'kos.deskripsi', 'kos.latitude', 'kos.longitude')
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

        // dd($data);
        
        return view('dashboard.client.detail-kos', compact('data'));
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
