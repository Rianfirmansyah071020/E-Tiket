<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'pemesanan_id','pelanggan_id', 'transaksi_id','status_pesan','status_transaksi','tipe_payment','waktu','total', 'pdf_url'
    ];

    public function pemesanan() {
        return $this->belongsTo(Pemesanan::class);
    }
}