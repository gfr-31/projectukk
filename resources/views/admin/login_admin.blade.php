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

    {{-- FontaAwesome --}}
    <link rel="stylesheet" href="{{ asset('fontawesome/css/font-awesome.min.css') }}">

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Toastr -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <title>MH | Aplikas Pembayaran Siswa</title>
    <link rel="icon" href="{{ asset('gambar/icon1.png') }}">
<style>
    .cb {
        background: linear-gradient(to right bottom, rgba(255, 255, 255, 0.795), rgba(255, 255, 255, 0.795));
    }
</style>

<body class="bg-success"
    style=" height: 100%;background-attachment: fixed;background-size: cover;background-repeat: no-repeat;background-position: center;background-image: url({{ asset('gambar/mh.jpg') }})">
    <div>
        <div class="cb card col-lg-4 mx-auto mt-5"
            style="width:350px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="card-body">
                <div class="text-center">
                    <img src="{{ asset('gambar/icon.png') }}" alt="" width="25%" loading="lazy">
                    <p style="font-family: 'Bree Serif', serif;" class="mt-2 h4 mb-3">Login Admin</p>
                </div>
                <form action="/masuk" method="post">
                    @csrf
                    {{-- Email --}}
                    {{-- <div class="mx-3 mb-2">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email"
                            class="form-control @error('email') is-invalid @enderror" autofocus required
                            value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div> --}}
                    {{-- Username --}}
                    <div class="mx-3 mb-2">
                        <label for="name">Username</label>
                        <input type="text" name="name" id="email"
                            class="form-control @error('name') is-invalid @enderror" autofocus required
                            value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    {{-- Password --}}
                    <div class="mx-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <div class="d-grid gap-2 col-6 mx-auto mt-4">
                        <button name="submit" type="submit" class=" btn btn-success btn-sm"> Login</button>
                        <a href="/" class="btn btn-sm">
                            <i class=" fa fa-reply"></i> Kembali
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>

</body>


@if (session()->has('success'))
    <script type="text/javascript">
        toastr.success('{{ session('success') }}')
    </script>
@endif

@if (session()->has('loginError'))
    <script type="text/javascript">
        toastr.error('{{ session('loginError') }}')
    </script>
@endif

@if (session()->has('harus'))
    <script type="text/javascript">
        toastr.warning('{{ session('harus') }}')
    </script>
@endif

</html>
