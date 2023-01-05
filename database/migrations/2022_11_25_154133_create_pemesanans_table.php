<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pelanggan_id');
            $table->foreignId('kapal_id');
            $table->foreignId('kursi_id');
            $table->foreignId('jadwal_id');
            $table->foreignId('harga_id');
            $table->date('tanggal_berangkat');
            $table->integer('jumlah');
            $table->integer('total');
            $table->string('status')->nullable();
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
        Schema::dropIfExists('pemesanans');
    }
};