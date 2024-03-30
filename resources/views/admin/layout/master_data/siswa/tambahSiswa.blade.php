@extends('admin.main')
@section('tambahSiswa')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <a class=" btn btn-primary btn-sm text-white" href="/admin/siswa">
                    <i class=" fa fa-reply"></i>
                    Kembali
                </a>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Master Data</li>
                    <li class="breadcrumb-item active">Siswa</li>
                </ol>
            </div>
        </div>
        <div class=" mb-3">

        </div>

        <form action="/admin/insert/siswa" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-9">
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Data Siswa</h3>
                        </div>
                        <div class="card-body p-0">
                            <div class="bs-stepper linear">
                                <div class="bs-stepper-header" role="tablist">

                                    <div class="step" data-target="#logins-part">
                                        <button type="button" class="step-trigger" role="tab"
                                            aria-controls="logins-part" id="logins-part-trigger" aria-selected="false"
                                            disabled="disabled">
                                            <span class="bs-stepper-circle">1</span>
                                            <span class="bs-stepper-label">Data Siswa</span>
                                        </button>
                                    </div>
                                    <div class="line"></div>
                                    <div class="step active" data-target="#information-part">
                                        <button type="button" class="step-trigger" role="tab"
                                            aria-controls="information-part" id="information-part-trigger"
                                            aria-selected="true">
                                            <span class="bs-stepper-circle">2</span>
                                            <span class="bs-stepper-label">Data Sekolah</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="bs-stepper-content">
                                    <div id="logins-part" class="content" role="tabpanel"
                                        aria-labelledby="logins-part-trigger">
                                        {{-- Nama Lengkap --}}
                                        <div class="form-group">
                                            <label>Nama Lengkap</label>
                                            <input type="text" name="nama" class="form-control" id=""
                                                placeholder="Nama Lengkap" required>
                                        </div>

                                        {{-- Jenis Kelamin --}}
                                        <div class="mb-4">
                                            <label for="jk">Jenis Kelamin</label>
                                            <div class="form-group clearfix ml-1">
                                                <div class="icheck-primary d-inline mr-5">
                                                    <input type="radio" id="radioPrimary1" name="jk" value="L">
                                                    <label for="radioPrimary1">
                                                        <i class=" fas fa-male"></i> Laki - Laki
                                                    </label>
                                                </div>
                                                <div class="icheck-primary d-inline">
                                                    <input type="radio" id="radioPrimary2" name="jk" value="P">
                                                    <label for="radioPrimary2">
                                                        <i class=" fas fa-female"></i> Perempuan
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class=" col-sm-4">
                                                {{-- Tempat Lahir --}}
                                                <div class="form-group">
                                                    <label>Tempat Lahir</label>
                                                    <input type="text" name="tempat_lahir" class="form-control"
                                                        id="" placeholder="Tempat Lahir" required>
                                                </div>
                                            </div>
                                            <div class=" col-sm-4">
                                                <div class="form-group">
                                                    {{-- Tanggal Lahir --}}
                                                    <label>Tanggal Lahir</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="fas fa-calendar-alt"></i>
                                                            </span>
                                                        </div>
                                                        <input type="date" name="tanggal_lahir"
                                                            class="form-control float-right" id="reservation" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- No Handphone --}}
                                        <div class="form-group">
                                            <label>No. Handphone Siswa</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class=" fas fa-phone"></i>
                                                    </span>
                                                </div>
                                                <input type="text" name="no_hp_siswa" class="form-control float-right"
                                                    id="reservation" required placeholder="No Handphone">
                                            </div>
                                        </div>

                                        {{-- Alamat Lenkap --}}
                                        <div class="form-group">
                                            <label>Alamat Lengkap</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class=" fas fa-home"></i>
                                                    </span>
                                                </div>
                                                <textarea name="alamat" class="form-control" rows="3" placeholder="Alamat Lengkap" name="" required></textarea>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class=" col-sm-6">
                                                {{-- Nama Lengkap Ayah --}}
                                                <div class="form-group">
                                                    <label>Nama Lengkap Ayah</label>
                                                    <input type="text" name="nama_ayah" class="form-control"
                                                        id="" placeholder="Nama Lengkap Ayah" required>
                                                </div>
                                            </div>
                                            <div class=" col-sm-6">
                                                {{-- Nama Lengkap Ibu --}}
                                                <div class="form-group">
                                                    <label>Nama Lengkap</label>
                                                    <input type="text" name="nama_ibu" class="form-control"
                                                        id="" placeholder="Nama Lengkap Ibu" required>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- No Handphone Ortu --}}
                                        <div class="form-group">
                                            <label>No. Handphone Orang Tua</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class=" fas fa-phone"></i>
                                                    </span>
                                                </div>
                                                <input type="text" name="no_hp_ortu" class="form-control float-right"
                                                    id="reservation" required placeholder="No Handphone">
                                            </div>
                                        </div>

                                        <a class="btn btn-primary btn-sm" onclick="stepper.next()">
                                            Lanjut <i class=" fas fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                    <div id="information-part" class="content active dstepper-block" role="tabpanel"
                                        aria-labelledby="information-part-trigger">
                                        {{-- NIS --}}
                                        <div class="form-group">
                                            <label>NIS</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class=" fas fa-user"></i>
                                                    </span>
                                                </div>
                                                <input name="nis" type="text" class="form-control float-right"
                                                    id="reservation" required placeholder="NIS">
                                            </div>
                                        </div>

                                        {{-- NISN --}}
                                        <div class="form-group">
                                            <label>NIS</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class=" fas fa-users"></i>
                                                    </span>
                                                </div>
                                                <input name="nisn" type="text" class="form-control float-right"
                                                    id="reservation" required placeholder="NISN">
                                            </div>
                                        </div>

                                        {{-- Kelas --}}
                                        <div class="form-group">
                                            <label>Kelas</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class=" fas fa-graduation-cap"></i>
                                                    </span>
                                                </div>
                                                <select class="form-control float-right " name="kelas_id"
                                                    aria-label="Default select example">
                                                    <option value="" selected>-- Kelas --</option>
                                                    @foreach ($kelas as $k)
                                                        <option value="{{ $k->id }}">{{ $k->kelas }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <a class="btn btn-primary btn-sm" onclick="stepper.previous()"><i
                                                class=" fa fa-reply"></i>
                                            Kembali
                                        </a>
                                        <button type="submit" class="btn btn-success btn-sm">
                                            Unggah <i class=" fa fa-upload"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <p class=" text-red">(* Form Wajib Disi</p>
                        </div>
                    </div>
                </div>
                <div class=" col-md-3">
                    <div class="card card-primary card-outline">
                        <div class=" m-3">
                            <img src="{{ asset('gambar/user.jpg') }}" id="preview" class="rounded" alt="Cinque Terre"
                                height="0%" width="100%">
                        </div>
                        <div class="card-body box-profile">
                            <label for="">Unggah Gambar</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="foto" name="fotos"
                                    accept="image/*">
                                <label class="custom-file-label" for="foto">Masukan Gambar</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="{{ asset('js/main/master_data/siswa/tambahSiswa.js') }}"></script>
    @yield('toastr')
    @if (session()->has('gagalInput'))
        <script type="text/javascript">
            toastr.error('{{ session('gagalInput') }}', "", {
                "closeButton": true,
                "timeOut": 2500,
            });
        </script>
    @endif
@endsection
