@extends('siswa/main_siswa')
@section('developers_siswa')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Informasi</h1>
                <h5 class="m-0">Pengumuman Pembayaran SPP</h5>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>

        <div class=" row">
            <div class=" col-lg-5" style="">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner ">
                        @foreach ($data_informasi as $key => $info)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                <div class="card">
                                    <div class=" mt-2"
                                        style="display: flex; justify-content: center; align-items: center; height: 200px;">
                                        <img src="{{ asset('post-image/' . $info->gambar) }}" id="preview" class="rounded"
                                            alt="Cinque Terre" style="max-width: 100%; max-height: 100%;">
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $info->judul }}</h5>
                                        <p class="card-text">{!! strip_tags($info->deskripsi) !!}</p>
                                    </div>
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
