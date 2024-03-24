<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MH | Aplikas Pembayaran Siswa</title>
    <link rel="icon" href="{{ asset('gambar/icon1.png') }}">
    {{-- LightBox --}}
    <link rel="stylesheet" href="{{ asset('lightbox/css/lightbox.min.css') }}">
    {{-- CKEditor --}}
    <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
    <!-- jQuery -->
    <script src="{{ asset('jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('lightbox/js/lightbox-plus-jquery.js') }}"></script>
    <!-- Toastr -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.css') }}">

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark bg-olive">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/admin/dashboard" class="nav-link">Home</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                @foreach ($admin as $a)
                    <li class="nav-item dropdown user-menu">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            <img src="{{ asset('gambar/icon.png') }}" class="user-image img-circle " alt="User Image">
                            <span class="d-none d-md-inline">{{ $a->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <!-- User image -->
                            <li class="user-header bg-olive">
                                <img src="{{ asset('gambar/icon.png') }}" alt="User Image">
                                @auth
                                    <p>
                                        {{ auth()->user()->name }} - Aplikasi Pembayaran
                                        <small>Creating | January. 2024</small>
                                    </p>
                                @endauth
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer text-center">
                                <a href="/logout" class="btn btn-default btn-flat ">Sign out</a>
                            </li>
                        </ul>
                    </li>
                @endforeach


                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#"
                        role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li> --}}
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-light elevation-4 btn-sm bg-olive">
            <!-- Brand Logo -->
            <a href="/admin/dashboard" class="brand-link">
                <span class="brand-text font-weight-light">Dashboard</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('gambar/icon.png') }}" class="img-circle" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">SMK BPM</a>
                    </div>

                </div> --}}

                <!-- SidebarSearch Form -->
                <div class="form-inline mt-2">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar " type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append ">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->

                        {{-- Dashboard --}}
                        {{-- <li class="nav-item">
                            <a href="/admin/dashboard" class="nav-link text-white">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li> --}}

                        {{-- Pembayaran --}}
                        <li class="nav-item">
                            <a href="/admin/pembayaran" class="nav-link text-white">
                                <i class="nav-icon fas fa-credit-card"></i>
                                <p>
                                    Pembayaran
                                </p>
                            </a>
                        </li>

                        {{-- Kirim Tagihan --}}
                        <li class="nav-item">
                            <a href="/admin/kirim-tagihan" class="nav-link text-white">
                                <i class=" nav-icon fas fa fa-whatsapp"></i>
                                <p>
                                    Kirim Tagihan
                                </p>
                            </a>
                        </li>

                        {{-- Data Keuangan --}}
                        <li class="nav-item">
                            <a href="" class="nav-link text-white ">
                                <i class="nav-icon fas fa-money"></i>
                                <p>
                                    Keuangan
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/admin/pos-keuangan" class="nav-link text-white ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p> POS Keuangan</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/admin/jenis-pembayaran" class="nav-link text-white ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p> Jenis Pembayaran</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        {{-- Data Jurnal Umum --}}
                        {{-- <li class="nav-item">
                            <a href="#" class="nav-link text-white ">
                                <i class="nav-icon fas fa-pencil-square-o"></i>
                                <p>
                                    Jurnal Umum
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/admin/pengeluaran" class="nav-link text-white ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Pengeluaran</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/admin/pemasukan" class="nav-link text-white ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Pemasukan</p>
                                    </a>
                                </li>
                            </ul>

                        </li> --}}
                        {{-- Master Data --}}
                        <li class="nav-item">
                            <a href="#" class="nav-link text-white ">
                                <i class="nav-icon fas fa-users "></i>
                                <p>
                                    Master Data
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/admin/tahun-ajaran" class="nav-link text-white ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tahun Ajaran</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/admin/kelas" class="nav-link text-white ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Kelas</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/admin/siswa" class="nav-link text-white ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Siswa</p>
                                    </a>
                                </li>
                            </ul>
                            {{-- <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="dashboard" class="nav-link text-white ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Kelulusan</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="dashboard" class="nav-link text-white ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Kenaikan Kelas</p>
                                    </a>
                                </li>
                            </ul>
                        </li> --}}
                            {{-- Data Laporan --}}
                        <li class="nav-item">
                            <a href="#" class="nav-link text-white ">
                                <i class="nav-icon fas fa-file-pdf"></i>
                                <p>
                                    Data Laporan
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="dashboard" class="nav-link text-white ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Laporan Keuangan</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        {{-- Data Informasi --}}
                        <li class="nav-item">
                            <a href="/admin/data" class="nav-link text-white ">
                                <i class="nav-icon fas fa-bullhorn"></i>
                                <p>
                                    Data Informasi
                                    <i class="right fas "></i>
                                </p>
                            </a>
                        </li>
                        {{-- Setting Aplikasi --}}
                        <li class="nav-item">
                            <a href="#" class="nav-link text-white ">
                                <i class="nav-icon fas fa-cog"></i>
                                <p>
                                    Setting Aplikasi
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            {{-- <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="dashboard" class="nav-link text-white ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Sekolah</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/admin/bulan" class="nav-link text-white ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Bulan</p>
                                    </a>
                                </li>
                            </ul> --}}
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/admin/developers" class="nav-link text-white ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Developers</p>
                                    </a>
                                </li>
                            </ul>
                        </li>


                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper style="background-color: rgb(228, 228, 228)"">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                @yield('content')
                @yield('pembayaran')
                @yield('kirimTagihan')
                @yield('posKeuangan')
                @yield('posPembayaran')
                @yield('tambahPosPembayaran')
                @yield('tarifPembayaranBulanan')
                @yield('tambahTarifPembayaranBulanan')
                @yield('tambahTarifPembayaranBulananSiswa')
                @yield('editTarifPembayaranBulanan')
                @yield('editTarifPembayaranBulananKelas')
                @yield('editTarifPembayaranBebas')
                @yield('editTarifPembayaranBebasKelas')
                @yield('tarifPembayaranBebas')
                @yield('tambahTarifPembayaranBebas')
                @yield('tambahTarifPembayaranBebasSiswa')
                @yield('tahunAjaran')
                @yield('tambahTahunAjaran')
                @yield('editTahunAjaran')
                @yield('kelas')
                @yield('siswa')
                @yield('tambahSiswa')
                @yield('editSiswa')
                @yield('dataInformasi')
                @yield('tambahInformasi')
                @yield('editInformasi')
                @yield('bulan')
                @yield('developers')
                <div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer bg-olive" style="height: 50px">
        <p>
            <strong>Copyright &copy; 2024 <a href="/admin/developers" class=" text-navy">Developers</a>.</strong>
            All rights reserved.
        </p>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    {{-- Select --}}
    <script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- jQuery -->
    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('adminlte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('adminlte/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('adminlte/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('adminlte/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('adminlte/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('adminlte/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminlte/dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    {{-- <script src="{{ asset('adminlte/dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('adminlte/dist/js/pages/dashboard.js') }}"></script> --}}
    <!-- BS Stepper -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/bs-stepper/js/bs-stepper.min.js') }}">
    <!-- jQuery -->

    <script src="{{ asset('adminlte/plugins/bs-stepper/js/bs-stepper.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/bs-stepper/css/bs-stepper.min.css') }}">

</body>

@yield('toastr')
@if (session()->has('success'))
    <script type="text/javascript">
        toastr.success('{{ session('success') }}', "", {
            "closeButton": true,
            "timeOut": 2500,
        });
    </script>
@endif


</html>
