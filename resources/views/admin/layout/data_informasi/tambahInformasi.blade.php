@extends('admin.main')
@section('tambahInformasi')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <a class=" btn btn-primary btn-sm text-white" href="/admin/data">
                    <i class=" fa fa-reply"></i>
                    Kembali
                </a>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Master Data</li>
                    <li class="breadcrumb-item active">Data Informasi</li>
                </ol>
            </div>
        </div>
        <div class="mb-3">
            <form action="/admin/insert/data" method="post" enctype="multipart/form-data">
                @csrf
                <div class="">
                    <div class="">
                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title">Tambah Data Informasi</h3>
                            </div>
                            <div class="bs-stepper-content">
                                <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">

                                    <div class="row">
                                        <div class=" col-9">
                                            {{-- Judul Informasi --}}
                                            <div class="form-group mt-2">
                                                <label>Judul Informasi</label>
                                                <input type="text" name="judul" class="form-control" id=""
                                                    placeholder="Data Informasi" required>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class=" bs-stepper-content">
                                <div class="form-group">
                                    <label>Deskripsi Informasi</label>
                                    <textarea id="content" name="deskripsi"></textarea>
                                </div>
                                <div class=" row">
                                    <div class=" col-sm-8">
                                        <div class=" ">
                                            <div class="card card-primary card-outline" style="height: 25% ;width: 100%">
                                                <div class="  text-center">
                                                    <img src="{{ asset('gambar/user.jpg') }}" id="preview"
                                                        class="rounded mt-3" alt="Cinque Terre" height="0%"
                                                        width="50%" loading="lazy">
                                                </div>
                                                <div class="card-body box-profile">
                                                    <label for="">Unggah Gambar</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="foto"
                                                            name="fotos" accept="image/*">
                                                        <label class="custom-file-label" for="foto">Masukan
                                                            Gambar</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" col-sm-4">
                                        <div class=" card card-blue card-outline ">
                                            <div class=" form-group mx-3">                                             
                                                <div class="form-group mt-2">
                                                    <label>Status</label>
                                                    <div class="form-group clearfix ml-1">
                                                        <div class="icheck-primary d-inline mr-5">
                                                            <input type="radio" id="radioPrimary1" name="status"
                                                                value="Terbit">
                                                            <label for="radioPrimary1">
                                                                Terbit
                                                            </label>
                                                        </div>
                                                        <div class="icheck-primary d-inline">
                                                            <input type="radio" id="radioPrimary2" name="status"
                                                                value="Draft">
                                                            <label for="radioPrimary2">
                                                                Draft
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-danger btn-sm">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('js/main/data_informasi/tambahinformasi.js') }}"></script>
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
