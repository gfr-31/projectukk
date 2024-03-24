@extends('admin.main')
@section('tambahTarifPembayaranBebas')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tambah Tarif Pembayaran Bebas</h1>
            </div>
            <div class="col-sm-6 mt-2">
                @foreach ($jp as $jp)
            </div>
        </div>

        <form action="/admin/tambah/tarif-pembayaran/bebas" method="post">
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
                            <p class=" h5">Tarif Tagihan Per Kelas</p>
                            <div class=" ml-5">
                                {{-- Kelas --}}
                                <div class="">
                                    <div class="row align-items-center">
                                        <div class=" col-3">
                                            <label for="" class=" col-form-label">Kelas</label>
                                        </div>
                                        <div class=" col-9">
                                            <div class="form-select ">
                                                <select class="form-control " name="kelas"
                                                    aria-label="Default select example" required>
                                                    <option value="" class=" text-center" selected>-- Kelas --
                                                    </option>
                                                    @foreach ($kelas as $k)
                                                        <option value="{{ $k->id }}">{{ $k->kelas }}</option>
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
                                            <input type="text" class=" form-control" id="tarifInput" name="tarif"
                                                required>
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
    <script>
        // Fungsi untuk mengonversi angka menjadi format mata uang Rupiah
        function formatRupiah(angka) {
            // Mengonversi angka menjadi format Rupiah dengan koma sebagai pemisah ribuan
            var rupiah = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).format(angka);

            // Menghapus angka di belakang koma
            rupiah = rupiah.replace(/\d(?=(\d{3})+,)/g, '');

            return rupiah;
        }

        // Event listener untuk menangani input tarif
        document.getElementById('tarifInput').addEventListener('input', function(event) {
            // Mendapatkan nilai dari input
            var tarifInput = event.target.value;

            // Menghapus karakter selain digit
            tarifInput = tarifInput.replace(/\D/g, '');

            // Mengonversi nilai menjadi format Rupiah
            var tarifRupiah = formatRupiah(tarifInput);

            // Menampilkan nilai dalam format Rupiah di dalam input
            event.target.value = tarifRupiah;
        });
    </script>
    @endforeach
@endsection
