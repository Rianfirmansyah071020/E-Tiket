<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kapal extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'kapasitas', 'gambar'
    ];

   public function kursi() {
    return $this->hasMany(Kursi::class, 'kapal_id');
   }
}