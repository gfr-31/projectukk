@extends('siswa.main_siswa')
@section('tagihan')
    <div class=" card card-olive card-outline">
        <div class=" text-center">
            <label class=" mt-2 " for="" style="font-size: 20px">Tagihan Pembayaran</label>
            <ul class="nav mb-1">
                <li class="nav-item">
                    <a href="#" id="bulanan_link">
                        <p class="ml-3 mt-2 h6"><strong>Bulanan</strong></p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" id="bebas_link">
                        <p class="ml-3 mt-2 h6"><strong>Bebas</strong></p>
                    </a>
                </li>
                <li class="nav-item ml-auto">
                    <a href="/cetak-tagihan/{{ auth('siswa')->user()->id }}" class="btn btn-danger btn-sm mr-2" target="_blank">
                        <i class="fa fa-print"></i> 
                    </a>
                </li>
                <li class="nav-item mr-1">
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" id="searchInput" class="form-control float-right" placeholder="Search">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>            

            <div id="bulanan" class="table-responsive custom-table-responsive" style="height: 250px">
                <table class="table custom-table">
                    @if ($tpBulanan->isEmpty())
                        <thead>
                            <tr>
                                <th>Data Transaksi Tidak Ada</th>
                            </tr>
                        </thead>
                    @else
                        <thead>
                            <tr>
                                <th>No </th>
                                <th style="text-align: left">Nama Pembayaran</th>
                                <th style="text-align: left">
                                    <center>Tagihan</center>
                                </th>
                                <th style="text-align: left">
                                    <center>Sisa Tagihan</center>
                                </th>
                            </tr>
                        </thead>
                        <?php $no = 1; ?>
                        @foreach ($tpBulanan as $t)
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td style="text-align: left">{{ $t->nama_pembayaran }}</td>
                                <td style="text-align: left">
                                    <center>
                                        {{ 'Rp. ' . number_format((float) $t->tagihan, 0, ',', '.') }}
                                    </center>
                                </td>
                                <td style="text-align: left">
                                    <center>
                                        @if ($t->sisa_tagihan == '0')
                                            <div class=" btn-primary rounded">
                                                <strong>
                                                    Sudah Lunas
                                                </strong>
                                            </div>
                                        @elseif($t->sisa_tagihan)
                                            {{ 'Rp. ' . number_format((float) $t->sisa_tagihan, 0, ',', '.') }}
                                        @endif
                                    </center>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </table>
            </div>

            <div id="bebas" class="table-responsive custom-table-responsive" style="height: 250px">
                <table class="table custom-table">
                    <thead>
                        <tr>
                            <th>No </th>
                            <th style="text-align: left">Nama Pembayaran</th>
                            <th style="text-align: left">
                                <center>Tagihan</center>
                            </th>
                            <th style="text-align: left">
                                <center>Sisa Tagihan</center>
                            </th>
                        </tr>
                    </thead>
                    <?php $no = 1; ?>
                    @foreach ($tpBebas as $t)
                        <tbody>
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td style="text-align: left">{{ $t->nama_pembayaran }}</td>
                                <td style="text-align: left">
                                    <center>{{ 'Rp. ' . number_format((float) $t->tarif, 0, ',', '.') }}
                                    </center>
                                </td>
                                <td style="text-align: left">
                                    <center>
                                        @if ($t->sisa_tagihan == '0')
                                            <div class=" btn-primary rounded">
                                                <strong>
                                                    Sudah Lunas
                                                </strong>
                                            </div>
                                        @elseif($t->sisa_tagihan)
                                            {{ 'Rp. ' . number_format((float) $t->sisa_tagihan, 0, ',', '.') }}
                                        @endif
                                    </center>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    <div class=" card card-olive card-outline">
        <div class="text-center">
            <label style="font-size: 20px" class=" mt-2">Transaksi Pembayaran</label>
            <ul class=" nav">
                <li class=" nav-item">
                    <a href="" id="bulanan_link2">
                        <p class="ml-3 mt-1 h6"><strong>Bulanan</strong></p>
                    </a>
                </li>
                <li class=" nav-item">
                    <a href="" id="bebas_link2">
                        <p class="ml-3 mt-1 h6"><strong>Bebas</strong></p>
                    </a>
                </li>
                <li class=" nav-item ml-auto mr-2 mb-2">
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" id="searchInput2" class="form-control float-right"
                                placeholder="Search">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>

            <div id="bulanan2" class="table-responsive custom-table-responsive" style="height: 250px">
                <table class="table custom-table">
                    @if ($t_bulanan->isEmpty())
                        <thead>
                            <tr>
                                <th>Data Transaksi Tidak Ada</th>
                            </tr>
                        </thead>
                    @else
                        <thead>
                            <tr>
                                <th>No </th>
                                <th style="text-align: left">Kode Transaksi</th>
                                <th style="text-align: left">Bulan</th>
                                <th style="text-align: left">
                                    <center>Tagihan</center>
                                </th>
                                <th style="text-align: left">
                                    <center>Sisa Tagihan</center>
                                </th>
                                <th>
                                    <center>Cetak</center>
                                </th>
                            </tr>
                        </thead>
                        <?php $no = 1; ?>
                        @foreach ($t_bulanan as $t)
                            <tbody>
                                <tr scope="row">
                                    <td>{{ $no++ }}</td>
                                    <td style="text-align: left">{{ $t->kode_transaksi }}</td>
                                    <td style="text-align: left">{{ ucfirst($t->bulan) }}</td>
                                    <td style="text-align: left">
                                        <center>{{ 'Rp. ' . number_format((float) $t->tagihan, 0, ',', '.') }}
                                        </center>
                                    </td>
                                    <td style="text-align: left">
                                        <center>
                                            {{ 'Rp. ' . number_format((float) $t->sisa_tagihan, 0, ',', '.') }}
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <a href="/bukti-pembayaran/{{ $t->tipe }}/{{ $t->nama_pembayaran }}/{{ $t->id }}"
                                                target="_blank" class=" btn btn-success btn-sm popover-trigger"
                                                id="popover-trigger-2-{{ $loop->index }}" data-toggle="popover"
                                                title="Lihat & Cetak PDF">
                                                <i class=" fa fa-print"></i>
                                            </a>
                                        </center>
                                    </td>
                                </tr>
                                <tr class="spacer">
                                    <td colspan="100"></td>
                                </tr>
                            </tbody>
                        @endforeach
                    @endif
                </table>
            </div>

            <div id="bebas2" class="table-responsive custom-table-responsive" style="height: 250px">
                <table class="table custom-table">
                    @if ($t_bebas->isEmpty())
                        <thead>
                            <tr>
                                <th>Data Transaksi Tidak Ada</th>
                            </tr>
                        </thead>
                    @else
                        <thead>
                            <tr>
                                <th>No </th>
                                <th style="text-align: left">Kode Transaksi</th>
                                <th style="text-align: left">Keterangan</th>
                                <th style="text-align: left">
                                    <center>Tagihan</center>
                                </th>
                                <th style="text-align: left">
                                    <center>Sisa Tagihan</center>
                                </th>
                                <th>
                                    <center>Cetak</center>
                                </th>
                            </tr>
                        </thead>
                        <?php $no = 1; ?>
                        @foreach ($t_bebas as $t)
                            <tbody>
                                <tr scope="row">
                                    <td>{{ $no++ }}</td>
                                    <td style="text-align: left">{{ $t->kode_transaksi }}</td>
                                    <td style="text-align: left">{{ $t->keterangan }}</td>
                                    <td style="text-align: left">
                                        <center>{{ 'Rp. ' . number_format((float) $t->tarif, 0, ',', '.') }}
                                        </center>
                                    </td>
                                    <td style="text-align: left">
                                        <center>
                                            {{ 'Rp. ' . number_format((float) $t->sisa_tagihan, 0, ',', '.') }}
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <a href="/bukti-pembayaran/{{ $t->tipe }}/{{ $t->nama_pembayaran }}/{{ $t->id }}"
                                                target="_blank" class=" btn btn-success btn-sm popover-trigger"
                                                id="popover-trigger-2-{{ $loop->index }}" data-toggle="popover"
                                                title="Lihat & Cetak PDF">
                                                <i class=" fa fa-print"></i>
                                            </a>
                                        </center>
                                    </td>
                                </tr>
                                <tr class="spacer">
                                    <td colspan="100"></td>
                                </tr>
                            </tbody>
                        @endforeach
                    @endif
                </table>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="{{ asset('css/siswa/owl.carousel.min.css') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/siswa/bootstrap.min.css') }}">
    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('css/siswa/style.css') }}">

    <script src=" {{ asset('jquery-3.7.1.min.js') }}"></script>
    <script src=" {{ asset('js/siswa/popper.min.js') }}"></script>
    <script src=" {{ asset('js/siswa/bootstrap.min.js') }}"></script>
    <script src=" {{ asset('js/siswa/main.js') }}"></script>
    <style>
        a {
            text-decoration: none;
            /* Menghapus garis bawah */
        }

        /* Gaya untuk hyperlink yang dipilih */
        a.selected {
            background-color: lightblue;
            /* Memberi latar belakang berwarna biru muda */
            color: black;
            /* Warna teks hitam */
            font-weight: bold;
            /* Teks tebal */
        }
    </style>

    <script src="{{ asset('js/main/pembayaran/tagihan.js') }}"></script>
    <script>
        function tampilkanDivTerakhir() {
            var jenisPembayaran = localStorage.getItem("jenis_pembayaran");

            if (jenisPembayaran === "bulanan") {
                // Tampilkan div untuk jenis pembayaran bulanan
                document.getElementById("bulanan").style.display = "block";
                // Sembunyikan div untuk jenis pembayaran bebas
                document.getElementById("bebas").style.display = "none";
            } else {
                // Tampilkan div untuk jenis pembayaran bebas
                document.getElementById("bulanan").style.display = "none";
                // Sembunyikan div untuk jenis pembayaran bulanan
                document.getElementById("bebas").style.display = "block";
            }
        }

        // Panggil fungsi untuk menampilkan div terakhir saat halaman dimuat
        tampilkanDivTerakhir();

        // Event listener untuk hyperlink "bulanan_link2"
        document.getElementById("bulanan_link").addEventListener("click", function(event) {
            event.preventDefault();
            // Simpan jenis pembayaran terpilih ke penyimpanan lokal
            localStorage.setItem("jenis_pembayaran", "bulanan");
            // Panggil fungsi untuk menampilkan div sesuai dengan jenis pembayaran yang dipilih
            tampilkanDivTerakhir();
        });

        // Event listener untuk hyperlink "bebas_link2"
        document.getElementById("bebas_link").addEventListener("click", function(event) {
            event.preventDefault();
            // Simpan jenis pembayaran terpilih ke penyimpanan lokal
            localStorage.setItem("jenis_pembayaran", "bebas");
            // Panggil fungsi untuk menampilkan div sesuai dengan jenis pembayaran yang dipilih
            tampilkanDivTerakhir();
        });
    </script>
@endsection
