@extends('siswa/main_siswa')
@section('dashboard_siswa')
    <div class="container-fluid" >
        <div class="row mb-2" >
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
        <div id="carouselExampleControls" class="carousel slide bg-transparent" data-ride="carousel" >
            <div class="carousel-inner">
                @foreach ($data_informasi as $key => $info)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }} " style="background-color: ffffff">
                        <div class="col-md-6 col-lg-4 py-3 mx-auto">
                            <div class="card card-custom bg-white border-white border-0" style="height: 450px">
                                <div class="card-custom-avatar text-center mt-2">
                                    <img src="{{ asset('post_image/' . $info->gambar) }}" id="preview" class="rounded "
                                        alt="Cinque Terre" style="width: 250px;">
                                </div>
                                <div class="card-body" style="overflow-y: auto">
                                    <h4 class="card-title">Card title</h4>
                                    <p class="card-text">You can also set maximum height on and the card will not
                                        expand, instead a
                                        scrollbar in the card body will appear.</p>
                                    <p class="card-text">Some example text to show the scrollbar.</p>
                                    <p class="card-text">Lorem ipsum dolor sit amet, te vix omittam fastidii, enim
                                        paulo
                                        omnes ea
                                        has, illud luptatum no qui. Sed ea qualisque urbanitas, purto elit nec te.
                                        Possim inermis
                                        antiopam ut eum. Eos te zril labore laboramus, quem erant nam in. Ut sed
                                        molestie
                                        antiopam. At altera facilisis mel.</p>

                                    <!-- Menampilkan pesan kesalahan jika ada -->
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
