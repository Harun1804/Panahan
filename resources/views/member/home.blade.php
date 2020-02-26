@extends('layouts/member')
@section('judulhalaman','Halaman Dashboard Member')
@section('menu','Dashboard')
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
                @foreach ($pembayaran as $p)
                @if($p->status_pembayaran == 0 && $p->id_member)
                <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#exampleModal">Pembayaran</button>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Halaman Pembayaran</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{url('/member/'.$p->id_pembayaran)}}" method="POST" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                    <div class="custom-file mb-3">
                                        <input type="file"
                                            class="custom-file-input @error('bbayar') is-invalid @enderror"
                                            id="customFile" name="bbayar">
                                        <label class="custom-file-label" for="customFile">Bukti Pembayaran</label>
                                        @error('bbayar')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Kirim</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Grafik</h5>
            <div class="card-body">
                <div class="ct-chart ct-golden-section" style="height: 354px;"></div>
                <div class="text-center">
                    <span class="legend-item mr-2">
                        <span class="fa-xs text-primary mr-1 legend-tile"><i class="fa fa-fw fa-square-full"></i></span>
                        <span class="legend-text">Perkembangan Latihan</span>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Kegiatan</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nama Kegiatan</th>
                                <th>Flyer</th>
                                <th>Petunjuk</th>
                                <th>Tanggal Kegiatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kegiatan as $a)
                            @if($a->status_kegiatan == 0 || $a->status_kegiatan == 1)
                            <tr>
                                <td>{{$a->nama_kegiatan}}</td>
                                <td><img src="{{url('lte/assets/images/flyer/'.$a->flyer)}}" height="50px" width="50px">
                                </td>
                                <td> <a href="{{url('/member/download/'.$a->petunjuk)}}" class="btn btn-info"><i
                                            class="icon-download-alt"> </i> Unduh Petunjuk</a></td>
                                <td>{{$a->tanggal_kegiatan}}</td>
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
<?php foreach ($pelatihan as $plt):
    $tgl[] = $plt->tgl_latihan;
    $skor[] = $plt->skor;
endforeach ?>
<script src="{{asset('lte/assets/vendor/charts/chartist-bundle/chartist.min.js')}}"></script>
<script>
    var chart = new Chartist.Line('.ct-chart', {
        labels: <?= json_encode($tgl);?>,
        series: [
            <?= json_encode($skor);?>
        ]
    }, {
        low: 0,
        showArea: true,
        showPoint: false,
        fullWidth: true
    });

    chart.on('draw', function (data) {
        if (data.type === 'line' || data.type === 'area') {
            data.element.animate({
                d: {
                    begin: 2000 * data.index,
                    dur: 2000,
                    from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height())
                        .stringify(),
                    to: data.path.clone().stringify(),
                    easing: Chartist.Svg.Easing.easeOutQuint
                }
            });
        }
    });
</script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
</script>
@endsection
