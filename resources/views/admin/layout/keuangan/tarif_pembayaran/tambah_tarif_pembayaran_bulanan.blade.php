@extends('admin.main')
@section('tambahTarifPembayaranBulanan')
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
                <div class=" col-4">
                    <div class=" card card-blue card-outline">
                        <div class=" mb-3">
                            <h6 class="m-2">Informasi Pembayaran</h6>
                            <div class=" border-bottom"></div>
                            <form action="/admin/tambah/tarif-pembayaran/bulanan" method="post">
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
                                                <div class="form-select" style="width: 200px">
                                                    <select class="form-control " name="kelas"
                                                        aria-label="Default select example" required>
                                                        <option value="" selected>-- Kelas --</option>
                                                        @foreach ($kelas as $k)
                                                            <option value="{{ $k->id }}">{{ $k->kelas }}
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
                                                        id="tarif_bulanan" required>
                                                </div>
                                            </div>
                                            <div class=" row mt-2">
                                                <div class=" col-5">
                                                    <label for="" class=" col-form-label">Total Tagihan
                                                        (Rp.)</label>
                                                </div>
                                                <div class=" col-7">
                                                    <input class="form-control" type="text" name="totalTagihan"
                                                        id="totalTagihan" value="{{ old('totalTagihan') }}" readonly>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" col-8">
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
                                            <input class="form-control form-control-sm" type="text" name="juli"
                                                id="tagihan1" value="{{ old('juli') }}" required>
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
                                                id="tagihan2" value="{{ old('agustus') }}" required>
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
                                                id="tagihan3" value="{{ old('september') }}" required>
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
                                                id="tagihan4" value="{{ old('oktober') }}" required>
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
                                                id="tagihan5" value="{{ old('november') }}" required>
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
                                                id="tagihan6" value="{{ old('desember') }}" required>
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
                                                id="tagihan7" value="{{ old('january') }}" required>
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
                                                id="tagihan8" value="{{ old('februari') }}" required>
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
                                                id="tagihan9" value="{{ old('maret') }}" required>
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
                                                id="tagihan10" value="{{ old('april') }}" required>
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
                                                id="tagihan11" value="{{ old('mei') }}" required>
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
                                                id="tagihan12" value="{{ old('juni') }}" required>
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
    <script src="{{ asset('js/main/keuangan/tarif_pembayaran/tambah_tarif_pembayaran_bulanan.js') }}"></script>
    @yield('toastr')
    @if (session()->has('dataSama'))
        <script type="text/javascript">
            toastr.error('{{ session('dataSama') }}', "", {
                "closeButton": true,
                "timeOut": 2500,
            });
        </script>
    @endif
    @error('pos')
    <script type="text/javascript">
        toastr.error('{{ $message }}')
    </script>
    @enderror
    @error('namaPembayaran')
    <script type="text/javascript">
        toastr.error('{{ $message }}')
    </script>
    @enderror
    @error('tj')
    <script type="text/javascript">
        toastr.error('{{ $message }}')
    </script>
    @enderror
    @error('tipe')
    <script type="text/javascript">
        toastr.error('{{ $message }}')
    </script>
    @enderror
    @error('kelas')
    <script type="text/javascript">
        toastr.error('{{ $message }}')
    </script>
    @enderror
    @error('totalTagihan')
    <script type="text/javascript">
        toastr.error('{{ $message }}')
    </script>
    @enderror
    @error('juli')
    <script type="text/javascript">
        toastr.error('{{ $message }}')
    </script>
    @enderror
    @error('agustus')
    <script type="text/javascript">
        toastr.error('{{ $message }}')
    </script>
    @enderror
    @error('september')
    <script type="text/javascript">
        toastr.error('{{ $message }}')
    </script>
    @enderror
    @error('oktober')
    <script type="text/javascript">
        toastr.error('{{ $message }}')
    </script>
    @enderror
    @error('november')
    <script type="text/javascript">
        toastr.error('{{ $message }}')
    </script>
    @enderror
    @error('desember')
    <script type="text/javascript">
        toastr.error('{{ $message }}')
    </script>
    @enderror
    @error('january')
    <script type="text/javascript">
        toastr.error('{{ $message }}')
    </script>
    @enderror
    @error('februari')
    <script type="text/javascript">
        toastr.error('{{ $message }}')
    </script>
    @enderror
    @error('maret')
    <script type="text/javascript">
        toastr.error('{{ $message }}')
    </script>
    @enderror
    @error('april')
    <script type="text/javascript">
        toastr.error('{{ $message }}')
    </script>
    @enderror
    @error('mei')
    <script type="text/javascript">
        toastr.error('{{ $message }}')
    </script>
    @enderror
@endsection
