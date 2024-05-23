@extends('admin.main')
@section('tarifPembayaranBulanan')
    @foreach ($jp as $jp)
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tarif Pembayaran Bulanan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Data Keuangan</li>
                        <li class="breadcrumb-item active"><a href="/admin/jenis-pembayaran">Jenis Pembayaran</a></li>
                        <li class="breadcrumb-item active">Setting Tarif</li>
                    </ol>
                </div>
                <div class="col-12">
                    <a href="/admin/jenis-pembayaran" class=" btn btn-danger btn-sm" style="float: right">
                        <i class=" fa fa-reply"></i> Kembali
                    </a>
                </div>
            </div>
            <div class=" card card-blue card-outline">
                <div class=" ml-2">
                    <p class=" mt-2">Tarif - {{ $jp->pos }} - T.A {{ $jp->tahun_ajaran }}</p>
                    {{-- @endforeach --}}
                    {{-- <p>Tarif - Uang Gedung - T.A 2023/2024</p> --}}
                    <div class=" row ml-5">
                        <div class=" col-4 ">
                            <div class=" form-group">
                                <div class="row align-items-center">
                                    <div class=" col-auto">
                                        <label for="" class=" col-form-label">Tahun</label>
                                    </div>
                                    <div class=" col-auto">
                                        <input class="form-control" type="text" name="" id=""
                                            value="{{ $jp->tahun_ajaran }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-8 ">
                            <div class="form-group justify-content-between  float-right mr-2">
                                <label for="" class="col-form-label mr-3">Tambah Tarif</label>
                                <a href="/admin/tambah/tarif-pembayaran/{{ $jp->tahun_ajaran }}/{{ $jp->tipe }}/id={{ $jp->id }}"
                                    class="btn btn-primary btn-sm mr-1">
                                    <i class="fa fa-plus"></i> Berdasarkan Kelas
                                </a>
                                |
                                <a data-toggle="modal" data-target="#popupModal" class="btn btn-primary btn-sm">
                                    <i class="fa fa-plus"></i> Berdasarkan Siswa
                                </a>
                                |
                                <button type="button" class="btn btn-success btn-sm " data-toggle="modal"
                                    data-target="#konfirmasiModal" id="perbaharuiButton">
                                    <i class="fa fa-cog"></i> Edit Berdasarkan Kelas
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="card card-blue card-outline">
                <div class="card-body table-responsive ">
                    {{-- <table id="myTable" class="table table-hover text-nowrap"> --}}
                    <table id="example" class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th style="width: 10px">No</th>
                                <th class=" text-left">NIS</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Tagihan</th>
                                <th>
                                    <center>Aksi</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0; ?>
                            @foreach ($tpb as $t)
                                <tr>
                                    <td>{{ ++$no }}</td>
                                    <td class=" text-left">{{ $t->siswa->nis }}</td>
                                    <td>{{ $t->siswa->nama_lengkap }}</td>
                                    @if ($t->kelas->kelas == 'Lulus')
                                        <td>
                                            <button class=" btn btn-danger btn-sm">
                                                {{ $t->kelas->kelas }}
                                            </button>
                                        </td>
                                    @else
                                        <td>{{ $t->kelas->kelas }}</td>
                                    @endif
                                    <td>{{ 'Rp. ' . number_format((float) $t->tagihan, 0, ',', '.') }}</td>
                                    <td>
                                        <center>
                                            <a href="/admin/edit/tarif-pembayaran/{{ $t->tipe }}/{{ $t->id }}"
                                                type="button" class="btn btn-success btn-sm">
                                                <i class="fa fa-pencil"></i>
                                                Edit
                                            </a>
                                            |
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#konfirmasiModal{{ $t->id }}"
                                                id="hapusButton{{ $t->id }}"
                                                onclick="submitDelete({{ $t->id }})">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </center>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="modal fade" id="popupModal" tabindex="-1" role="dialog" aria-labelledby="popupModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="popupModalLabel"> Pilih Kelas Yang Diinginkan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @foreach ($kelas as $k)
                                <form
                                    action="/admin/tambah/tarif-pembayaran/siswa/{{ $jp->tahun_ajaran }}/{{ $jp->tipe }}/{{ $jp->nama_pembayaran }}"
                                    method="get">
                            @endforeach
                            <div class="modal-body">
                                {{-- Kelas --}}
                                <div class=" mx-3">
                                    <div class=" col-12">
                                        <div class="row align-items-center">
                                            <div class=" col-2">
                                                <label for="" class=" col-form-label">Kelas</label>
                                            </div>
                                            <div class=" col-10">
                                                <div class="">
                                                    <select class="form-select" name="kelas"
                                                        aria-label="Default select example" required>
                                                        <option value="" class=" text-center" selected>-- Kelas --
                                                        </option>
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
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Tutup</button>
                                <button href="submit" class="btn btn-success btn-sm">Lanjut Tambah Data</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Modal Konfirmasi -->
                <div class="modal fade" id="konfirmasiModal" tabindex="-1" role="dialog"
                    aria-labelledby="konfirmasiModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header m-0">
                                <h5 class="modal-title" id="konfirmasiModalLabel">Apakah Anda Yakin Untuk Memperbarui
                                    Data?
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body " style="color: red">
                                <b>
                                    Apakah Anda Yakin Untuk Melanjutkannya?
                                </b>
                                <div class=" mt-2 text-center">
                                    <button type="button" class="btn btn-danger btn-sm mx-1"
                                        data-dismiss="modal">Batal</button>
                                    <button type="button" class="btn btn-primary btn-sm"data-toggle="modal"
                                        data-target="#popupModalEditKelas" data-dismiss="modal">
                                        <i class="fa fa-save"></i> Lanjut
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="popupModalEditKelas" tabindex="-1" role="dialog"
                    aria-labelledby="popupModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="popupModalLabel"> Pilih Kelas Yang Diinginkan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @foreach ($kelas as $k)
                                <form
                                    action="/admin/edit/tarif-pembayaran/kelas/{{ $jp->tahun_ajaran }}/{{ $jp->tipe }}/{{ $jp->nama_pembayaran }}"
                                    method="get">
                            @endforeach
                            <div class="modal-body">
                                {{-- Kelas --}}
                                <div class=" mx-3">
                                    <div class=" col-12">
                                        <div class="row align-items-center">
                                            <div class=" col-2">
                                                <label for="" class=" col-form-label">Kelas</label>
                                            </div>
                                            <div class=" col-10">
                                                <div class="">
                                                    <select class="form-select" name="kelas"
                                                        aria-label="Default select example" required>
                                                        <option value="" class="text-center" selected>-- Kelas --
                                                        </option>
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
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Tutup</button>
                                <button href="submit" class="btn btn-success btn-sm">Lanjut Edit Data</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            @foreach ($tpb as $t)
                <!-- Modal Konfirmasi -->
                <div class="modal fade" id="konfirmasiModal{{ $t->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="konfirmasiModalLabel{{ $t->id }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header m-0">
                                <h5 class="modal-title" id="konfirmasiModalLabel{{ $t->id }}">Konfirmasi Menghapus
                                    Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body ">
                                Apakah Anda Yakin Untuk Menghapus Data?
                            </div>
                            <div class=" modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm mx-1" data-dismiss="modal"
                                    onclick="batal('{{ $t->id }}')">Batal</button>
                                <button type="button"
                                    onclick="submitForm('{{ $t->id }}', '{{ $t->tahun_ajaran }}')"
                                    class="btn btn-danger btn-sm " id="confirmButton{{ $t->id }}" disabled>
                                    <i class=" fa fa-trash"></i> Hapus
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
    {{-- DataTabel --}}
    <script src="{{ asset('jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('dataTable/dataTables.js') }}"></script>
    <script src="{{ asset('dataTable/dataTables.bootstrap5.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('dataTable/dataTables.bootstrap5.css') }}">

    <script src="{{ asset('js/main/keuangan/tarif_pembayaran/tarif_pembayaran_bulanan.js') }}"></script>
    <script>
        function submitDelete(jpId) {
            // console.log(jpId);
            setTimeout(function() {
                // document.getElementById("perbaharuiButton").removeAttribute("disabled");
                document.getElementById("confirmButton" + jpId).removeAttribute("disabled");
            }, 3000);
        }

        function submitForm(jpId, jpTa) {
            // Ganti window.location.href dengan URL halaman yang ingin Anda tuju
            window.location.href = "/admin/tarif-pembayaran-bulanan/" + jpTa + "/hapus" + jpId;
            // console.log(jpId);
        }

        function batal(jpId) {
            document.getElementById("confirmButton" + jpId).setAttribute("disabled", "disabled")
            // console.log(jpId);
        }
    </script>
    @yield('toastr')
    @if (session()->has('tidakAda'))
        <script type="text/javascript">
            toastr.error('{{ session('tidakAda') }}')
        </script>
    @endif
    @if (session()->has('berhasilTTPBulanan'))
        <script type="text/javascript">
            toastr.success('{{ session('berhasilTTPBulanan') }}')
        </script>
    @endif
@endsection
