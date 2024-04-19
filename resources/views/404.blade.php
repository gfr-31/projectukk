<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> 404 Page - Lost In Space | Nothing4us</title>
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> --}}
    <script src="{{ asset('jquery-3.7.1.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('style/404.css') }}">

</head>

<body>
    <!-- partial:index.partial.html -->

    <body class="bg-purple">

        <div class="stars">
            <div class="custom-navbar">
                {{-- <div class="brand-logo">
                    <img src="http://salehriaz.com/404Page/img/logo.svg" width="80px">
                </div> --}}
            
            </div>
            <div class="central-body">
                <img class="image-404" src="http://salehriaz.com/404Page/img/404.svg" width="300px" loading="lazy">
                <a onclick="goBack()" class="btn-go-home" target="_blank">GO BACK</a>
            </div>
            <div class="objects">
                <img class="object_rocket" src="http://salehriaz.com/404Page/img/rocket.svg" width="40px" loading="lazy">
                <div class="earth-moon">
                    <img class="object_earth" src="{{ asset('gambar/svg/earth.svg') }}" width="100px" loading="lazy">
                    <img class="object_moon" src="http://salehriaz.com/404Page/img/moon.svg" width="80px" loading="lazy">
                </div>
                <div class="box_astronaut">
                    <img class="object_astronaut" src="{{ asset('gambar/svg/astronaut2.svg') }}" width="140px" loading="lazy">
                </div>
            </div>
            <div class="glowing_stars">
                <div class="star"></div>
                <div class="star"></div>
                <div class="star"></div>
                <div class="star"></div>
                <div class="star"></div>

            </div>

        </div>

    </body>
    <!-- partial -->
    {{-- <script src="./script.js"></script> --}}
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>

</html>
