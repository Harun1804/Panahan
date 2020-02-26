<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Pelatih;
use App\Model\Pelatihan_detail;

class PelatihanController extends Controller
{
    function index()
    {
        $d = [
            'pelatih'       => Pelatih::all(),
        ];
        return view('admin/pelatihan/index',$d);
    }

    function pelatih($id = "")
    {
        $pelatih    = Pelatihan_detail::where('id_pelatih',$id)->get();
        if($id = ""){
            $this->index();
        }else{
            $no = 1;
            foreach($pelatih as $plt){
                echo '<tr>
                    <td>'.$no++.'</td>
                    <td>'.$plt->nama_member.'</td>
                    <td>'.$plt->jml_latihan.'</td>
                    <td>
                    <form method="post" action="'.url('/admin/pembayaran').'">
                    '.csrf_field().'
                    <input type="hidden" name="id_member" value="'.$plt->id_member.'">
                    <input type="hidden" name="nowa" value="'.$plt->nowa_member.'">
                    <button class="btn btn-success d-inline" type="submit">Pembayaran</button>
                    </form>
                    </td>
                    </tr>
                ';
            }
        }
    }
}
