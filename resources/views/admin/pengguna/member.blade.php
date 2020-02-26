@extends('layouts/admin')
@section('judulhalaman','Halaman User Member')
@section('menu','Pengguna')
@section('submenu','User Member')
@section('isi')
<div class="row">
    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <a href="{{url('/admin/pengguna')}}" class="btn btn-info btn-sm text-light my-2">Tambah Pengguna</a>
        <div class="card">
            <h5 class="card-header">Akun Member</h5>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Nama</th>
                                <th>No Wa</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($member as $a)
                            @if($a->hak_akses == 2)
                            <tr>
                                <td>{{$a->username}}</td>
                                <td>{{$a->nama_member}}</td>
                                <td>{{$a->nowa_member}}</td>
                                <td>
                                    <a href="{{url('/admin/pengguna/edit/'.$a->id_pengguna)}}" class="btn btn-warning btn-sm text-light">Edit</a>
                                    <form method="POST" action="{{url('admin/pengguna/')}}" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <input type="hidden" name="id_pengguna" value="{{$a->id_pengguna}}">
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return alert('Yakin Menghapus Data User {{$a->username}}')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Username</th>
                                <th>Nama</th>
                                <th>No Wa</th>
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
