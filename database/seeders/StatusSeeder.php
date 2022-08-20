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

     
    private $STATUS_PEMESANAN_MASUK = 1;
    private $STATUS_PEMESANAN_BERHASIL = 2;
    private $STATUS_PEMESANAN_BATAL = 3;
    private $STATUS_PEMBAYARAN_MENUNGGU_PEMBAYARAN = 4;
    private $STATUS_PEMBAYARAN_MENUNGGU_KONFIRMASI_PEMBAYARAN = 5;
    private $STATUS_PEMBAYARAN_TERKONFIRMASI = 6;
    private $STATUS_PEMBAYARAN_DIBATALKAN = 7;
    private $STATUS_BOOOKING_BERLANGSUNG = 8;
    private $STATUS_BOOOKING_BERAKHIR = 9;


    
    public function run()
    {

        // Pemesanan
        Status::create([
            'tipe' => 'Pemesanan',
            'status' => 'Pesanan Masuk'
        ]);

        Status::create([
            'tipe' => 'Pemesanan',
            'status' => 'Pemesanan Berhasil'
        ]);

        Status::create([
            'tipe' => 'Pemesanan',
            'status' => 'Pemesanan Batal'
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

        Status::create([
            'tipe' => 'Pembayaran',
            'status' => 'Pembayaran Dibatalkan'
        ]);

        // Booking
        Status::create([
            'tipe' => 'Booking',
            'status' => 'Booking Berlangsung'
        ]);
        Status::create([
            'tipe' => 'Booking',
            'status' => 'Booking Berakhir'
        ]);
    }
}
