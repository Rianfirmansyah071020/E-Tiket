<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Kapal;
use App\Models\Kursi;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KursiController extends Controller
{
    //

    public function index() {

        $User = Auth::user();
        $idlUser = Admin::all()->where('email', $User->email)->value('id');
        $userLogin = Admin::find($idlUser);
        $jumlahPemesanan = Pemesanan::all()->count();

        return view('admin.kursi.index', [
            'title' => 'Kursi | E-tiket',
            'route' => 'Dashboard / Kursi',
            'data' => Kursi::all(),
            'userLogin' => $userLogin,
            'kapal' => Kapal::all(),
            'pemesanan' => Pemesanan::all()->where('status', 'belum'),
            'jumlahPemesanan' => Pemesanan::all()->where('status', 'belum')->count()
        ]);
    }


    public function create(Request $request) {

        $validasi = $request->validate([
            'kapal_id' => 'required',
            'nama_kursi' => 'required'
        ]);


        $kursi = Kursi::create($validasi);

        if($kursi) {
            return redirect('/admin/dashboard/kelolakursi')->with('success', 'Data kursi berhasil ditambahkan');
        }else {
            return redirect('/admin/dashboard/kelolakursi')->with('success', 'Data kursi gagal ditambahkan');
        }
    }


    public function delete($id) {

        $kursi = Kursi::find($id)->delete();

        if($kursi) {
            return redirect('/admin/dashboard/kelolakursi')->with('success', 'Data kursi berhasil dihapus');
        }else {
            return redirect('/admin/dashboard/kelolakursi')->with('success', 'Data kursi gagal dihapus');
        }
    }



    public function update($id) {

        $User = Auth::user();
        $idlUser = Admin::all()->where('email', $User->email)->value('id');
        $userLogin = Admin::find($idlUser);
        $jumlahPemesanan = Pemesanan::all()->count();

        return view('admin.kursi.update', [
            'title' => 'Kursi | E-tiket',
            'route' => 'Dashboard / Kursi / Update',
            'data' => Kursi::find($id),
            'userLogin' => $userLogin,
            'kapal' => Kapal::all(),
            'pemesanan' => Pemesanan::all()->where('status', 'belum'),
            'jumlahPemesanan' => Pemesanan::all()->where('status', 'belum')->count()
        ]);
    }



    public function update_aksi(Request $request, $id) {

        $validasi = $request->validate([
            'kapal_id' => 'required',
            'nama_kursi' => 'required'
        ]);

        $dataKursi = Kursi::find($id);

        $kursi = $dataKursi->update([
            'kapal_id' => $request->kapal_id,
            'nama_kursi' => $request->nama_kursi
        ]);

        if($kursi) {
            return redirect('/admin/dashboard/kelolakursi')->with('success', 'Data kursi berhasil di update');
        }else {
            return redirect('/admin/dashboard/kelolakursi')->with('success', 'Data kursi gagal di update');
        }

    }
}