<?php
//Auth
Route::get('/', 'Welcome@index');
Route::post('/', 'Welcome@login');
Route::get('/logout', 'Welcome@logout');

//Home
//Admin
Route::get('/admin', function () {
    return view('admin/home');
})->middleware('auth:web');
//Pelatih
Route::get('/pelatih','Pelatih\PelatihController@index');
Route::get('/pelatih/murid','Pelatih\PelatihController@murid');
Route::get('/pelatih/murid/{Pelatihan}','Pelatih\PelatihController@show');
Route::post('/pelatih/murid','Pelatih\PelatihController@store');
//Member
Route::get('/member','Member\MemberController@index');
Route::get('/member/download/{petunjuk}','Member\MemberController@download');
Route::put('/member/{pembayaran}','Member\MemberController@update');

//Menu Admin
//Pengguna
Route::get('/admin/pengguna/admin', 'Admin\PenggunaController@index_admin');
Route::get('/admin/pengguna/pelatih', 'Admin\PenggunaController@index_pelatih');
Route::get('/admin/pengguna/member', 'Admin\PenggunaController@index_member');
Route::get('/admin/pengguna', 'Admin\PenggunaController@create');
Route::post('/admin/pengguna', 'Admin\PenggunaController@store');
Route::delete('/admin/pengguna/', 'Admin\PenggunaController@destroy');
Route::get('/admin/pengguna/edit/{detail_pengguna}', 'Admin\PenggunaController@edit');
Route::put('/admin/pengguna/{akun_pengguna}', 'Admin\PenggunaController@update');
//Kegiatan
Route::get('/admin/kegiatan/berlangsung','Admin\KegiatanController@berlangsung');
Route::get('/admin/kegiatan/berlangsung/{kegiatan}','Admin\KegiatanController@kegiatanselesai');
Route::get('/admin/kegiatan/selesai','Admin\KegiatanController@selesai');
Route::resource('/admin/kegiatan', 'Admin\KegiatanController');
//Pembayaran
Route::get('/admin/pembayaran/belumbayar','Admin\PembayaranController@belumbayar');
Route::get('/admin/pembayaran/menunggu','Admin\PembayaranController@menunggu');
Route::get('/admin/pembayaran/sudahbayar','Admin\PembayaranController@sudahbayar');
Route::post('/admin/pembayaran','Admin\PembayaranController@store');
Route::post('/admin/pembayaran/status','Admin\PembayaranController@notif_pembayaran_kembali');
Route::put('/admin/pembayaran/{pembayaran}','Admin\PembayaranController@update');
//Pelatihan
Route::get('/admin/pelatihan','Admin\PelatihanController@index');
Route::get('/admin/pelatihan/{id_pelatih}','Admin\PelatihanController@pelatih');
