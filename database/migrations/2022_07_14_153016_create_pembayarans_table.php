<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pemesanan_id')->nullable()->constrained('pemesanans')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('users_id')->nullable()->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('kos_id')->nullable()->constrained('kos')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('status_id')->nullable()->constrained('statuses')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('bukti_pembayaran')->nullable();
            $table->integer('expired_at')->nullable();
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
        Schema::dropIfExists('pembayarans');
    }
}
