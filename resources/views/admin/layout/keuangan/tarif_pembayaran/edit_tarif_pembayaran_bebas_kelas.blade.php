@extends('admin.main')
@section('editTarifPembayaranBebasKelas')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tarif Pembayaran Bebas</h1>
            </div>
        </div>

        @foreach ($tfb as $t)
            <form action="/admin/update/tarif-pembayaran/kelas/{{ $t->tipe }}" method="post">
                @csrf
                <div class=" row mt-3 mx-1 ">
                    <div class=" col-6 ">
                        <div class=" card card-olive card-outline">
                            <div class=" mx-2 mt-1">
                                <p class=" h5">Informasi Pembayaran</p>
                                <input type="hidden" value="{{ $t->id }}" name="id">
                                {{-- Nama Pembayaran --}}
                                <div class=" form-group ">
                                    <div class="row align-items-center mt-2">
                                        <div class=" col-4">
                                            <label for="" class=" col-form-label" style="float: right">Nama
                                                Pembayaran</label>
                                        </div>
                                        <div class=" col-8">
                                            <input class=" form-control" type="text" name="namaPembayaran" id=""
                                                value="{{ $t->nama_pembayaran }}" readonly>
                                        </div>
                                    </div>
                                </div>
                                {{-- Tahun Ajarana --}}
                                <div class=" form-group ">
                                    <div class="row align-items-center mt-2">
                                        <div class=" col-4">
                                            <label for="" class=" col-form-label" style="float: right">Tahun
                                                Ajaran</label>
                                        </div>
                                        <div class=" col-8">
                                            <input class=" form-control" type="text" name="tj" id=""
                                                value="{{ $t->tahun_ajaran }}" readonly>
                                        </div>
                                    </div>
                                </div>
                                {{-- Tipe Bayar --}}
                                <div class=" form-group">
                                    <div class=" row align-items-center mt-2">
                                        <div class=" col-4">
                                            <label for="" class=" col-form-label" style="float: right">Tipe
                                                Bayar</label>
                                        </div>
                                        <div class=" col-8">
                                            <input type="text" name="tipe" class=" form-control"
                                                value="{{ $t->tipe }}" readonly>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class=" col-6">
                        <div class=" card card-blue card-outline">
                            <div class=" mx-2 mt-1 mr-5">
                                <p class=" h5">Tarif Tagihan Per Kelas</p>
                                <div class=" ml-5">
                                    {{-- Tarif --}}
                                    <div class=" form-group">
                                        <div class=" row align-items-center mt-2">
                                            <div class=" col-3">
                                                <label for="" class=" col-form-label">Kelas</label>
                                            </div>
                                            <div class=" col-9">
                                                <input type="text" class=" form-control" 
                                                    value="{{ $t->kelas->kelas }}" readonly>
                                                <input type="hidden" value="{{ $t->kelas->id }}" name="kelas">
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Tarif --}}
                                    <div class=" form-group">
                                        <div class=" row align-items-center mt-2">
                                            <div class=" col-3">
                                                <label for="" class=" col-form-label">Tarif (Rp.)</label>
                                            </div>
                                            <div class=" col-9">
                                                <input type="text" class=" form-control" id="tarifInput" name="tarif"
                                                    value="{{ 'Rp. ' . number_format((float) $t->tarif, 0, ',', '.') }}"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class=" row" style="float: right">
                                    <div class="col-auto mb-3 ">
                                        <button class=" btn btn-sm btn-success">
                                            <i class=" fa fa-save"></i> Simpan
                                        </button>
                                    </div>
                                    {{-- /admin/tarif-pembayaran/2022-2023/Bebas/id=11/Uang%20Gedung%20-%20T.A%202022-2023 --}}
                                    <div class="col-auto mb-2 ">
                                        <a href="javascript:history.back()" class=" btn btn-sm btn-danger">
                                            <i class=" fa fa-reply"></i> Kembali
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        @endforeach
    </div>
<script src="{{ asset('js/main/keuangan/tarif_pembayaran/edit_tarif_pembayaran_bebas_kelas.js') }}"></script>
@endsection
