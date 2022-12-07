<?php

namespace App\Http\Controllers;

use App\Models\Rute;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RuteController extends Controller
{

    public function index(){

        $User = Auth::user();
        $idlUser = Admin::all()->where('email', $User->email)->value('id');
        $userLogin = Admin::find($idlUser);


        return view('admin.rute.index', [
            'title' => 'Rute | E-tiket',
            'route' => 'Dashboard / Rute ',
            'userLogin' => $userLogin,
            'data' => Rute::all()
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


        return view('admin.rute.update', [
            'title' => 'Rute | E-tiket',
            'route' => 'Dashboard / Rute / Update',
            'userLogin' => $userLogin,
            'data' => Rute::find($id)
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