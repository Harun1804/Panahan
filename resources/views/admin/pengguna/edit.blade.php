@extends('layouts/admin')
@section('judulhalaman','Halaman Edit Pengguna')
@section('menu','Pengguna')
@section('submenu','Edit Pengguna')
@section('isi')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Form Edit Pengguna</h5>
            <div class="card-body">
                <form action="{{url('/admin/pengguna/'.$detail_pengguna->id_pengguna)}}" method="POST">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Nama Pengguna</label>
                        <input id="inputText3" type="text" class="form-control @error('nama') is-invalid @enderror"
                        name="nama">
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
                        name="username" value="{{$detail_pengguna->username}}">
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
                                    placeholder="Password">
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
                                placeholder="Ulangi Password">
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
                            <option value="0" @if($detail_pengguna->hak_akses == 0)selected @endif>Admin</option>
                            <option value="1" @if($detail_pengguna->hak_akses == 1)selected @endif>Pelatih</option>
                            <option value="2" @if($detail_pengguna->hak_akses == 2)selected @endif>Member</option>
                        </select>
                        @error('hak_akses')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success btn-sm">Ubah</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
