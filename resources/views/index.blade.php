<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Bootstrap --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    {{-- Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap" rel="stylesheet">

    {{-- FontaAwesome --}}
    <link rel="stylesheet" href="{{ asset('fontawesome/css/font-awesome.min.css') }}">

    <title>MH | Aplikas Pembayaran Siswa</title>
    <link rel="icon" href="{{ asset('gambar/icon1.png') }}">
</head>

<style>
    * {
        font-family: 'Bree Serif', serif;
    }
</style>

<body class=" bg-success  text-white">
    <svg " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 193">
        <path fill="#1d6343" fill-opacity="1"
            d="M0,192L24,181.3C48,171,96,149,144,122.7C192,96,240,64,288,48C336,32,384,32,432,48C480,64,528,96,576,101.3C624,107,672,85,720,64C768,43,816,21,864,42.7C912,64,960,128,1008,149.3C1056,171,1104,149,1152,149.3C1200,149,1248,171,1296,154.7C1344,139,1392,85,1416,58.7L1440,32L1440,0L1416,0C1392,0,1344,0,1296,0C1248,0,1200,0,1152,0C1104,0,1056,0,1008,0C960,0,912,0,864,0C816,0,768,0,720,0C672,0,624,0,576,0C528,0,480,0,432,0C384,0,336,0,288,0C240,0,192,0,144,0C96,0,48,0,24,0L0,0Z">
        </path>
    </svg>
    <div class="text-center">
        <h3 class="mt-0">SELAMAT DATANG</h3>
        <h5>Di</h5>
        <p class=" m-4 mt-0">Aplikas Sistem Pembayaran Administrasi Sekolah</p>
        <div class="row m-4 mt-0 justify-content-center">
            {{-- Login Admin --}}
            <div class="col-sm-4">
                <div class="card mb-3">
                    <div class="btn btn-success">
                        <a href="/login_admin" class="text-white">
                            <i class=" fa fa-user m-2" style="font-size: 110px"></i>
                        </a>
                        <p style="font-family: 'Roboto', sans-serif;">Login Admin</p>
                    </div>
                </div>
            </div>
            {{-- Lihat Pembayaran Siswa --}}
            <div class="col-sm-4">
                <div class="card mb-3">
                    <div class="btn btn-success">
                        <a href="/login_siswa" class="text-white">
                            <i class=" fa fa-users m-2" style="font-size: 110px"></i>
                        </a>
                        <p style="font-family: 'Roboto', sans-serif;">Login Siswa</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#1d6343" fill-opacity="1"
            d="M0,192L24,202.7C48,213,96,235,144,213.3C192,192,240,128,288,85.3C336,43,384,21,432,58.7C480,96,528,192,576,218.7C624,245,672,203,720,176C768,149,816,139,864,160C912,181,960,235,1008,250.7C1056,267,1104,245,1152,245.3C1200,245,1248,267,1296,266.7C1344,267,1392,245,1416,234.7L1440,224L1440,320L1416,320C1392,320,1344,320,1296,320C1248,320,1200,320,1152,320C1104,320,1056,320,1008,320C960,320,912,320,864,320C816,320,768,320,720,320C672,320,624,320,576,320C528,320,480,320,432,320C384,320,336,320,288,320C240,320,192,320,144,320C96,320,48,320,24,320L0,320Z">
        </path>
    </svg>
</body>

</html>
