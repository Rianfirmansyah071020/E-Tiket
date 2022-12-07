<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Kapal;
use App\Models\Kursi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KapalController extends Controller
{

    public function index(){

        $User = Auth::user();
        $idlUser = Admin::all()->where('email', $User->email)->value('id');
        $userLogin = Admin::find($idlUser);


        return view('admin.kapal.index', [
            'title' => 'Kapal | E-tiket',
            'route' => 'Dashboard / Kapal ',
            'userLogin' => $userLogin,
            'data' => Kapal::all()
        ]);
    }


    public function create(Request $request) {

        $validasi = $request->validate([
            'nama' => 'required',
            'kapasitas' => 'required|numeric',
            'gambar' => 'required|mimes:png,jpg,jpeg'
        ]);

        $fileGambar = $request->file('gambar');
        $fileGambar->storeAs('/public/kapal/' , $fileGambar->hashName());

        $kapal = Kapal::create([
            'nama' => $request->nama,
            'kapasitas' => $request->kapasitas,
            'gambar' => $fileGambar->hashName(),
        ]);

        if($kapal) {
            return redirect('/admin/dashboard/kelolakapal')->with('success', 'Data kapal berhasil ditambahkan');
        }else {
            return redirect('/admin/dashboard/kelolakapal')->with('success', 'Data kapal gagal ditambahkan');
        }
    }



    public function delete($id) {

        $dataKapal = Kapal::find($id);
        $idKursi = Kursi::all()->where('kapal_id', $id)->value('id');
        $dataKursi = Kursi::find($idKursi);

        Storage::delete('/public/kapal' . $dataKapal->gambar);

        $deleteKapal = $dataKapal->delete();

        if($dataKursi) {
            $deleteKursi = $dataKursi->delete();
        }


        if($deleteKapal) {
            return redirect('/admin/dashboard/kelolakapal')->with('success', 'Data kapal berhasil dihapus');
        }else {
            return redirect('/admin/dashboard/kelolakapal')->with('success', 'Data kapal gagal dihapus');
        }
    }


    public function detail($id) {

        $User = Auth::user();
        $idlUser = Admin::all()->where('email', $User->email)->value('id');
        $userLogin = Admin::find($idlUser);


        return view('admin.kapal.detail', [
            'title' => 'Kapal | E-tiket',
            'route' => 'Dashboard / Kapal / Detail ',
            'userLogin' => $userLogin,
            'data' => Kapal::find($id)
        ]);
    }


    public function update($id) {

        $User = Auth::user();
        $idlUser = Admin::all()->where('email', $User->email)->value('id');
        $userLogin = Admin::find($idlUser);


        return view('admin.kapal.update', [
            'title' => 'Kapal | E-tiket',
            'route' => 'Dashboard / Kapal / Update ',
            'userLogin' => $userLogin,
            'data' => Kapal::find($id)
        ]);
    }


    public function update_aksi(Request $request, $id) {

        $dataKapal = Kapal::find($id);

        $validasi = $request->validate([
            'nama' => 'required',
            'kapasitas' => 'required|numeric',
            'gambar' => 'mimes:png,jpg,jpeg'
        ]);

        if($request->file('gambar')) {

            Storage::delete('/public/kapal/' . $dataKapal->gambar);
            $fileGambar = $request->file('gambar');
            $fileGambar->storeAs('/public/kapal/' , $fileGambar->hashName());

            $gambar = $fileGambar->hashName();

        }else {
            $gambar = $dataKapal->gambar;
        }

        $kapal = $dataKapal->update([
            'nama' => $request->nama,
            'kapasitas' => $request->kapasitas,
            'gambar' => $gambar,
        ]);

        if($kapal) {
            return redirect('/admin/dashboard/kelolakapal')->with('success', 'Data kapal berhasil di update');
        }else {
            return redirect('/admin/dashboard/kelolakapal')->with('success', 'Data kapal gagal di update');
        }
    }
}