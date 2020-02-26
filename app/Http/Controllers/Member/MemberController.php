<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Model\Kegiatan;
use App\Model\Pelatihan;
use App\Model\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    function index()
    {
        $akun   = Auth::guard('web')->user()->id_member;
        $d      = [
            'pelatihan' => Pelatihan::where('id_member',$akun)->get(),
            'pembayaran'=> Pembayaran::where(['id_member'=>$akun,'status_pembayaran'=>0])->get(),
            'kegiatan'  => Kegiatan::all(),
        ];
        return view('member/home',$d);
    }

    function update(Request $request,Pembayaran $pembayaran)
    {
        $request->validate([
            'bbayar' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $bukti          = $request->file('bbayar');
        $namafile       = $bukti->getClientOriginalName();
        $folder_bayar   = 'lte/assets/images/pembayaran';
        $bukti->move($folder_bayar, $namafile);
        Pembayaran::where('id_pembayaran',$pembayaran->id_pembayaran)->update([
            'bukti_pembayaran'  => $namafile,
            'tgl_bayar'         => date('Y-m-d'),
            'status_pembayaran' => 1,
        ]);
        return redirect('/member')->with('status', 'Menunggu Konfirmasi Admin');
    }

    function download($petunjuk)
    {
        return response()->download(storage_path("app/public/Petunjuk/".$petunjuk));
    }
}
