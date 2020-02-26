@extends('layouts/admin')
@section('judulhalaman','Halaman Pelatihan')
@section('menu','Pelatihan')
{{-- @section('submenu','Dashboard') --}}
@section('isi')
<div class="row">
    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Cari Pelatih</h5>
            <div class="card-body">
                <form action="{{url('')}}" method="POST">
                    <input type="hidden" id="ajaxurlpelatih" value="{{url('/admin/pelatihan')}}">
                    @csrf
                    <div class="form-group">
                        <label for="pelatih">Pelatih</label>
                        <select class="form-control" id="pelatih" name="hak_akses" onchange="showPelatih()">
                            <option disabled="" selected="">Pilih Pelatih</option>
                            @foreach ($pelatih as $plt)
                            <option value="{{$plt->id_pelatih}}">{{$plt->nama_pelatih}}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Member</h5>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Member</th>
                                <th>Jumlah Latihan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="isitabel">
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Member</th>
                                <th>Jumlah Latihan</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
    function showPelatih() {
        var xhttp;
        xhttp = new XMLHttpRequest();
        var id_pelatih = document.getElementById("pelatih");
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("isitabel").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", document.getElementById("ajaxurlpelatih").value +"/"+ id_pelatih.options[id_pelatih.selectedIndex].value, true);
        xhttp.send();
    }
</script>
@endsection
