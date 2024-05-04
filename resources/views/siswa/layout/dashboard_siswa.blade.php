@extends('siswa/main_siswa')
@section('dashboard_siswa')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Informasi</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
        <div id="carouselExampleControls" class="carousel slide bg-transparent" data-ride="carousel">
            <div class="carousel-inner">
                @foreach ($data_informasi as $key => $info)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }} " style="background-color: ffffff">
                        <div class="col-md-6 col-lg-4 py-3 mx-auto">
                            <div class="card card-custom border-white border-0" style="height: 450px;">
                                <div class="card-custom-avatar text-center mt-2">
                                    <img src="{{ asset('post_image/' . $info->gambar) }}" id="preview" class="rounded "
                                        alt="Cinque Terre" style="width: 250px;">
                                </div>
                                <div class="card-body" style="overflow-y: auto">
                                    <h3 class="card-title">{{ $info->judul }}</h3>
                                    <p id="myText" class="card-text ">
                                        {{ strip_tags($info->deskripsi) }}
                                    </p>
                                    @if ($errors->has('fotos'))
                                        <div class="text-danger">{{ $errors->first('fotos') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
@endsection
