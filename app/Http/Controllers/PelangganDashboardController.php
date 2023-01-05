<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Pemesanan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PelangganDashboardController extends Controller
{

    public function index(){

        $User = Auth::user();
        $idlUser = Pelanggan::all()->where('email', $User->email)->value('id');
        $userLogin = Pelanggan::find($idlUser);

        $jumlahPemesanan = DB::table('pemesanans')->where('pelanggan_id', $idlUser)->where('status', 'belum')->count();
        $jumlahPembayaran = DB::table('pembayarans')->where('pelanggan_id', $idlUser)->count();

        $pemesanan = Pemesanan::all()->where('status', 'belum')->where('pelanggan_id', $idlUser);
        $pembayaran = Pembayaran::all()->where('pelanggan_id', $idlUser);

        return view('pelanggan.dashboard.index', [
            'title' => 'Dashboard | E-tiket',
            'route' => 'Dashboard ',
            'userLogin' => $userLogin,
            'jumlahPemesanan' => $jumlahPemesanan,
            'jumlahPembayaran' => $jumlahPembayaran,
            'pemesanan' => $pemesanan,
            'pembayaran' => $pembayaran,
        ]);
    }
}