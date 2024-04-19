<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    {{-- Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    {{-- FontaAwesome --}}
    <link rel="stylesheet" href="{{ asset('fontawesome/css/font-awesome.min.css') }}">

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Toastr -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <title>Document</title>

    <style>
        body {
            font-family: 'Poppins', 'sans-serif';
            background-image: url('{{ asset('gambar/mh2.png') }}');
            background-size: cover;
            background-position: center;
        }

        .box-area {
            width: 930px;
        }

        /*------------ Right box ------------*/
        .right-box {
            padding: 40px 30px 40px 40px;
        }

        /*------------ Custom Placeholder ------------*/
        ::placeholder {
            font-size: 16px;
        }

        .rounded-4 {
            border-radius: 20px;
        }

        .rounded-5 {
            border-radius: 30px;
        }

        /*------------ For small screens------------*/
        @media only screen and (max-width: 768px) {
            .box-area {
                margin: 0 10px;
            }

            .left-box {
                height: 200px;
                overflow: hidden;
            }

            .right-box {
                padding: 20px;
            }

            .gambar {
                width: 100px;
                margin-bottom: 0;
                margin-top: 10px;
            }

            img {
                margin-top: 10px
            }

            p {
                margin: 0
            }

            small {
                margin-bottom: 10px
            }
        }
    </style>
</head>

<body>
    <!----------------------- Main Container -------------------------->
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <!----------------------- Login Container -------------------------->
        <div class="row border rounded-5 p-3 bg-white shadow box-area">
            <!--------------------------- Left Box ----------------------------->
            <div
                class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box bg-success">
                <div class="featured-image mb-3 gambar">
                    <img src="{{ asset('gambar/icon.png') }}" class="img-fluid rounded-3 " style="width: 150px; " loading="lazy">
                </div>
                <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">
                    Login Siswa</p>
                <small class="text-white text-wrap text-center"
                    style="width: 17rem;font-family: 'Courier New', Courier, monospace;">Ini Adalah Aplikasi Pembayaran
                    Siswa MTS MH </small>
            </div>
            <!-------------------- ------ Right Box ---------------------------->
            <div class="col-md-6 right-box">
                <form action="/siswa_masuk" method="post">
                    @csrf
                    <div class="row align-items-center">
                        <div class="header-text mb-4">
                            <?php
                            $jam = date('H:i');
                            $sambutan = '';
                            
                            if ($jam >= '05:00' && $jam <= '10:00') {
                                $sambutan = 'Selamat Pagi';
                            } elseif ($jam >= '10:01' && $jam <= '14:59') {
                                $sambutan = 'Selamat Siang';
                            } elseif ($jam >= '15:00' && $jam <= '18:59') {
                                $sambutan = 'Selamat Sore';
                            } else {
                                $sambutan = 'Selamat Malam';
                            }
                            ?>
                            <h2>Hello <?php echo $sambutan; ?></h2>
                            <p>Semoga Hari Mu Menyenangkan</p>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg bg-light fs-6" name="nama_lengkap"
                                id="nama_lengkap" required placeholder="Nama Lengkap">
                            @error('nama_lengkap')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="input-group  mb-5">
                            <input type="password" class="form-control form-control-lg bg-light fs-6" name="password"
                                id="password" required placeholder="NIS">
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <button type="submit" class="btn btn-lg btn-success w-100 fs-6">Login</button>
                    </div>
                </form>
                <div class="input-group mb-3">
                    <button class="btn btn-lg btn-light w-100 fs-6">
                        <a href="/" style="text-decoration: none">
                            <small style="color: black"><i class=" fa fa-reply"></i> Kembali</small>
                        </a>
                    </button>
                </div>
            </div>
        </div>
    </div>
    </div>

</body>

<link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


@yield('toastr')
@if (session()->has('harus'))
    <script type="text/javascript">
        toastr.error('{{ session('harus') }}')
    </script>
@endif

@if (session()->has('success_loguot'))
    <script type="text/javascript">
        toastr.success('{{ session('success_loguot') }}')
    </script>
@endif

</html>
