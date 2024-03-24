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

    <script>
        function formatRupiah(tagihanId) {
            // Mengonversi angka menjadi format Rupiah dengan koma sebagai pemisah ribuan
            var rupiah = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).format(tagihanId);

            // Menghapus angka di belakang koma
            rupiah = rupiah.replace(/\d(?=(\d{3})+,)/g, '');

            return rupiah;
            alert
        }
        document.getElementById('tarif_bulanan').addEventListener('input', function(event) {
            // Mendapatkan nilai dari input
            var tarifInput = event.target.value;

            // Menghapus karakter selain digit
            tarifInput = tarifInput.replace(/\D/g, '');

            // Mengonversi nilai menjadi format Rupiah
            var tarifRupiah = formatRupiah(tarifInput);

            // Menampilkan nilai dalam format Rupiah di dalam input
            event.target.value = tarifRupiah;
        });

        document.getElementById('tarif_bulanan').addEventListener('keypress', function(event) {
            // Periksa apakah tombol yang ditekan adalah tombol enter
            if (event.key === 'Enter') {
                event.preventDefault(); // Mencegah pengiriman form secara otomatis

                var tarifBulanan = this.value.trim(); // Ambil nilai tarif bulanan (string)
                // Periksa apakah nilai tarif bulanan tidak kosong
                if (tarifBulanan.trim() !== '') {
                    // Konversi nilai tarif bulanan menjadi float
                    tarifBulanan = tarifBulanan.replace(/\D/g, '');
                    var tarifBulananFloat = parseFloat(tarifBulanan);
                    // Periksa apakah nilai tarif bulanan valid
                    if (!isNaN(tarifBulananFloat)) {
                        var totalTagihan = tarifBulananFloat * 12;
                        var totalTagihanBulanan = tarifBulananFloat;
                        // Tampilkan nilai total tagihan dengan format "Rp."
                        var formattedTotalTagihan = 'Rp. ' + totalTagihan.toFixed(0).replace(
                            /\B(?=(\d{3})+(?!\d))/g,
                            ".");
                        var formattedTotalTagihanBulanan = 'Rp. ' + totalTagihanBulanan.toFixed(0).replace(
                            /\B(?=(\d{3})+(?!\d))/g,
                            ".");
                        hitungTagihan('tagihan1', formattedTotalTagihanBulanan);
                        hitungTagihan('tagihan2', formattedTotalTagihanBulanan);
                        hitungTagihan('tagihan3', formattedTotalTagihanBulanan);
                        hitungTagihan('tagihan4', formattedTotalTagihanBulanan);
                        hitungTagihan('tagihan5', formattedTotalTagihanBulanan);
                        hitungTagihan('tagihan6', formattedTotalTagihanBulanan);
                        hitungTagihan('tagihan7', formattedTotalTagihanBulanan);
                        hitungTagihan('tagihan8', formattedTotalTagihanBulanan);
                        hitungTagihan('tagihan9', formattedTotalTagihanBulanan);
                        hitungTagihan('tagihan10', formattedTotalTagihanBulanan);
                        hitungTagihan('tagihan11', formattedTotalTagihanBulanan);
                        hitungTagihan('tagihan12', formattedTotalTagihanBulanan);
                        hitungTagihan('totalTagihan', formattedTotalTagihan);
                        hitungTagihan('sisaTagihan', formattedTotalTagihan);
                    } else {
                        alert('Nilai tarif bulanan tidak valid. Harap masukkan angka.');
                    }
                } else {
                    alert('Harap masukkan nilai tarif bulanan yang valid.');
                }
            }
        });

        // Fungsi untuk menghitung dan mengisi nilai tagihan pada form-tagihan tertentu
        function hitungTagihan(tagihanId, tarifBulanan) {
            var tagihanField = document.getElementById(tagihanId);
            // Hitung tagihan berdasarkan tarif bulanan
            var tagihan = tarifBulanan; // Contoh: tagihan setahun
            // Set nilai field-tagihan
            tagihanField.value = tagihan; // Format nilai menjadi dua angka di belakang koma
        }
    </script>
@endsection
