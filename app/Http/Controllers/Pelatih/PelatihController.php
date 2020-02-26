<?php

namespace App\Http\Controllers\Pelatih;

use App\Http\Controllers\Controller;
use App\Model\Member;
use App\Model\Pelatihan;
use App\Model\Pelatihan_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PelatihController extends Controller
{
    public function index()
    {
        return view('pelatih/home');
    }

    public function murid()
    {
        $id = Auth::guard('web')->user()->id_pelatih;
        $d  = [
            'pelatihan'     => Pelatihan_detail::where('id_pelatih',$id)->get(),
            'id_pelatihan'  => $this->maxIDPelatihan(),
            'member'        => Member::all()
        ];
        return view('pelatih/murid',$d);
    }

    public function show($pelatihan)
    {
        $d = [
            'pelatihan'     => Pelatihan::where('id_member',$pelatihan)->get(),
            'id_member'     => $pelatihan,
            'id_pelatihan'  => $this->maxIDPelatihan(),
        ];
        return view('pelatih/penilaian',$d);
    }

    public function store(Request $request)
    {
        $request->validate([
            'tlatihan'  => 'required',
            'jtembak'   => 'required',
            'skor'      => 'required',
        ]);
        Pelatihan::create([
            'id_pelatihan'  => $request->id_pelatihan,
            'id_pelatih'    => Auth::guard('web')->user()->id_pelatih,
            'id_member'     => $request->id_member,
            'tgl_latihan'   => $request->tlatihan,
            'jarak_tembak'  => $request->jtembak,
            'skor'          => $request->skor,
            'bulan'         => date('m')
        ]);
        return redirect('/pelatih/murid')->with('status', 'Nilai Berhasil Ditambahkan');
    }

    private function maxIDPelatihan()
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
        return $kd;
    }
}
