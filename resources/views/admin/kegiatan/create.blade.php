@extends('layouts/admin')
@section('judulhalaman','Halaman Tambah Kegiatan')
@section('menu','Kegiatan')
@section('submenu','Tambah Kegiatan')
@section('isi')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Form Tambah Kegiatan</h5>
            <div class="card-body">
                <form action="{{url('/admin/kegiatan')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{-- <input type="hidden" name="id" value="{{$id}}"> --}}
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Nama Kegiatan</label>
                        <input id="inputText3" type="text" class="form-control @error('nama') is-invalid @enderror"
                            name="nama" value="{{old('nama')}}">
                        @error('nama')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="custom-file mb-3">
                        <input type="file" class="custom-file-input @error('flyer') is-invalid @enderror"
                            id="customFile" name="flyer">
                        <label class="custom-file-label" for="customFile">Flyer</label>
                        @error('flyer')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="custom-file mb-3">
                        <input type="file" class="custom-file-input @error('petunjuk') is-invalid @enderror"
                            id="customFile" name="petunjuk">
                        <label class="custom-file-label" for="customFile">Petunjuk</label>
                        @error('petunjuk')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Tanggal Kegiatan</label>
                        <input id="inputText3" type="date" class="form-control @error('tkegiatan') is-invalid @enderror"
                            name="tkegiatan" value="{{old('tkegiatan')}}">
                        @error('tkegiatan')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success btn-sm">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
</script>
@endsection
