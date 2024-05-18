@extends('admin.main')
@section('tambahTarifPembayaranBulananSiswa')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tarif Pembayaran</h1>
            </div>
            <div class=" col-6">
                @foreach ($jp as $jp)
                    <a href="/admin/tarif-pembayaran/{{ $jp->tahun_ajaran }}/{{ $jp->tipe }}/id={{ $jp->id }}/{{ $jp->nama_pembayaran }}"
                        class=" btn btn-danger btn-sm float-right">
                        <i class=" fa fa-reply"></i> Kembali
                    </a>
            </div>
        </div>
        @if ($jp->tipe == 'Bulanan')
            <div class=" row">
                <div class=" col-5">
                    <div class=" card card-blue card-outline">
                        <div class=" mb-3">
                            <h6 class="m-2">Informasi Pembayaran</h6>
                            <div class=" border-bottom"></div>
                            <form action="/admin/tambah/tarif-pembayaran/bulanan/siswa" method="post">
                                @csrf
                                <input type="hidden" value="{{ $jp->pos }}" name="pos">
                                <input type="hidden" value="{{ $jp->id }}" name="id">
                                {{-- Jenis Bayar --}}
                                <div class=" row mx-3 mt-2">
                                    <div class=" col-12">
                                        <div class=" form-group">
                                            <div class="row align-items-center">
                                                <div class=" col-4">
                                                    <label for="" class=" col-form-label">Pembayaran</label>
                                                </div>
                                                <div class=" col-8">
                                                    <input class="form-control" type="text" name="namaPembayaran"
                                                        id=""
                                                        value="{{ $jp->pos }} - T.A {{ $jp->tahun_ajaran }}" readonly>
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
                                                    <input type="text" class="form-control" name="tj"
                                                        value="{{ $jp->tahun_ajaran }}" readonly>
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
                                                        value="{{ $jp->tipe }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Kelas --}}
                                <div class=" mx-3">
                                    <div class=" col-12">
                                        <div class="row align-items-center">
                                            <div class=" col-4">
                                                <label for="" class=" col-form-label">Kelas</label>
                                            </div>
                                            <div class=" col-8">
                                                @foreach ($kelas as $k)
                                                    <input class="form-control" type="text" id=""
                                                        value="{{ $k->kelas }}" readonly>
                                                    <input type="hidden" name="kelas" value="{{ $k->id }}">
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Siswa --}}
                                <div class=" mx-3 mt-3">
                                    <div class=" col-12">
                                        <div class="row align-items-center">
                                            <div class=" col-4">
                                                <label for="" class=" col-form-label">Siswa</label>
                                            </div>
                                            <div class=" col-8">
                                                <div class="">
                                                    @error('siswa')
                                                        <small class=" text-danger ml-1"><i class=" fa fa-warning"></i>
                                                            {{ $message }} </small>
                                                    @enderror
                                                    <select class="form-select " name="siswa" id="siswa"
                                                        aria-label="Default select example">
                                                        <option value=""  class=" text-center" selected>-- Siswa --</option>
                                                        @foreach ($siswa as $s)
                                                            <option value="{{ $s->id }}">{{ $s->nama_lengkap }}
                                                            </option>
                                                        @endforeach
                                                    </select>
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
                                        <div class="align-items-center">
                                            <div class=" row">
                                                <div class=" col-5">
                                                    <label for="" class=" col-form-label">Tarif Bulanan
                                                        (Rp.)
                                                    </label>
                                                </div>
                                                <div class=" col-7">
                                                    <input class="form-control" type="text" name=""
                                                        id="tarif_bulanan">
                                                </div>
                                            </div>
                                            <div class=" row mt-2">
                                                <div class=" col-5">
                                                    <label for="" class=" col-form-label">Total Tagihan
                                                        (Rp.)</label>
                                                </div>
                                                <div class=" col-7">
                                                    @error('totalTagihan')
                                                        <small class=" text-danger ml-1"><i class=" fa fa-warning"></i>
                                                            {{ $message }} </small>
                                                    @enderror
                                                    <input class="form-control" type="text" name="totalTagihan"
                                                        id="totalTagihan" readonly>
                                                </div>
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
                        <h6 class="m-2">Tarif Tagiahan Per Kelas</h6>
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
                                            @error('juli')
                                                <small class=" text-danger ml-1"><i class=" fa fa-warning"></i>
                                                    {{ $message }} </small>
                                            @enderror
                                            <input class="form-control form-control-sm" type="text" name="juli"
                                                id="tagihan1" value="{{ old('juli') }}" oninput="formatRupiahs('tagihan1')">
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
                                            @error('agustus')
                                                <small class=" text-danger ml-1"><i class=" fa fa-warning"></i>
                                                    {{ $message }} </small>
                                            @enderror
                                            <input class="form-control form-control-sm" type="text" name="agustus"
                                                id="tagihan2" value="{{ old('agustus') }}" oninput="formatRupiahs('tagihan2')">
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
                                            @error('september')
                                                <small class=" text-danger ml-1"><i class=" fa fa-warning"></i>
                                                    {{ $message }} </small>
                                            @enderror
                                            <input class="form-control form-control-sm" type="text" name="september"
                                                id="tagihan3" value="{{ old('september') }}" oninput="formatRupiahs('tagihan3')">
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
                                            @error('oktober')
                                                <small class=" text-danger ml-1"><i class=" fa fa-warning"></i>
                                                    {{ $message }} </small>
                                            @enderror
                                            <input class="form-control form-control-sm" type="text" name="oktober"
                                                id="tagihan4" value="{{ old('oktober') }}" oninput="formatRupiahs('tagihan4')">
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
                                            @error('november')
                                                <small class=" text-danger ml-1"><i class=" fa fa-warning"></i>
                                                    {{ $message }} </small>
                                            @enderror
                                            <input class="form-control form-control-sm" type="text" name="november"
                                                id="tagihan5" value="{{ old('november') }}" oninput="formatRupiahs('tagihan5')">
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
                                            @error('desember')
                                                <small class=" text-danger ml-1"><i class=" fa fa-warning"></i>
                                                    {{ $message }} </small>
                                            @enderror
                                            <input class="form-control form-control-sm" type="text" name="desember"
                                                id="tagihan6" value="{{ old('desember') }}" oninput="formatRupiahs('tagihan6')">
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
                                            @error('january')
                                                <small class=" text-danger ml-1"><i class=" fa fa-warning"></i>
                                                    {{ $message }} </small>
                                            @enderror
                                            <input class="form-control form-control-sm" type="text" name="january"
                                                id="tagihan7" value="{{ old('january') }}" oninput="formatRupiahs('tagihan7')">
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
                                            @error('februari')
                                                <small class=" text-danger ml-1"><i class=" fa fa-warning"></i>
                                                    {{ $message }} </small>
                                            @enderror
                                            <input class="form-control form-control-sm" type="text" name="februari"
                                                id="tagihan8" value="{{ old('februari') }}" oninput="formatRupiahs('tagihan8')">
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
                                            @error('maret')
                                                <small class=" text-danger ml-1"><i class=" fa fa-warning"></i>
                                                    {{ $message }} </small>
                                            @enderror
                                            <input class="form-control form-control-sm" type="text" name="maret"
                                                id="tagihan9" value="{{ old('maret') }}" oninput="formatRupiahs('tagihan9')">
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
                                            @error('april')
                                                <small class=" text-danger ml-1"><i class=" fa fa-warning"></i>
                                                    {{ $message }} </small>
                                            @enderror
                                            <input class="form-control form-control-sm" type="text" name="april"
                                                id="tagihan10" value="{{ old('april') }}" oninput="formatRupiahs('tagihan10')">
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
                                            @error('mei')
                                                <small class=" text-danger ml-1"><i class=" fa fa-warning"></i>
                                                    {{ $message }} </small>
                                            @enderror
                                            <input class="form-control form-control-sm" type="text" name="mei"
                                                id="tagihan11" value="{{ old('mei') }}" oninput="formatRupiahs('tagihan11')">
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
                                            @error('juni')
                                                <small class=" text-danger ml-1"><i class=" fa fa-warning"></i>
                                                    {{ $message }} </small>
                                            @enderror
                                            <input class="form-control form-control-sm" type="text" name="juni"
                                                id="tagihan12" value="{{ old('juni') }}" oninput="formatRupiahs('tagihan12')">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" row mx-3">
                            <div class=" col-12">
                                <div class=" form-group">
                                    <div class="row align-items-center">
                                        <div class=" col-3">
                                            <div class=" row">
                                                <div class=" col-auto">
                                                    <button class=" btn btn-success btn-sm">
                                                        Simpan
                                                    </button>
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
            </div>
        @endif
        @endforeach

    </div>

    <script src="{{ asset('js/main/keuangan/tarif_pembayaran/tambah_tarif_pembayaran_bulanan_siswa.js') }}"></script>
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
