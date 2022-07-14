<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $STATUS_PEMESANAN_PESAN = 1;
    private $STATUS_PEMESANAN_BATAL = 2;
    private $STATUS_PEMESANAN_BOOKING = 3;
    private $STATUS_PEMESANAN_SELESAI = 4;
    private $STATUS_PEMBAYARAN_MENUNGGU_PEMBAYARAN = 5;
    private $STATUS_PEMBAYARAN_MENUNGGU_KONFIRMASI = 6;
    private $STATUS_PEMBAYARAN_TERKONFIRMASI = 7;

    
    public function run()
    {

        // Pemesanan
        Status::create([
            'tipe' => 'Pemesanan',
            'status' => 'Pesan'
        ]);

        Status::create([
            'tipe' => 'Pemesanan',
            'status' => 'Batal'
        ]);

        Status::create([
            'tipe' => 'Pemesanan',
            'status' => 'Booking'
        ]);

        Status::create([
            'tipe' => 'Pemesanan',
            'status' => 'Selesai'
        ]);


        // Pembayaran
        Status::create([
            'tipe' => 'Pembayaran',
            'status' => 'Menunggu Pembayaran'
        ]);

        Status::create([
            'tipe' => 'Pembayaran',
            'status' => 'Menunggu Konfirmasi'
        ]);

        Status::create([
            'tipe' => 'Pembayaran',
            'status' => 'Pembayaran Terkonfirmasi'
        ]);
    }
}
