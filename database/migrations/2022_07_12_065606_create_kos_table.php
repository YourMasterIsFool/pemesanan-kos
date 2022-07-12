<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kos', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kos')->nullable()->unique();
            $table->string('alamat')->nullable();
            $table->string('nomor_telepon')->nullable();
            $table->string('fasilitas')->nullable();
            $table->string('deskripsi')->nullable();
            $table->string('harga_sewa')->nullable();
            $table->string('jumlah_kamar')->nullable();
            $table->string('kamar_kosong')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kos');
    }
}
