<?php

namespace App\Http\Controllers;

use App\Models\Rute;
use App\Models\Admin;
use App\Models\Harga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HargaController extends Controller
{

    public function index(){

        $User = Auth::user();
        $idlUser = Admin::all()->where('email', $User->email)->value('id');
        $userLogin = Admin::find($idlUser);


        return view('admin.harga.index', [
            'title' => 'Harga | E-tiket',
            'route' => 'Dashboard / Harga ',
            'userLogin' => $userLogin,
            'rute' => Rute::all(),
            'data' => Harga::all()
        ]);
    }


    public function create(Request $request) {

        $validasi = $request->validate([
            'rute_id' => 'required',
            'tipe_kelas' => 'required',
            'tipe_penumpang' => 'required',
            'harga' => 'required',
        ]);


        $harga = Harga::create($validasi);

        if($harga) {
            return redirect('/admin/dashboard/kelolaharga')->with('success', 'Tambah data harga berhasil');
        }else {
            return redirect('/admin/dashboard/kelolaharga')->with('success', 'Tambah data harga gagal');
        }
    }


    public function delete($id) {

        $dataHarga = Harga::find($id);

        $harga = $dataHarga->delete();

        if($harga) {
            return redirect('/admin/dashboard/kelolaharga')->with('success', 'data harga berhasil dihapus');
        }else {
            return redirect('/admin/dashboard/kelolaharga')->with('success', 'data harga gagal dihapus');
        }
    }


    public function update($id){

        $User = Auth::user();
        $idlUser = Admin::all()->where('email', $User->email)->value('id');
        $userLogin = Admin::find($idlUser);


        return view('admin.harga.update', [
            'title' => 'Harga | E-tiket',
            'route' => 'Dashboard / Harga / Update',
            'userLogin' => $userLogin,
            'rute' => Rute::all(),
            'data' => Harga::find($id)
        ]);
    }


    public function update_aksi(Request $request, $id){

        $User = Auth::user();
        $idlUser = Admin::all()->where('email', $User->email)->value('id');
        $userLogin = Admin::find($idlUser);

        $validasi = $request->validate([
            'rute_id' => 'required',
            'tipe_kelas' => 'required',
            'tipe_penumpang' => 'required',
            'harga' => 'required',
        ]);

        $dataHarga = Harga::find($id);

        $harga = $dataHarga->update([
            'rute_id' => $request->rute_id,
            'tipe_kelas' => $request->tipe_kelas,
            'tipe_penumpang' => $request->tipe_penumpang,
            'harga' => $request->harga,
        ]);


        if($harga) {
            return redirect('/admin/dashboard/kelolaharga')->with('success', 'data harga berhasil di ubah');
        }else {
            return redirect('/admin/dashboard/kelolaharga')->with('success', 'data harga gagal di ubah');
        }
    }

}