<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('lte/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link href="{{asset('lte/assets/vendor/fonts/circular-std/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('lte/assets/libs/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('lte/assets/vendor/fonts/fontawesome/css/fontawesome-all.css')}}">
    <link rel="stylesheet" href="{{asset('lte/assets/vendor/charts/chartist-bundle/chartist.css')}}">
    <link rel="stylesheet" href="{{asset('lte/assets/vendor/charts/morris-bundle/morris.css')}}">
    <link rel="stylesheet"
        href="{{asset('lte/assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('lte/assets/vendor/charts/c3charts/c3.css')}}">
    <link rel="stylesheet" href="{{asset('lte/assets/vendor/fonts/flag-icon-css/flag-icon.min.css')}}">
    <title>Aplikasi Panahan</title>
</head>

<body>
    <div class="dashboard-main-wrapper">
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="{{url('/admin')}}">Panahan</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                    src="{{asset('lte/assets/images/profil/default.png')}}" alt=""
                                    class="user-avatar-md rounded-circle" height="128" width="128"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown"
                                aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name">{{Auth::guard('web')->user()->username}}
                                    </h5>
                                </div>
                                <a class="dropdown-item" href="{{url('/logout')}}"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="{{url('/admin')}}">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{url('/admin')}}"><i
                                        class="fa fa-fw fa-home"></i>Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                    data-target="#submenu-2" aria-controls="submenu-2"><i
                                        class="fa fa-fw fa-user-circle"></i>Pengguna</a>
                                <div id="submenu-2" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                        <a class="nav-link" href="{{url('/admin/pengguna/admin')}}">Admin</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('/admin/pengguna/pelatih')}}">Pelatih</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('/admin/pengguna/member')}}">Member</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                    data-target="#submenu-3" aria-controls="submenu-3"><i
                                        class="fas fa-fw fa-money-bill-alt"></i>Pembayaran</a>
                                <div id="submenu-3" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('/admin/pembayaran/belumbayar')}}">Belum Membayar</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('/admin/pembayaran/menunggu')}}">Menunggu Persetujuan</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('/admin/pembayaran/sudahbayar')}}">Sudah Membayar</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                    data-target="#submenu-4" aria-controls="submenu-4"><i
                                        class="far fa-fw fa-calendar-check"></i>Kegiatan</a>
                                <div id="submenu-4" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('/admin/kegiatan')}}">Akan Datang</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('/admin/kegiatan/berlangsung')}}">Berlangsung</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('/admin/kegiatan/selesai')}}">Telah Lewat</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{url('/admin/pelatihan')}}"><i
                                        class="fa fa-fw fa-arrows-alt"></i>Pelatihan</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">@yield('judulhalaman')</h2>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#"
                                                    class="breadcrumb-link">@yield('menu')</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">@yield('submenu')
                                            </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    @yield('isi')
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            Copyright © 2019 Concept. All rights reserved. Dashboard by <a
                                href="https://colorlib.com/wp/">Colorlib</a>.
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <script src="{{asset('lte/assets/vendor/jquery/jquery-3.3.1.min.js')}}"></script>
    <!-- bootstap bundle js -->
    <script src="{{asset('lte/assets/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
    <!-- slimscroll js -->
    <script src="{{asset('lte/assets/vendor/slimscroll/jquery.slimscroll.js')}}"></script>
    <!-- main js -->
    <script src="{{asset('lte/assets/libs/js/main-js.js')}}"></script>
    <!-- chart chartist js -->
    <script src="{{asset('lte/assets/vendor/charts/chartist-bundle/chartist.min.js')}}"></script>
    <!-- sparkline js -->
    <script src="{{asset('lte/assets/vendor/charts/sparkline/jquery.sparkline.js')}}"></script>
    <!-- morris js -->
    <script src="{{asset('lte/assets/vendor/charts/morris-bundle/raphael.min.js')}}"></script>
    <script src="{{asset('lte/assets/vendor/charts/morris-bundle/morris.js')}}"></script>
    <!-- chart c3 js -->
    <script src="{{asset('lte/assets/vendor/charts/c3charts/c3.min.js')}}"></script>
    <script src="{{asset('lte/assets/vendor/charts/c3charts/d3-5.4.0.min.js')}}"></script>
    <script src="{{asset('lte/assets/vendor/charts/c3charts/C3chartjs.js')}}"></script>
    <script src="{{asset('lte/assets/libs/js/dashboard-ecommerce.js')}}"></script>
    <script src="{{asset('lte/assets/vendor/datatables/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('lte/assets/vendor/datatables/js/data-table.js')}}"></script>
    <script src="{{asset('lte/assets/vendor/datatables/js/dataTables.bootstrap4.min.js')}}"></script>
</body>

</html>
