<?php

namespace App\Http\Controllers;

use App\Models\Harga;
use App\Models\Jadwal;
use App\Models\Kursi;
use App\Models\Pelanggan;
use App\Models\Pembayaran;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PelangganPemesananController extends Controller
{


    public function index(){

        $User = Auth::user();
        $idlUser = Pelanggan::all()->where('email', $User->email)->value('id');
        $userLogin = Pelanggan::find($idlUser);


        return view('pelanggan.pemesanan.index', [
            'title' => 'Pemesanan | E-tiket',
            'route' => 'Dashboard / Pemesanan ',
            'userLogin' => $userLogin,
            'kursi' => Kursi::all(),
            'jadwal' => Jadwal::all(),
            'harga' => Harga::all(),
            'pemesanan' => Pemesanan::all()->where('pelanggan_id', $idlUser),
        ]);
    }


    public function create(Request $request) {

        $validasi = $request->validate([
            'pelanggan_id' => 'required',
            'kursi_id' => 'required',
            'jadwal_id' => 'required',
            'harga_id' => 'required',
            'tanggal_berangkat' => 'required',
            'jumlah' => 'required',
        ]);

        $dataHarga = Harga::all()->where('id', $request->harga_id)->value('harga');

        $total  = $dataHarga * $request->jumlah;

        $User = Auth::user();
        $idlUser = Pelanggan::all()->where('email', $User->email)->value('id');
        $userLogin = Pelanggan::find($idlUser);

        $pesanTiket = Pemesanan::create([
            'pelanggan_id' => $idlUser,
            'kursi_id' => $request->kursi_id,
            'jadwal_id' => $request->jadwal_id,
            'harga_id' => $request->harga_id,
            'tanggal_berangkat' => $request->tanggal_berangkat,
            'jumlah' => $request->jumlah,
            'total' => $total
        ]);


        if($pesanTiket) {
            return redirect('/pelanggan/dashboard/kelolapemesanan')->with('success','Pemesanan Tiket Berhasil');
        }else {
            return redirect('/pelanggan/dashboard/kelolapemesanan')->with('success','Pemesanan Tiket Gagal');
        }

    }


    public function update($id){

        $User = Auth::user();
        $idlUser = Pelanggan::all()->where('email', $User->email)->value('id');
        $userLogin = Pelanggan::find($idlUser);


        return view('pelanggan.pemesanan.update', [
            'title' => 'Pemesanan | E-tiket',
            'route' => 'Dashboard / Pemesanan / Update Pemesanan',
            'userLogin' => $userLogin,
            'kursi' => Kursi::all(),
            'jadwal' => Jadwal::all(),
            'harga' => Harga::all(),
            'pemesanan' => Pemesanan::find($id)
        ]);
    }


    public function update_aksi(Request $request, $id) {


        $validasi = $request->validate([
            'pelanggan_id' => 'required',
            'kursi_id' => 'required',
            'jadwal_id' => 'required',
            'harga_id' => 'required',
            'tanggal_berangkat' => 'required',
            'jumlah' => 'required',
        ]);

        $dataHarga = Harga::all()->where('id', $request->harga_id)->value('harga');

        $total  = $dataHarga * $request->jumlah;

        $User = Auth::user();
        $idlUser = Pelanggan::all()->where('email', $User->email)->value('id');
        $userLogin = Pelanggan::find($idlUser);

        $updateTiket = Pemesanan::find($id)->update([
            'pelanggan_id' => $idlUser,
            'kursi_id' => $request->kursi_id,
            'jadwal_id' => $request->jadwal_id,
            'harga_id' => $request->harga_id,
            'tanggal_berangkat' => $request->tanggal_berangkat,
            'jumlah' => $request->jumlah,
            'total' => $total
        ]);

        if($updateTiket) {
            return redirect('/pelanggan/dashboard/kelolapemesanan')->with('success','Update pemesanan tiket berhasil');
        }else {
            return redirect('/pelanggan/dashboard/kelolapemesanan')->with('success','Update pemesanan tiket gagal');
        }
    }


    public function batal($id) {

        $batal = Pemesanan::find($id)->delete();

        if($batal) {
            return redirect('/pelanggan/dashboard/kelolapemesanan')->with('success','Pemesanan berhasil di batalkan');
        }else {
            return redirect('/pelanggan/dashboard/kelolapemesanan')->with('success','Pemesanan berhasil di batalkan');
        }

    }
}