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
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
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
                    <a href="/siswa/dashboard" class="nav-link">Home</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li> --}}
            </ul>

            <ul class="navbar-nav ml-auto">
                {{-- <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li> --}}

                @auth('siswa')
                    <li class="nav-item dropdown user-menu">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            <img src="{{ asset('post_image/' . auth('siswa')->user()->foto_siswa) }}"
                                class="user-image img-circle " alt="User Image" loading="lazy">
                            <span class="d-none d-md-inline">{{ auth('siswa')->user()->nama_lengkap }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <!-- User image -->
                            <li class="user-header bg-olive">
                                <img src="{{ asset('post_image/' . auth('siswa')->user()->foto_siswa) }}"
                                    class="img-circle " alt="User Image" loading="lazy">
                                <p>
                                    {{ auth('siswa')->user()->nama_lengkap }} - Aplikasi Pembayaran
                                    <small>Creating | January. 2024</small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer text-center">
                                <a href="/logout_siswa" class="btn btn-default btn-flat ">Sign out</a>
                            </li>
                        </ul>
                    </li>
                @endauth
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

        <aside class="main-sidebar sidebar-light-light elevation-4 btn-sm bg-olive">
            <a href="/siswa/dashboard" class="brand-link">
                <span class="brand-text font-weight-light">Dashboard</span>
            </a>

            <!-- SidebarSearch Form -->
            <div class="form-inline mt-2">
                <div class="input-group">
                    {{-- <input class="form-control form-control-sidebar " type="search" placeholder="Search"
                        aria-label="Search">
                    <div class="input-group-append ">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div> --}}

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->

                            {{-- Dashboard --}}
                            <li class="nav-item">
                                <a href="/siswa/dashboard" class="nav-link text-white">
                                    <i class="nav-icon fas fa-home"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>

<<<<<<< HEAD
                             {{-- Profile Siswa --}}
                             <li class="nav-item">
                                <a href="/siswa/profille/{{ auth('siswa')->user()->id }}" class="nav-link text-white">
                                    <i class="nav-icon fas fa-user"></i>
                                    <p>
                                        Profile
                                    </p>
                                </a>
                            </li>


                            {{-- Tagihan --}}
                            <li class="nav-item">
                                <a href="/siswa/tagihan/{{ auth('siswa')->user()->id }}" class="nav-link text-white">
=======
                            {{-- Tagihan --}}
                            <li class="nav-item">
                                <a href="/admin/pemsis" class="nav-link text-white">
>>>>>>> e4c92f785b194744eda4e7a05509a557e8fc9220
                                    <i class="nav-icon fas fa-credit-card"></i>
                                    <p>
                                        Tagihan
                                    </p>
                                </a>
                            </li>

<<<<<<< HEAD
                           
=======
                            {{-- Profile Siswa --}}
                            <li class="nav-item">
                                <a href="/siswa/dashboard" class="nav-link text-white">
                                    <i class="nav-icon fas fa-user"></i>
                                    <p>
                                        Profile
                                    </p>
                                </a>
                            </li>

>>>>>>> e4c92f785b194744eda4e7a05509a557e8fc9220
                            {{-- Tagihan
                            <li class="nav-item">
                                <a href="/siswa/dashboard" class="nav-link text-white">
                                    <i class="nav-icon fas fa-credit-card"></i>
                                    <p>
                                        Tagihan
                                    </p>
                                </a>
                            </li> --}}

                            {{-- Developer --}}
                            <li class="nav-item">
<<<<<<< HEAD
                                <a href="/siswa/developers" class="nav-link text-white">
=======
                                <a href="#" class="nav-link text-white">
>>>>>>> e4c92f785b194744eda4e7a05509a557e8fc9220
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        Developer
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </aside>

        <div class="content-wrapper style="background-color: rgb(228, 228, 228)"">
            <div class="content-header">
                @yield('developers_siswa')
<<<<<<< HEAD
                @yield('profille')
                @yield('tagihan')
=======
>>>>>>> e4c92f785b194744eda4e7a05509a557e8fc9220
            </div>
        </div>

        <footer class="main-footer bg-olive" style="height: 50px">
            <p>
                <strong>Copyright &copy; 2024 <a href="/siswa/developers" class=" text-navy">Developers</a>.</strong>
                All rights reserved.
            </p>
        </footer>

    </div>
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
        toastr.success('{{ session('success') }}')
    </script>
@endif

</html>
