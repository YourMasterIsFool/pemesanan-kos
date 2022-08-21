<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pemesanan_id')->nullable()->constrained('pemesanans')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('users_id')->nullable()->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('status_id')->nullable()->constrained('statuses')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('kode_booking')->nullable();
            $table->string('nomor_kamar')->nullable();
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
        Schema::dropIfExists('bookings');
    }
}
