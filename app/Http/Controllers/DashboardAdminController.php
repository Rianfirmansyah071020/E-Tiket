<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pelanggan;
use App\Models\Pembayaran;
use App\Models\Pemesanan;

class DashboardAdminController extends Controller
{

    public function index(){

        $User = Auth::user();
        $idlUser = Admin::all()->where('email', $User->email)->value('id');
        $userLogin = Admin::find($idlUser);

        $jumlahAdmin = Admin::all()->count();
        $jumlahPelanggan = Pelanggan::all()->count();
        $jumlahPemesanan = Pemesanan::all()->count();
        $jumlahTransaksi = Pembayaran::all()->sum('total');


        return view('admin.dashboard.index', [
            'title' => 'Dashboard | E-tiket',
            'route' => 'Dashboard ',
            'userLogin' => $userLogin,
            'jumlahAdmin' => $jumlahAdmin,
            'jumlahPelanggan' => $jumlahPelanggan,
            'jumlahPemesanan' => $jumlahPemesanan,
            'jumlahTransaksi' => $jumlahTransaksi,
        ]);
    }
}
