@extends('layouts/pelatih')
@section('judulhalaman','Halaman Penilaian')
@section('menu','Murid')
@section('submenu','Penilaian Murid')
@section('isi')
<div class="row">
    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <button type="button" class="btn btn-info btn-sm my-2" data-toggle="modal" data-target="#exampleModal">Tambah
            Penilaian</button>
        <div class="card">
            <h5 class="card-header">Riwayat Latihan</h5>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tanggal Latihan</th>
                                <th>Jarak Tambak</th>
                                <th>Skor</th>
                                <th>Bulan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pelatihan as $plth)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$plth->tgl_latihan}}</td>
                                <td>{{$plth->jarak_tembak}}</td>
                                <td>{{$plth->skor}}</td>
                                <td>{{$plth->bulan}}</td>
                            </tr>
                            @endforeach
                        </tbody>
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
                <h5 class="modal-title" id="exampleModalLabel">Berikan Penilaian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('/pelatih/murid')}}" method="POST">
                    @csrf
                    <input type="hidden" name="id_member" value="{{$id_member}}">
                    <input type="hidden" name="id_pelatihan" value="{{$id_pelatihan}}">
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
