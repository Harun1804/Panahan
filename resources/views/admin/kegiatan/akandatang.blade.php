@extends('layouts/admin')
@section('judulhalaman','Halaman Kegiatan Akan Datang')
@section('menu','Kegiatan')
{{-- @section('submenu','Dashboard') --}}
@section('isi')
<div class="row">
    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <a href="{{url('/admin/kegiatan/create')}}" class="btn btn-info btn-sm text-light my-2">Tambah Kegiatan</a>
        <div class="card">
            <h5 class="card-header">Kegiatan Akan Datang</h5>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first">
                        <thead>
                            <tr>
                                <th>Nama Kegiatan</th>
                                <th>Flyer</th>
                                <th>Petunjuk</th>
                                <th>Tanggal Kegiatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kegiatan as $a)
                            @if($a->status_kegiatan == 0)
                            <tr>
                                <td>{{$a->nama_kegiatan}}</td>
                                <td><img src="{{url('lte/assets/images/flyer/'.$a->flyer)}}" height="50px" width="50px"></td>
                                <td>{{$a->petunjuk}}</td>
                                <td>{{$a->tanggal_kegiatan}}</td>
                                <td>
                                    <a href="{{url('/admin/kegiatan/'.$a->id_kegiatan.'/edit')}}" class="btn btn-warning btn-sm text-light">Edit</a>
                                    <form method="POST" action="{{url('admin/kegiatan/'.$a->id_kegiatan)}}" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return alert('Yakin Menghapus Data Kegiatan {{$a->nama_kegiatan}}')">Hapus</button>
                                    </form>
                                    <a href="{{url('admin/kegiatan/'.$a->id_kegiatan)}}" class="btn btn-success btn-sm text-white">Aktifkan</a>
                                </td>
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
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
