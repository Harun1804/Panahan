@extends('layouts/admin')
@section('judulhalaman','Halaman Pembayaran')
@section('menu','Pembayaran')
@section('submenu','Sudah Melakukan Pembayaran')
@section('isi')
<div class="row">
    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Sudah Melakukan Pembayaran</h5>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Member</th>
                                <th>Bukti Pembayaran</th>
                                <th>Tanggal Pembayaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pembayaran as $p)
                            @if($p->status_pembayaran == 2)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$p->nama_member}}</td>
                                <td><img src="{{url('lte/assets/images/pembayaran/'.$p->bukti_pembayaran)}}" height="50px" width="50px"></td>
                                <td>{{$p->tgl_bayar}}</td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nama Kegiatan</th>
                                <th>Flyer</th>
                                <th>Petunjuk</th>
                                <th>Tanggal Kegiatan</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
