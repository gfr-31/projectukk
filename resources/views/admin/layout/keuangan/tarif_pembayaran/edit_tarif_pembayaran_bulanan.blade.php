@extends('admin.main')
@section('editTarifPembayaranBulanan')
    <div class="container-fluid">
        <div class=" row">
            <div class=" col-5">
                <div class=" card card-blue card-outline">
                    <div class=" mb-3">
                        <h6 class="m-2">Informasi Pembayaran</h6>
                        <div class=" border-bottom"></div>
                        @foreach ($tfb as $t)
                            <form action="/admin/update/tarif-pembayaran/{{ $t->tipe }}" method="post">
                                @csrf
                                <input type="hidden" value="{{ $t->id }}" name="id">
                                {{-- Nama Siswa --}}
                                <div class=" row mx-3 mt-2">
                                    <div class=" col-12">
                                        <div class=" form-group">
                                            <div class="row align-items-center">
                                                <div class=" col-4">
                                                    <label for="" class=" col-form-label">Nama Siswa</label>
                                                </div>
                                                <div class=" col-8">
                                                    <input class="form-control" type="text" name="" id=""
                                                        value="{{ $t->siswa->nama_lengkap }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- NIS --}}
                                <div class=" row mx-3">
                                    <div class=" col-12">
                                        <div class=" form-group">
                                            <div class="row align-items-center">
                                                <div class=" col-4">
                                                    <label for="" class=" col-form-label">NIS</label>
                                                </div>
                                                <div class=" col-8">
                                                    <input class="form-control" type="text" name="" id=""
                                                        value="{{ $t->siswa->nis }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Kelas --}}
                                <div class=" row mx-3">
                                    <div class=" col-12">
                                        <div class=" form-group">
                                            <div class="row align-items-center">
                                                <div class=" col-4">
                                                    <label for="" class=" col-form-label">Kelas</label>
                                                </div>
                                                <div class=" col-8">
                                                    <input class="form-control" type="text" id=""
                                                        value="{{ $t->kelas->kelas }}" readonly>
                                                    <input class="form-control" type="hidden" name="kelas" id=""
                                                        value="{{ $t->kelas->id }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Jenis Bayar --}}
                                <div class=" row mx-3 ">
                                    <div class=" col-12">
                                        <div class=" form-group">
                                            <div class="row align-items-center">
                                                <div class=" col-4">
                                                    <label for="" class=" col-form-label">Pembayaran</label>
                                                </div>
                                                <div class=" col-8">
                                                    <input class="form-control" type="text" name="namaPembayaran"
                                                        id="" value="{{ $t->nama_pembayaran }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Tahun Ajaran --}}
                                <div class=" row mx-3">
                                    <div class=" col-12">
                                        <div class=" form-group">
                                            <div class="row align-items-center">
                                                <div class=" col-4">
                                                    <label for="" class=" col-form-label">Tahun Ajaran</label>
                                                </div>
                                                <div class=" col-8">
                                                    <input class="form-control" id="" name="tj"
                                                        value="{{ $t->tahun_ajaran }}" type="text">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Tipe Bayar --}}
                                <div class=" row mx-3">
                                    <div class=" col-12">
                                        <div class=" form-group">
                                            <div class="row align-items-center">
                                                <div class=" col-4">
                                                    <label for="" class=" col-form-label">Tipe Bayar</label>
                                                </div>
                                                <div class=" col-8">
                                                    <input class="form-control" type="text" name="tipe" id=""
                                                        value="{{ $t->tipe }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class=" card card-blue card-outline">
                        <h6 class="m-2">Tarif Setiap Bulanan Sama</h6>
                        <div class=" border-bottom"></div>
                        <div class=" row mx-3 mt-3">
                            <div class=" col-12">
                                <div class=" form-group">
                                    <div class="row align-items-center">
                                        <div class=" col-5">
                                            <label for="" class=" col-form-label">Tarif Bulanan (Rp.)</label>
                                        </div>
                                        <div class=" col-7 mt-2">
                                            <input class="form-control" type="text" name=""
                                                id="tarif_bulanan">
                                        </div>
                                        <div class=" col-5">
                                            <label for="" class=" col-form-label">Total Tagihan (Rp.)</label>
                                        </div>
                                        <div class=" col-7 mt-2">
                                            <input class="form-control" type="text" name="totalTagihan"
                                                id="totalTagihan"
                                                value="{{ 'Rp. ' . number_format((float) $t->tagihan, 0, ',', '.') }}"
                                                readonly>
                                        </div>
                                        <div class=" col-5">
                                            <label for="" class=" col-form-label">Sisa Tagihan (Rp.)</label>
                                        </div>
                                        <div class=" col-7 mt-2">
                                            <input class="form-control" type="text" name="sisalTagihan"
                                                id="sisaTagihan"
                                                value="{{ 'Rp. ' . number_format((float) $t->sisa_tagihan, 0, ',', '.') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" col-7">
                <div class=" card card-blue card-outline">
                    <h6 class="m-2">Tarif Tagiahan Siswa</h6>
                    <div class=" border-bottom"></div>
                    {{-- Juli --}}
                    <div class=" row mx-3 mt-3">
                        <div class=" col-12">
                            <div class=" form-group">
                                <div class="row align-items-center">
                                    <div class=" col-3">
                                        <p for="" class=" col-form-label">Juli</p>
                                    </div>
                                    <div class=" col-9">
                                        <input class="form-control form-control-sm" type="text" name="juli"
                                            id="tagihan1"
                                            value="{{is_numeric($t->juli) ? 'Rp. ' . number_format((float) $t->juli, 0, ',', '.') : 'Rp. 0' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Agustus --}}
                    <div class=" row mx-3">
                        <div class=" col-12">
                            <div class=" form-group">
                                <div class="row align-items-center">
                                    <div class=" col-3">
                                        <p for="" class=" col-form-label">Agustus</p>
                                    </div>
                                    <div class=" col-9">
                                        <input class="form-control form-control-sm" type="text" name="agustus"
                                            id="tagihan2"
                                            value="{{is_numeric($t->agustus) ? 'Rp. ' . number_format((float) $t->agustus, 0, ',', '.') : 'Rp. 0' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- September --}}
                    <div class=" row mx-3">
                        <div class=" col-12">
                            <div class=" form-group">
                                <div class="row align-items-center">
                                    <div class=" col-3">
                                        <p for="" class=" col-form-label">September</p>
                                    </div>
                                    <div class=" col-9">
                                        <input class="form-control form-control-sm" type="text" name="september"
                                            id="tagihan3"
                                            value="{{is_numeric($t->agustus) ? 'Rp. ' . number_format((float) $t->september, 0, ',', '.') : 'Rp. 0'  }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Oktober --}}
                    <div class=" row mx-3">
                        <div class=" col-12">
                            <div class=" form-group">
                                <div class="row align-items-center">
                                    <div class=" col-3">
                                        <p for="" class=" col-form-label">Oktober</p>
                                    </div>
                                    <div class=" col-9">
                                        <input class="form-control form-control-sm" type="text" name="oktober"
                                            id="tagihan4"
                                            value="{{is_numeric($t->agustus) ? 'Rp. ' . number_format((float) $t->oktober, 0, ',', '.'): 'Rp. 0'  }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- November --}}
                    <div class=" row mx-3">
                        <div class=" col-12">
                            <div class=" form-group">
                                <div class="row align-items-center">
                                    <div class=" col-3">
                                        <p for="" class=" col-form-label">November</p>
                                    </div>
                                    <div class=" col-9">
                                        <input class="form-control form-control-sm" type="text" name="november"
                                            id="tagihan5"
                                            value="{{is_numeric($t->agustus) ? 'Rp. ' . number_format((float) $t->november, 0, ',', '.'): 'Rp. 0'  }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Desember --}}
                    <div class=" row mx-3">
                        <div class=" col-12">
                            <div class=" form-group">
                                <div class="row align-items-center">
                                    <div class=" col-3">
                                        <p for="" class=" col-form-label">Desember</p>
                                    </div>
                                    <div class=" col-9">
                                        <input class="form-control form-control-sm" type="text" name="desember"
                                            id="tagihan6"
                                            value="{{is_numeric($t->agustus) ? 'Rp. ' . number_format((float) $t->desember, 0, ',', '.'): 'Rp. 0'  }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- January --}}
                    <div class=" row mx-3">
                        <div class=" col-12">
                            <div class=" form-group">
                                <div class="row align-items-center">
                                    <div class=" col-3">
                                        <p for="" class=" col-form-label">January</p>
                                    </div>
                                    <div class=" col-9">
                                        <input class="form-control form-control-sm" type="text" name="january"
                                            id="tagihan7"
                                            value="{{is_numeric($t->agustus) ? 'Rp. ' . number_format((float) $t->january, 0, ',', '.'): 'Rp. 0'  }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Februari --}}
                    <div class=" row mx-3">
                        <div class=" col-12">
                            <div class=" form-group">
                                <div class="row align-items-center">
                                    <div class=" col-3">
                                        <p for="" class=" col-form-label">Februari</p>
                                    </div>
                                    <div class=" col-9">
                                        <input class="form-control form-control-sm" type="text" name="februari"
                                            id="tagihan8"
                                            value="{{is_numeric($t->agustus) ? 'Rp. ' . number_format((float) $t->february, 0, ',', '.'): 'Rp. 0'  }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Maret --}}
                    <div class=" row mx-3">
                        <div class=" col-12">
                            <div class=" form-group">
                                <div class="row align-items-center">
                                    <div class=" col-3">
                                        <p for="" class=" col-form-label">Maret</p>
                                    </div>
                                    <div class=" col-9">
                                        <input class="form-control form-control-sm" type="text" name="maret"
                                            id="tagihan9"
                                            value="{{is_numeric($t->agustus) ? 'Rp. ' . number_format((float) $t->maret, 0, ',', '.'): 'Rp. 0'  }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- April --}}
                    <div class=" row mx-3">
                        <div class=" col-12">
                            <div class=" form-group">
                                <div class="row align-items-center">
                                    <div class=" col-3">
                                        <p for="" class=" col-form-label">April</p>
                                    </div>
                                    <div class=" col-9">
                                        <input class="form-control form-control-sm" type="text" name="april"
                                            id="tagihan10"
                                            value="{{is_numeric($t->agustus) ? 'Rp. ' . number_format((float) $t->april, 0, ',', '.'): 'Rp. 0'  }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Mei --}}
                    <div class=" row mx-3">
                        <div class=" col-12">
                            <div class=" form-group">
                                <div class="row align-items-center">
                                    <div class=" col-3">
                                        <p for="" class=" col-form-label">Mei</p>
                                    </div>
                                    <div class=" col-9">
                                        <input class="form-control form-control-sm" type="text" name="mei"
                                            id="tagihan11"
                                            value="{{is_numeric($t->agustus) ? 'Rp. ' . number_format((float) $t->mei, 0, ',', '.'): 'Rp. 0'  }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Juni --}}
                    <div class=" row mx-3">
                        <div class=" col-12">
                            <div class=" form-group">
                                <div class="row align-items-center">
                                    <div class=" col-3">
                                        <p for="" class=" col-form-label">Juni</p>
                                    </div>
                                    <div class=" col-9">
                                        <input class="form-control form-control-sm" type="text" name="juni"
                                            id="tagihan12"
                                            value="{{is_numeric($t->agustus) ? 'Rp. ' . number_format((float) $t->juni, 0, ',', '.'): 'Rp. 0'  }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" mx-3">
                        <div class="">
                            <div class=" form-group">
                                <div class="align-items-center">
                                    <div class="row">
                                        <div class="col-6">
                                            <button class=" btn btn-success btn-sm">
                                                Simpan
                                            </button>
                                        </div>
                                        <div class=" col-6 ">
                                            <a href="{{ url()->previous() }}"
                                                class=" btn btn-sm btn-danger" style="float: right">
                                                <i class=" fa fa-reply"></i> Kembali
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/main/keuangan/tarif_pembayaran/edit_tarif_pembayaran_bulanan.js') }}"></script>
@endsection
