<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{


    public function index(){

        return view('login.login', [
            'title' => 'Login | E-tiket',
            'route' => 'login'
        ]);
    }

    public function autentikasi(Request $request) {

        $user = Auth::user();

        $validasi = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $level = User::all()->where('email', $request->email)->value('level');

        if(Auth::attempt($validasi)) {

            $request->session()->regenerate();

            if($level === 'admin') {
                return redirect()->intended('/admin/dashboard/');
            }

            if($level === 'pelanggan') {
                return redirect()->intended('/pelanggan/dashboard/');
            }
        }

        return redirect('/login');
    }
}