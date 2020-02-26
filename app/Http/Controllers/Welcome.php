<?php

namespace App\Http\Controllers;

use App\Model\Akun_pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Welcome extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        if(Auth::attempt(['username' => $request->username, 'password' => $request->password, 'hak_akses' => 0])) {
            return redirect()->intended('/admin');
        }elseif(Auth::attempt(['username' => $request->username, 'password' => $request->password, 'hak_akses' => 1])) {
            return redirect()->intended('/pelatih');
        }elseif(Auth::attempt(['username' => $request->username, 'password' => $request->password, 'hak_akses' => 2])) {
            return redirect()->intended('/member');
        }else{
            return redirect('/')->with('pesan', 'Anda Tidak Punya Akses Kesini');
        }
    }

    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
        }
        return redirect('/');
    }
}
