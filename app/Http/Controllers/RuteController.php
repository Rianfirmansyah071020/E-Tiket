<?php

namespace App\Http\Controllers;

use App\Models\Rute;
use App\Models\Admin;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RuteController extends Controller
{

    public function index(){

        $User = Auth::user();
        $idlUser = Admin::all()->where('email', $User->email)->value('id');
        $userLogin = Admin::find($idlUser);
        $jumlahPemesanan = Pemesanan::all()->count();


        return view('admin.rute.index', [
            'title' => 'Rute | E-tiket',
            'route' => 'Dashboard / Rute ',
            'userLogin' => $userLogin,
            'data' => Rute::all(),
            'pemesanan' => Pemesanan::all()->where('status', 'belum'),
            'jumlahPemesanan' => Pemesanan::all()->where('status', 'belum')->count()
        ]);
    }


    public function create(Request $request) {

        $validasi = $request->validate([
            'awal' => 'required',
            'tujuan' => 'required'
        ]);

        $rute = Rute::create([
            'awal' => $request->awal,
            'tujuan' => $request->tujuan,
        ]);


        if($rute) {

          return  redirect('/admin/dashboard/kelolarute')->with('success', 'Data rute berhasil ditambahkan');
        }else {
            return  redirect('/admin/dashboard/kelolarute')->with('success', 'Data rute gagal ditambahkan');
        }
    }


    public function delete($id) {

        $rute = Rute::find($id);

        $rute = $rute->delete();

        if($rute) {

            return  redirect('/admin/dashboard/kelolarute')->with('success', 'Data rute berhasil dihapus');
          }else {
              return  redirect('/admin/dashboard/kelolarute')->with('success', 'Data rute gagal dihapus');
          }
    }



    public function update($id){

        $User = Auth::user();
        $idlUser = Admin::all()->where('email', $User->email)->value('id');
        $userLogin = Admin::find($idlUser);
        $jumlahPemesanan = Pemesanan::all()->count();


        return view('admin.rute.update', [
            'title' => 'Rute | E-tiket',
            'route' => 'Dashboard / Rute / Update',
            'userLogin' => $userLogin,
            'data' => Rute::find($id),
            'pemesanan' => Pemesanan::all()->where('status', 'belum'),
            'jumlahPemesanan' => Pemesanan::all()->where('status', 'belum')->count()
        ]);
    }


    public function update_aksi(Request $request, $id) {

        $validasi = $request->validate([
            'awal' => 'required',
            'tujuan' => 'required'
        ]);

        $dataRute = Rute::find($id);

        $rute = $dataRute->update([
            'awal' => $request->awal,
            'tujuan' => $request->tujuan
        ]);


        if($rute) {

            return  redirect('/admin/dashboard/kelolarute')->with('success', 'Data rute berhasil di update');
          }else {
              return  redirect('/admin/dashboard/kelolarute')->with('success', 'Data rute gagal di update');
          }
    }
}