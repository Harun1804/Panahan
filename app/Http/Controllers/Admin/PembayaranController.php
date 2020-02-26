<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Detail_pembayaran;
use App\Model\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function belumbayar()
    {
        $d = [
            'pembayaran' => Detail_pembayaran::all()
        ];
        return view('admin/pembayaran/belumbayar',$d);
    }
    public function menunggu()
    {
        $d = [
            'pembayaran' => Detail_pembayaran::all()
        ];
        return view('admin/pembayaran/menunggu',$d);
    }
    public function sudahbayar()
    {
        $d = [
            'pembayaran' => Detail_pembayaran::all()
        ];
        return view('admin/pembayaran/sudahbayar',$d);
    }

    public function store(Request $request)
    {
        $nowa = $request->nowa;
        Pembayaran::create([
            'id_pembayaran' => $request->id_pembayaran,
            'id_member'     => $request->id_member
        ]);
        $this->notif_pembayaran($nowa);
        return redirect('/admin/pembayaran/belumbayar')->with('status', 'Data Berhasil Masuk');
    }

    public function update(Request $request, Pembayaran $pembayaran)
    {
        $this->notif_pembayaran_selesai($request->nowa);
        Pembayaran::where('id_pembayaran',$pembayaran->id_pembayaran)->update([
            'status_pembayaran' => 2
        ]);
        return redirect('/admin/pembayaran/sudahbayar')->with('status', 'Notifikasi Berhasil Dikirim');
    }

    private function notif_pembayaran($nowa)
    {
        $my_apikey = "P7XGI24R9X2QW36LQR08";
        $message = "Ayo Selesaikan Pembayaranmu, Agar Bisa Melanjutkan Latihan";
        $api_url = "http://panel.rapiwha.com/send_message.php";
        $api_url .= "?apikey=" . urlencode($my_apikey);
        $api_url .= "&number=" . urlencode($nowa);
        $api_url .= "&text=" . urlencode($message);
        $my_result_object = json_decode(file_get_contents($api_url, false));
    }

    function notif_pembayaran_kembali(Request $request)
    {
        $my_apikey = "P7XGI24R9X2QW36LQR08";
        $message = "Ayo Selesaikan Pembayaranmu, Agar Bisa Melanjutkan Latihan";
        $api_url = "http://panel.rapiwha.com/send_message.php";
        $api_url .= "?apikey=" . urlencode($my_apikey);
        $api_url .= "&number=" . urlencode($request->nowa);
        $api_url .= "&text=" . urlencode($message);
        $my_result_object = json_decode(file_get_contents($api_url, false));
        return redirect('/admin/pembayaran/belumbayar')->with('status', 'Notifikasi Berhasil Dikirim');
    }

    private function notif_pembayaran_selesai($nowa)
    {
        $my_apikey = "P7XGI24R9X2QW36LQR08";
        $message = "Terima Kasih Telah Melakukan Pembayaran";
        $api_url = "http://panel.rapiwha.com/send_message.php";
        $api_url .= "?apikey=" . urlencode($my_apikey);
        $api_url .= "&number=" . urlencode($nowa);
        $api_url .= "&text=" . urlencode($message);
        $my_result_object = json_decode(file_get_contents($api_url, false));
    }
}
