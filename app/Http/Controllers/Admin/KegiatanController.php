<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function index()
    {
        $k['kegiatan'] = Kegiatan::all();
        return view('admin/kegiatan/akandatang', $k);
    }

    public function berlangsung()
    {
        $k['kegiatan'] = Kegiatan::all();
        return view('admin/kegiatan/berlangsung', $k);
    }

    public function selesai()
    {
        $k['kegiatan'] = Kegiatan::all();
        return view('admin/kegiatan/selesai', $k);
    }

    public function show(Kegiatan $kegiatan)
    {
        Kegiatan::where('id_kegiatan', $kegiatan->id_kegiatan)->update([
            'status_kegiatan'   => 1
        ]);
        return redirect('/admin/kegiatan/berlangsung')->with('status', 'Kegiatan Sedang Berlangsung');
    }

    public function kegiatanselesai(Kegiatan $kegiatan)
    {
        Kegiatan::where('id_kegiatan', $kegiatan->id_kegiatan)->update([
            'status_kegiatan'   => 2
        ]);
        return redirect('/admin/kegiatan/selesai')->with('status', 'Kegiatan Telah Selesai');
    }

    public function create()
    {
        return view('admin/kegiatan/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'flyer' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'petunjuk' => 'required|file|mimes:pdf|max:2048',
            'tkegiatan' => 'required'
        ]);
        $flyer = $request->file('flyer');
        $petunjuk = $request->file('petunjuk');
        $namaflyer = $flyer->getClientOriginalName();
        $namapetunjuk = $petunjuk->getClientOriginalName();
        $folder_flyer = 'lte/assets/images/flyer';
        $folder_petunjuk = storage_path('app/public/Petunjuk');
        $flyer->move($folder_flyer, $namaflyer);
        $petunjuk->move($folder_petunjuk, $namapetunjuk);
        $kegiatan = Kegiatan::create([
            'nama_kegiatan'     => $request->nama,
            'flyer'             => $namaflyer,
            'petunjuk'          => $namapetunjuk,
            'tanggal_kegiatan'  => $request->tkegiatan,
            'status_kegiatan'   => 0
        ]);
        return redirect('/admin/kegiatan')->with('status', 'Data Berhasil Masuk');
    }

    public function edit(Kegiatan $kegiatan)
    {
        return view('admin/kegiatan/edit', compact('kegiatan'));
    }

    public function update(Request $request, Kegiatan $kegiatan)
    {
        $request->validate([
            'nama' => 'required',
            'flyer' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'petunjuk' => 'required|file|mimes:pdf|max:2048',
            'tkegiatan' => 'required'
        ]);
        if ($request->file('flyer') && $request->file('petunjuk')) {
            unlink('lte/assets/images/flyer/' . $kegiatan->flyer);
            unlink('lte/assets/petunjuk/' . $kegiatan->petunjuk);
        }
        $flyer = $request->file('flyer');
        $petunjuk = $request->file('petunjuk');
        $namaflyer = $flyer->getClientOriginalName();
        $namapetunjuk = $petunjuk->getClientOriginalName();
        $folder_flyer = 'lte/assets/images/flyer';
        $folder_petunjuk = 'lte/assets/petunjuk';
        $flyer->move($folder_flyer, $namaflyer);
        $petunjuk->move($folder_petunjuk, $namapetunjuk);
        Kegiatan::where('id_kegiatan', $kegiatan->id_kegiatan)->update([
            'nama_kegiatan'     => $request->nama,
            'flyer'             => $namaflyer,
            'petunjuk'          => $namapetunjuk,
            'tanggal_kegiatan'  => $request->tkegiatan,
            'status_kegiatan'   => 0
        ]);
        return redirect('/admin/kegiatan')->with('status', 'Data Berhasil Diubah');
    }

    public function destroy(Kegiatan $kegiatan)
    {
        Kegiatan::destroy($kegiatan->id_kegiatan);
        unlink('lte/assets/images/flyer/' . $kegiatan->flyer);
        unlink('lte/assets/petunjuk/' . $kegiatan->petunjuk);
        return redirect('/admin/kegiatan')->with('status', 'Data Berhasil Dihapus');
    }
}
