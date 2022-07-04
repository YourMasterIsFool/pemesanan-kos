<?php

namespace App\Http\Controllers;

use Faker\Provider\Lorem;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $data = [
            [
                'id' => 1,
                'judul' => 'Kos 1',
                'deskripsi' => Lorem::paragraphs(1, true),
                'lokasi' => 'Dusun Ploserojo, Desa Kaliploso, RT 02/ RQ 03, Kecamatan CLuring',
                'gambar' => 'https://firebasestorage.googleapis.com/v0/b/firestore-33f9a.appspot.com/o/5f96aecd62a38.jpg?alt=media&token=3691416f-ec27-49b2-9ae2-e3e7de6b8890',
                'latitude' => '-8.457945839895618',
                'longitude' => '114.26094528743843'

            ],
            [
                'id' => 2,
                'judul' => 'Kos 2',
                'deskripsi' => Lorem::paragraphs(1, true),
                'lokasi' => 'Dusun Ploserojo, Desa Kaliploso, RT 02/ RQ 03, Kecamatan CLuring',
                'gambar' => 'https://firebasestorage.googleapis.com/v0/b/firestore-33f9a.appspot.com/o/5f96aecd62a38.jpg?alt=media&token=3691416f-ec27-49b2-9ae2-e3e7de6b8890',
                'latitude' => '-8.452841759701709',
                'longitude' => '114.25934679398766'
            ],
            [
                'id' => 3,
                'judul' => 'Kos 3',
                'deskripsi' => Lorem::paragraphs(1, true),
                'lokasi' => 'Dusun Ploserojo, Desa Kaliploso, RT 02/ RQ 03, Kecamatan CLuring',
                'gambar' => 'https://firebasestorage.googleapis.com/v0/b/firestore-33f9a.appspot.com/o/5f96aecd62a38.jpg?alt=media&token=3691416f-ec27-49b2-9ae2-e3e7de6b8890',
                'latitude' => '-8.460315682363948',
                'longitude' => '114.25701017118978'
            ]
        ];

        $kos = [];

        foreach ($data as $dataKos => $value) {
            array_push($kos, $this->createTemplateItemMaps($value));
        }


        return view('dashboard.client.search', compact('kos'));
    }

    public function createTemplateItemMaps($kos)
    {
        return ['coordinate' => [
            'latitude' => (float)$kos['latitude'],
            'longitude' => (float)$kos['longitude']
        ], 'template' => "<div class='maps-item'>
        <h1>{$kos['judul']}</h1>
        <div id='bodyContent'>
            <p class='lokasi'>{$kos['lokasi']}</p>
            <p class='deskripsi'>{$kos['deskripsi']}</p>
            <a class='detail' target='_blank' href='/heay/{$kos['id']}'>Detail Kos</a>
        </div>
    </div>"];
    }
}
