<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Jadwal;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{

    public function index(){

        $User = Auth::user();
        $idlUser = Admin::all()->where('email', $User->email)->value('id');
        $userLogin = Admin::find($idlUser);
        $jumlahPemesanan = Pemesanan::all()->count();


        return view('admin.jadwal.index', [
            'title' => 'Jadwal | E-tiket',
            'route' => 'Dashboard / Jadwal ',
            'userLogin' => $userLogin,
            'data' => Jadwal::all(),
            'pemesanan' => Pemesanan::all()->where('status', 'belum'),
            'jumlahPemesanan' => Pemesanan::all()->where('status', 'belum')->count()
        ]);
    }


    public function create(Request $request) {

        $validasi = $request->validate([
            'waktu' => 'required',
        ]);

        $jadwal = Jadwal::create([
            'waktu' => $request->waktu,
        ]);


        if($jadwal) {

          return  redirect('/admin/dashboard/kelolajadwal')->with('success', 'Data jadwal berhasil ditambahkan');
        }else {
            return  redirect('/admin/dashboard/kelolajadwal')->with('success', 'Data jadwal gagal ditambahkan');
        }
    }


    public function delete($id) {

        $jadwal = Jadwal::find($id);

        $jadwal = $jadwal->delete();

        if($jadwal) {

            return  redirect('/admin/dashboard/kelolajadwal')->with('success', 'Data jadwal berhasil dihapus');
          }else {
              return  redirect('/admin/dashboard/kelolajadwal')->with('success', 'Data jadwal gagal dihapus');
          }
    }



    public function update($id){

        $User = Auth::user();
        $idlUser = Admin::all()->where('email', $User->email)->value('id');
        $userLogin = Admin::find($idlUser);
        $jumlahPemesanan = Pemesanan::all()->count();

        return view('admin.jadwal.update', [
            'title' => 'Jadwal | E-tiket',
            'route' => 'Dashboard / Jadwal ',
            'userLogin' => $userLogin,
            'data' => Jadwal::find($id),
            'pemesanan' => Pemesanan::all()->where('status', 'belum'),
            'jumlahPemesanan' => Pemesanan::all()->where('status', 'belum')->count()
        ]);
    }



    public function update_aksi(Request $request ,$id) {

        $validasi = $request->validate([
            'waktu' => 'required',
        ]);

        $dataJadwal = Jadwal::find($id);

        $jadwal = $dataJadwal->update([
            'waktu' => $request->waktu,
        ]);


        if($jadwal) {

            return  redirect('/admin/dashboard/kelolajadwal')->with('success', 'Data jadwal berhasil di update');
          }else {
              return  redirect('/admin/dashboard/kelolajadwal')->with('success', 'Data jadwal gagal di update');
          }
    }

}