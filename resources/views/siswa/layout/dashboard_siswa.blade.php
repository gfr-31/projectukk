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
            @foreach ($data_informasi as $info)
                <div class=" col-3">
                    <div class="card">
                        <div class=" mt-2"
                            style="display: flex; justify-content: center; align-items: center; height: 200px;">
                            <img src="{{ asset('post_image/' . $info->gambar) }}" id="preview" class="rounded"
                                alt="Cinque Terre" style="max-width: 100%; max-height: 100%;">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $info->judul }}</h5>
                            <p class="card-text">{!! strip_tags($info->deskripsi) !!}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
