<?php

namespace App\Http\Controllers\Android;

use App\Http\Controllers\Controller;
use App\Model\Pelatihan;
use App\Model\Pelatihan_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AndroidController extends Controller
{
    public function login(Request $request)
    {
        if(Auth::attempt(['username' => $request->username, 'password' => $request->password, 'hak_akses' => 1])){
            $data = [
                'id_pengguna'   => Auth::guard('web')->user()->id_pengguna,
                'username'      => Auth::guard('web')->user()->username,
                'id_pelatih'    => Auth::guard('web')->user()->id_pelatih,
                'nama_pelatih'  => Auth::guard('web')->user()->nama_pelatih
            ];
            $res = [
                'status'    => "true",
                'message'   => "pelatih",
                'data'      => $data
            ];
            return response()->json($res, 200);
        }elseif(Auth::attempt(['username' => $request->username, 'password' => $request->password, 'hak_akses' => 2])){
            $data = [
                'id_pengguna'   => Auth::guard('web')->user()->id_pengguna,
                'username'      => Auth::guard('web')->user()->username,
                'id_member'     => Auth::guard('web')->user()->id_member,
                'nama_member'   => Auth::guard('web')->user()->nama_member
            ];
            $res = [
                'status'    => "true",
                'message'   => "member",
                'data'      => $data
            ];
            return response()->json($res, 200);
        }else{
            $res = [
                'status'    => "false",
                'message'   => "Anda Tidak Punya Akses"
            ];
            return response()->json($res, 500);
        }
    }

    public function anggota($id_pelatih)
    {
        $member = Pelatihan_detail::where('id_pelatih',$id_pelatih)->get();
        $res = [
            'status'    => "true",
            'message'   => "Data member",
            'data'      => $member
            ];
        return response()->json($res, 200);
    }

    public function maxIDPelatihan()
    {
        $q = DB::table('pelatihan')->select(DB::raw('MAX(RIGHT(id_pelatihan,3)) as kd_max'));
        if ($q->count() != 0) {
            foreach ($q->get() as $k) {
                $tmp = intval($k->kd_max) + 1;
                $kodemax = str_pad($tmp, 3, "0", STR_PAD_LEFT);
                $kd = "TRN" . $kodemax;
            }
        } else {
            $kd = "TRN001";
        }
        $res = [
            'status'    => "true",
            'message'   => "IDPelatihan",
            'data'      => $kd
            ];
        return response()->json($res, 200);
    }

    public function inputnilai(Request $request)
    {
        Pelatihan::create([
            'id_pelatihan'  => $request->id_pelatihan,
            'id_pelatih'    => $request->id_pelatih,
            'id_member'     => $request->id_member,
            'tgl_latihan'   => $request->tlatihan,
            'jarak_tembak'  => $request->jtembak,
            'skor'          => $request->skor,
            'bulan'         => date('m')
        ]);
        $res = [
            'status'    => "true",
            'message'   => "Data Berhasil Masuk",
            ];
        return response()->json(200);
    }
}
