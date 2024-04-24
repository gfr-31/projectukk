@extends('siswa.main_siswa')
@section('profille')
    @foreach ($profille as $p)
        <div class="container rounded bg-white mt-5 mb-5">
            <div class="row">
                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <a href="{{ asset('post_image/' . $p->foto_siswa) }}" data-lightbox="galery"
                            data-title="Foto Siswa | {{ $p->nama_lengkap }}">
                            <img src="{{ asset('post_image/' . $p->foto_siswa) }}" id="preview" class="rounded mt-2"
                                alt="Cinque Terre" height="0%" width="100%" loading="lazy">
                        </a>
                        <h5 class="font-weight-bold mt-2">
                            {{ $p->nama_lengkap }}
                        </h5>
                        <span class="text-black-50">{{ $p->no_hp }}
                    </div>
                </div>
                <div class="col-md-5 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Data Siswa</h4>
                        </div>
                        <div class="row mt-2 mb-3">
                            <div class="col-md-12">
                                <label class="p">Nama Lengkap</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class=" fas fa-user"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control float-right" id="reservation"
                                        value="{{ $p->nama_lengkap }}">
                                </div>
                            </div>
                        </div>
                        @if ($p->jk == 'L')
                            {{-- Jenis Kelamin --}}
                            <div class="mb-3">
                                <label for="jk" class="p">Jenis Kelamin</label>
                                <div class="form-group clearfix ml-1">
                                    <div class="icheck-primary d-inline mr-5">
                                        <input type="radio" id="radioPrimary1" checked disabled='disabled'>
                                        <label for="radioPrimary1">
                                            <i class=" fas fa-male"></i> Laki - Laki
                                        </label>
                                    </div>
                                    <div class="icheck-primary d-inline">
                                        <input type="radio" id="radioPrimary2" disabled='disabled'>
                                        <label for="radioPrimary2">
                                            <i class=" fas fa-female"></i> Perempuan
                                        </label>
                                    </div>
                                </div>
                            </div>
                        @elseif ($p->jk == 'P')
                            {{-- Jenis Kelamin --}}
                            <div class="mb-3">
                                <label for="jk" class="  p">Jenis Kelamin</label>
                                <div class="form-group clearfix ml-1">
                                    <div class="icheck-primary d-inline mr-5">
                                        <input type="radio" id="radioPrimary1" disabled='disabled'>
                                        <label for="radioPrimary1">
                                            <i class=" fas fa-male"></i> Laki - Laki
                                        </label>
                                    </div>
                                    <div class="icheck-primary d-inline">
                                        <input type="radio" id="radioPrimary2" checked disabled='disabled'>
                                        <label for="radioPrimary2">
                                            <i class=" fas fa-female"></i> Perempuan
                                        </label>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="row ">
                            <div class="col-md-6">
                                <label class=" p">Tempat Lahir</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class=" fas fa-hospital-o"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control float-right" id="reservation"
                                        value="{{ $p->tempat_lahir }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class=" p">Tanggal Lahir</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class=" fas fa-calendar"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control float-right" id="reservation"
                                        value="{{ $p->tanggal_lahir }}">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <label class=" p">No. Handphone</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class=" fas fa-phone"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control float-right" id="reservation"
                                        value="{{ $p->no_hp }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class=" p">Alamat Lengkap</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class=" fas fa-home"></i>
                                        </span>
                                    </div>
                                    <textarea name="alamat" class="form-control" rows="3" value="">{{ $p->alamat }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class=" p">Nama Lengkap Ayah</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class=" fas fa-male"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control float-right" id="reservation"
                                        value="{{ $p->nama_ayah }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class=" p">Nama Lengkap Ibu</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class=" fas fa-female"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control float-right" id="reservation"
                                        value="{{ $p->nama_ibu }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class=" p">No. Handphone Orang Tua</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class=" fas fa-phone"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control float-right" id="reservation"
                                        value="{{ $p->no_hp_ortu }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Data Sekolah</h4>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label class="p">NIS</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <strong>NIS</strong>
                                    </span>
                                </div>
                                <input type="text" class="form-control float-right" id="reservation"
                                    value="{{ $p->nis }}">
                            </div>
                        </div>
                        <div class="col-md-12 mb-2 mt-2">
                            <label class="p">NISN</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <strong>NISN</strong>
                                    </span>
                                </div>
                                <input type="text" class="form-control float-right" id="reservation"
                                    value="{{ $p->nisn }}">
                            </div>
                        </div>
                        <div class="col-md-12 ">
                            <label class="p">KELAS</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class=" fas fa-school"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control float-right" id="reservation"
                                    value="{{ $p->kelas->kelas }}">
                            </div>
                        </div>
                        <div class=" mt-4 text-center">
                            <button class="btn btn-danger profile-button" type="button">
                                LOGOUT
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach



    <style>
        .form-control:focus {
            box-shadow: none;
        }

        .profile-button {
            box-shadow: none;
            border: none
        }

        .profile-button:focus {
            box-shadow: none
        }

        .profile-button:active {
            box-shadow: none
        }

        .back:hover {
            cursor: pointer
        }

        .labels {
            font-size: 11px
        }

        .add-experience:hover {
            color: #fff;
            cursor: pointer;
        }
    </style>
@endsection
