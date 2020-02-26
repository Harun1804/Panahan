<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Akun_pengguna;
use App\Model\Detail_pengguna;
use App\Model\Pengguna;
use App\Model\Admin;
use App\Model\Pelatih;
use App\Model\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenggunaController extends Controller
{
    public function index_admin()
    {
        $a['admin'] = Detail_pengguna::all();
        return view('admin/pengguna/admin', $a);
    }

    public function index_pelatih()
    {
        $a['pelatih'] = Detail_pengguna::all();
        return view('admin/pengguna/pelatih', $a);
    }

    public function index_member()
    {
        $a['member'] = Detail_pengguna::all();
        return view('admin/pengguna/member', $a);
    }

    private function maxIDPengguna()
    {
        $q = DB::table('akun_pengguna')->select(DB::raw('MAX(RIGHT(id_pengguna,3)) as kd_max'));
        if ($q->count() != 0) {
            foreach ($q->get() as $k) {
                $tmp = intval($k->kd_max) + 1;
                $kodemax = str_pad($tmp, 3, "0", STR_PAD_LEFT);
                $kd = "USER" . $kodemax;
            }
        } else {
            $kd = "USER001";
        }
        return $kd;
    }

    private function maxIDAdmin()
    {
        $q = DB::table('admin')->select(DB::raw('MAX(RIGHT(id_admin,3)) as kd_max'));
        if ($q->count() != 0) {
            foreach ($q->get() as $k) {
                $tmp = intval($k->kd_max) + 1;
                $kodemax = str_pad($tmp, 3, "0", STR_PAD_LEFT);
                $kd = "ADM" . $kodemax;
            }
        } else {
            $kd = "ADM001";
        }
        return $kd;
    }

    private function maxIDPelatih()
    {
        $q = DB::table('pelatih')->select(DB::raw('MAX(RIGHT(id_pelatih,3)) as kd_max'));
        if ($q->count() != 0) {
            foreach ($q->get() as $k) {
                $tmp = intval($k->kd_max) + 1;
                $kodemax = str_pad($tmp, 3, "0", STR_PAD_LEFT);
                $kd = "PLT" . $kodemax;
            }
        } else {
            $kd = "PLT001";
        }
        return $kd;
    }

    private function maxIDMember()
    {
        $q = DB::table('member')->select(DB::raw('MAX(RIGHT(id_member,3)) as kd_max'));
        if ($q->count() != 0) {
            foreach ($q->get() as $k) {
                $tmp = intval($k->kd_max) + 1;
                $kodemax = str_pad($tmp, 3, "0", STR_PAD_LEFT);
                $kd = "MBR" . $kodemax;
            }
        } else {
            $kd = "MBR001";
        }
        return $kd;
    }

    public function create()
    {
        $i['id'] = $this->maxIDPengguna();
        return view('admin/pengguna/create', $i);
    }

    public function store(Request $request)
    {
        $request->validate([
            'username'  => 'required',
            'password'  => 'required|same:password1',
            'password1'  => 'required|same:password',
            'hak_akses' => 'required',
            'nama'      => 'required',
            'nowa'      => 'required'
        ]);
        Pengguna::create([
            'id_pengguna' => $request->id,
            'username' => $request->username,
            'password' => password_hash($request->password, PASSWORD_BCRYPT),
            'hak_akses' => $request->hak_akses
        ]);
        //$order->id_pengguna();
        if ($request->hak_akses == 0) {
            Admin::create([
                'id_admin' => $this->maxIDAdmin(),
                'id_pengguna' => $request->id,
                'nama_admin' => $request->nama,
                'nowa_admin' => $request->nowa
            ]);
            return redirect('/admin/pengguna/admin')->with('status', 'Data Berhasil Masuk');
        } elseif ($request->hak_akses == 1) {
            Pelatih::create([
                'id_pelatih' => $this->maxIDPelatih(),
                'id_pengguna' => $request->id,
                'nama_pelatih' => $request->nama,
                'nowa_pelatih' => $request->nowa
            ]);
            return redirect('/admin/pengguna/pelatih')->with('status', 'Data Berhasil Masuk');
        } elseif ($request->hak_akses == 2) {
            Member::create([
                'id_member' => $this->maxIDMember(),
                'id_pengguna' => $request->id,
                'nama_member' => $request->nama,
                'nowa_member' => $request->nowa
            ]);
            return redirect('/admin/pengguna/member')->with('status', 'Data Berhasil Masuk');
        }
    }

    public function edit(Detail_pengguna $detail_pengguna)
    {
        return view('admin/pengguna/edit', compact('detail_pengguna'));
    }

    public function update(Request $request, Akun_pengguna $akun_pengguna)
    {
        $request->validate([
            'username'  => 'required',
            'password'  => 'required|same:password1',
            'password1'  => 'required|same:password',
            'hak_akses' => 'required',
            'nama'      => 'required'
        ]);
        Pengguna::where('id_pengguna', $akun_pengguna->id_pengguna)->update([
            'username' => $request->username,
            'password' => password_hash($request->password, PASSWORD_BCRYPT),
            'hak_akses' => $request->hak_akses
        ]);
        if ($request->hak_akses == 0) {
            Admin::where('id_pengguna', $akun_pengguna->id_pengguna)->update([
                'nama_admin' => $request->nama,
                'nowa_admin' => $request->nowa
            ]);
            return redirect('/admin/pengguna/admin')->with('status', 'Data Berhasil Diubah');
        } elseif ($request->hak_akses == 1) {
            Pelatih::where('id_pengguna', $akun_pengguna->id_pengguna)->update([
                'nama_pelatih' => $request->nama,
                'nowa_pelatih' => $request->nowa
            ]);
            return redirect('/admin/pengguna/pelatih')->with('status', 'Data Berhasil Diubah');
        } elseif ($request->hak_akses == 2) {
            Member::where('id_pengguna', $akun_pengguna->id_pengguna)->update([
                'nama_member' => $request->nama,
                'nowa_member' => $request->nowa
            ]);
            return redirect('/admin/pengguna/member')->with('status', 'Data Berhasil Diubah');
        }
    }

    public function destroy(Request $request)
    {
        Akun_pengguna::destroy($request->id_pengguna);
        return redirect('/admin')->with('status', 'Data Berhasil Dihapus');
    }
}
