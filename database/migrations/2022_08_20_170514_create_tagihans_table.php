<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagihansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tagihans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pembayaran_id')->nullable()->constrained('pembayarans')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('users_id')->nullable()->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('status_id')->nullable()->constrained('statuses')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('total')->nullable();
            $table->string('bukti')->nullable();
            $table->string('bulan')->nullable();
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
        Schema::dropIfExists('tagihans');
    }
}
