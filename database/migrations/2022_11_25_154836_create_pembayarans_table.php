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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pemesanan_id');
            $table->foreignId('pelanggan_id');
            $table->string('transaksi_id');
            $table->string('status_pesan');
            $table->string('status_transaksi');
            $table->string('tipe_payment');
            $table->date('waktu');
            $table->string('pdf_url')->nullable();
            $table->number('total');
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
};