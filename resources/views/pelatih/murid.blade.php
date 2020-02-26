@extends('layouts/pelatih')
@section('judulhalaman','Halaman Daftar Murid')
@section('menu','Murid')
@section('submenu','Daftar Murid')
@section('isi')
<div class="row">
    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <button type="button" class="btn btn-info btn-sm my-2" data-toggle="modal" data-target="#exampleModal">Tambah Murid</button>
        <div class="card">
            <h5 class="card-header">Daftar Murid Yang Dilatih</h5>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Murid</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pelatihan as $p)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$p->nama_member}}</td>
                                <td><a href="{{url('/pelatih/murid/'.$p->id_member)}}" class="btn btn-primary">Penilaian</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Nama Murid</th>
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
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Penilaian Murid baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('/pelatih/murid')}}" method="POST">
                    @csrf
                    <input type="hidden" name="id_pelatihan" value="{{$id_pelatihan}}">
                    <div class="form-group">
                        <label for="input-select">Member</label>
                        <select class="form-control" id="input-select" name="id_member">
                            <option disabled="" selected="">Pilih Member</option>
                            @foreach ($member as $m)
                            <option value="{{$m->id_member}}">{{$m->nama_member}}</option>
                            @endforeach
                        </select>
                        @error('id_member')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Tanggal Latihan</label>
                        <input id="inputText3" type="date" class="form-control @error('tlatihan') is-invalid @enderror"
                            name="tlatihan" value="{{old('tlatihan')}}">
                        @error('tlatihan')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Jarak Tembak</label>
                        <input id="inputText3" type="text" class="form-control @error('jtembak') is-invalid @enderror"
                            name="jtembak" value="{{old('jtembak')}}">
                        @error('jtembak')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Skor</label>
                        <input id="inputText3" type="text" class="form-control @error('skor') is-invalid @enderror"
                            name="skor" value="{{old('skor')}}">
                        @error('skor')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
