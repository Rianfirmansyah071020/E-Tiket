<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PelangganDashboardController extends Controller
{

    public function index(){

        $User = Auth::user();
        $idlUser = Pelanggan::all()->where('email', $User->email)->value('id');
        $userLogin = Pelanggan::find($idlUser);

        $jumlahPemesanan = DB::table('pemesanans')->where('pelanggan_id', $idlUser)->count();
        $jumlahPembayaran = DB::table('pembayarans')->where('pelanggan_id', $idlUser)->count();

        return view('pelanggan.dashboard.index', [
            'title' => 'Dashboard | E-tiket',
            'route' => 'Dashboard ',
            'userLogin' => $userLogin,
            'jumlahPemesanan' => $jumlahPemesanan,
            'jumlahPembayaran' => $jumlahPembayaran
        ]);
    }
}
