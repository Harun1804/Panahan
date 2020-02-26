@extends('layouts/admin')
@section('judulhalaman','Halaman Tambah Pengguna')
@section('menu','Pengguna')
@section('submenu','Tambah Pengguna')
@section('isi')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Form Tambah Pengguna</h5>
            <div class="card-body">
                <form action="{{url('/admin/pengguna')}}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{$id}}">
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Nama Pengguna</label>
                        <input id="inputText3" type="text" class="form-control @error('nama') is-invalid @enderror"
                            name="nama" value="{{old('nama')}}">
                        @error('nama')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">No Wa</label>
                        <input id="inputText3" type="text" class="form-control @error('nowa') is-invalid @enderror"
                            name="nowa" value="+62{{old('nowa')}}">
                        @error('nowa')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Username</label>
                        <input id="inputText3" type="text" class="form-control @error('username') is-invalid @enderror"
                            name="username" value="{{old('username')}}">
                        @error('username')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="inputText3" class="col-form-label">Password</label>
                                <input id="inputText3" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    placeholder="Password" value="{{old('password')}}">
                                @error('password')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="inputText3" class="col-form-label">Ulangi Password</label>
                                <input id="inputText3" type="password"
                                    class="form-control @error('password1') is-invalid @enderror" name="password1"
                                    placeholder="Ulangi Password" value="{{old('password1')}}">
                                @error('password1')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input-select">Hak Akses</label>
                        <select class="form-control" id="input-select" name="hak_akses">
                            <option disabled="" selected="">Pilih Hak Akses</option>
                            <option value="0">Admin</option>
                            <option value="1">Pelatih</option>
                            <option value="2">Member</option>
                        </select>
                        @error('hak_akses')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success btn-sm">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
