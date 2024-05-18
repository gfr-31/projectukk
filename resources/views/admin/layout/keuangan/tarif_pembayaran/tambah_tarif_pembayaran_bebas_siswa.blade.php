@extends('admin.main')
@section('tambahTarifPembayaranBebasSiswa')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tambah Tarif Pembayaran Bebas</h1>
            </div>
            <div class="col-sm-6 mt-2">
                @foreach ($jp as $jp)
            </div>
        </div>

        <form action="/admin/tambah/tarif-pembayaran/bebas/siswa" method="post">
            @csrf
            <div class=" row mt-3 mx-1 ">
                <div class=" col-7 ">
                    <div class=" card card-olive card-outline">
                        <div class=" mx-2">
                            <p class=" h5">Informasi Pembayaran</p>

                            <input type="hidden" name="id" value="{{ $jp->id }}">
                            {{-- Nama Pembayaran --}}
                            <div class=" form-group ">
                                <div class="row align-items-center mt-2">
                                    <div class=" col-4">
                                        <label for="" class=" col-form-label" style="float: right">Nama
                                            Pembayaran</label>
                                    </div>
                                    <div class=" col-8">
                                        <input class=" form-control" type="text" name="namaPembayaran" id=""
                                            value="{{ $jp->nama_pembayaran }}" readonly>
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
                                            value="{{ $jp->tahun_ajaran }}" readonly>
                                        {{-- <input class=" form-control" type="hidden" name="tj" id=""
                                        value="{{ $jp->id }}" readonly> --}}
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
                                            value="{{ $jp->tipe }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" col-5">
                    <div class=" card card-blue card-outline">
                        <div class=" mx-2">
                            <p class=" h5">Tarif Tagihan Siswa</p>
                            <div class=" ml-5">
                                {{-- Kelas --}}
                                <div class=" mb-2">
                                    <div class="row align-items-center">
                                        <div class=" col-3">
                                            <label for="" class=" col-form-label">Kelas</label>
                                        </div>
                                        <div class=" col-9">
                                            <div class=" ">
                                                @foreach ($kelas as $k)
                                                    <input class=" form-control" type="text" id=""
                                                        value="{{ $k->kelas }}" readonly>
                                                    <input type="hidden" name="kelas" value="{{ $k->id }}">
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Siswa --}}
                                <div class="">
                                    <div class="row align-items-center">
                                        <div class=" col-3">
                                            <label for="" class=" col-form-label">Siswa</label>
                                        </div>
                                        <div class=" col-9">
                                            <div class=" ">
                                                @error('siswa')
                                                    <small class=" text-danger ml-1"><i class=" fa fa-warning"></i>
                                                        {{ $message }} </small>
                                                @enderror
                                                <select class="form-select " name="siswa"
                                                    aria-label="Default select example">
                                                    <option value="" class=" text-center" selected>-- siswa --
                                                    </option>
                                                    @foreach ($siswa as $s)
                                                        <option value="{{ $s->id }}">{{ $s->nama_lengkap }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
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
                                            @error('tarif')
                                                <small class=" text-danger ml-1"><i class=" fa fa-warning"></i>
                                                    {{ $message }} </small>
                                            @enderror
                                            <input type="text" class=" form-control" id="tarifInput" name="tarif" value="{{ old('tarif') }}">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class=" mb-3 ml-2">
                                <button class=" btn btn-sm btn-success">
                                    <i class=" fa fa-save"></i> Simpan
                                </button>
                                <a href="javascript:history.back()" class=" btn btn-danger btn-sm end-0"
                                    style="float: right">
                                    <i class=" fa fa-reply"></i> Kembali
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="{{ asset('js/main/keuangan/tarif_pembayaran/edit_tarif_pembayaran_bebas_kelas.js') }}"></script>
    @endforeach
    @yield('toastr')
    @if (session()->has('dataSama'))
        <script type="text/javascript">
            toastr.error('{{ session('dataSama') }}', "", {
                "closeButton": true,
                "timeOut": 2500,
            });
        </script>
    @endif
@endsection
