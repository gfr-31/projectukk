@extends('admin.main')
@section('developers')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Setting Aplikasi</li>
                    <li class="breadcrumb-item active">Developers</li>
                </ol>
            </div>
        </div>
        <div class="row justify-content-center">
            {{-- Gifran --}}
            <div class="col-md-12 mt-1 col-xl-4 ">
                <div class="card" style="border-radius: 15px;">
                    <div class="card-body text-center">
                        <div class="mt-3 mb-4">
                            <a href="{{ asset('gambar/gifran.jpg') }}" data-lightbox="gallery" data-title="Developer 1 | Gifran Fazriliana Hafeez">
                                <img src="{{ asset('gambar/gifran.jpg') }}" class="rounded-circle img-fluid"
                                    style="width: 100px;" />
                            </a>
                        </div>
                        <h4 class="mb-2">Gifran Fazriliana H.</h4>
                        <p class="text-muted mb-4">@Developer <span class="mx-2">|</span> <a href="">Pelajar SMK
                                BPM</a></p>
                        <div class="mb-4 pb-2">
                            <a href="https://www.instagram.com/direct/t/114259836638930"
                                class="btn btn-outline-primary btn-floating" target="_blank">
                                <i class="fab fa-instagram fa-lg"></i>
                            </a>
                            <a href="https://api.whatsapp.com/send?phone=6283813050855&text=Hallo%20Kak"
                                class="btn btn-outline-primary btn-floating " target="_blank">
                                <i class="fab fa-whatsapp fa-lg"></i>
                            </a>
                            <a href="" class="btn btn-outline-primary btn-floating " target="_blank">
                                <i class="fab fa-telegram fa-lg"></i>
                            </a>
                        </div>
                        <a class="btn btn-primary btn-rounded btn-lg"
                            href="https://mail.google.com/mail/u/1/#sent?compose=GTvVlcSMTtkRtMNFHqkXHPmpMwZzrHsVLprwFrVncmvrglBFwdWfKTkKRlSgSXbJKfmTzHGrKPbrL"
                            target="_blank">
                            <i class=" fa fa-envelope "></i> Message now
                        </a>
                        <div class="mt-5 mb-2">
                            <div class=" ">
                                <p class="mb-2 h6 justify-content-center">
                                    <i class=" fa fa-globe"></i> Indonesia/West Java
                                    <br>
                                    <i class=" fa fa-map-marker"></i> Bogor/Parungpanjang
                                    <br>
                                    <i class=" fa fa-home"></i> Pepaya III, No.6
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Fadly --}}
            <div class="col-md-6 mt-1 col-xl-4">
                <div class="card" style="border-radius: 15px;">
                    <div class="card-body text-center">
                        <div class="mt-3 mb-4">
                            <a href="{{ asset('gambar/fadly.jpg') }}" data-lightbox="gallery" data-title="Developer 2 | Fadly Bagus Pramudya">
                                <img src="{{ asset('gambar/fadly.jpg') }}" class="rounded-circle img-fluid"
                                    style="width: 100px;" />
                            </a>

                        </div>
                        <h4 class="mb-2">Fadly Bagus Pramudya</h4>
                        <p class="text-muted mb-4">@Developer <span class="mx-2">|</span> <a href=" ">Pelajar SMK
                                BPM</a></p>
                        <div class="mb-4 pb-2">
                            <a href="https://www.instagram.com/direct/t/111150226947325"
                                class="btn btn-outline-primary btn-floating " target="_blank">
                                <i class="fab fa-instagram fa-lg"></i>
                            </a>
                            <a href="https://api.whatsapp.com/send?phone=6289673217781&text=Hallo%20Kak,"
                                class="btn btn-outline-primary btn-floating  " target="_blank">
                                <i class="fab fa-whatsapp fa-lg"></i>
                            </a>
                            <a href="" class="btn btn-outline-primary btn-floating " target="_blank">
                                <i class="fab fa-tiktok fa-lg"></i>
                            </a>
                        </div>
                        <a href="" class="btn btn-primary btn-rounded btn-lg"target="_blank">
                            <i class="fab fa-telegram fa-lg"></i> Message now
                        </a>
                        <div class="mt-5 mb-2">
                            <div class=" ">
                                <p class="mb-2 h6 justify-content-center">
                                    <i class=" fa fa-globe"></i> Indonesia/West Java
                                    <br>
                                    <i class=" fa fa-map-marker"></i> Bogor/Parungpanjang
                                    <br>
                                    <i class=" fa fa-home"></i> Jambu VII, No.7
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
