@extends('admin.main')
@section('tarifPembayaranBebas')
    <div class=" container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tarif Pembayaran Bebas</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Data Keuangan</li>
                    <li class="breadcrumb-item active"><a href="/admin/pos_pembayaran">Jenis Pembayaran</a></li>
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
                @foreach ($jp as $jp)
                    <p class=" mt-2">Tarif - {{ $jp->nama_pembayaran }}</p>
                    {{-- @endforeach --}}
                    {{-- <p>Tarif - Uang Gedung - T.A 2023/2024</p> --}}
                    <div class=" row ml-5">
                        <div class=" col-6">
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
                        <div class=" col-6 ">
                            <div class=" form-group float-right mr-3">
                                <div class="row align-items-center">
                                    <label for="" class=" col-form-label mr-3">Tambah Tarif</label>
                                    <a href="/admin/tambah/tarif-pembayaran/{{ $jp->tahun_ajaran }}/{{ $jp->tipe }}/id={{ $jp->id }}"
                                        class="btn btn-primary col-auto btn-sm">
                                        <i class=" fa fa-plus"></i> Berdasarkan Kelas
                                    </a>
                                    <a data-toggle="modal" data-target="#popupModal" class="btn btn-primary btn-sm ml-2">
                                        <i class="fa fa-plus"></i> Berdasarkan Siswa
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <div class="card card-blue card-outline">
            <div class="card-header">
                <div class=" float-left">
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" id="searchInput" class="form-control" placeholder="Search">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal"
                    data-target="#konfirmasiModal" id="perbaharuiButton">
                    <i class="fa fa-cog"></i> Edit Berdasarkan Kelas
                </button>
            </div>
            <div class="card-body table-responsive p-0">
                <table id="myTable" class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Tarif</th>
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
                                <td>{{ $t->siswa->nis }}</td>
                                <td>{{ $t->siswa->nama_lengkap }}</td>
                                <td>{{ $t->siswa->kelas->kelas }}</td>
                                <td>{{ 'Rp. ' . number_format((float) $t->tarif, 0, ',', '.') }}</td>
                                <td>
                                    <center>
                                        <a href="/admin/edit/tarif-pembayaran/{{ $t->tipe }}/{{ $t->id }}"
                                            type="button" class="btn btn-success btn-sm">
                                            <i class="fa fa-pencil"></i>
                                            Edit
                                        </a>
                                        |
                                        {{-- <a href="/admin/tarif-pembayaran-bebas/{{ $t->tahun_ajaran }}/hapus{{ $t->id }}"
                                            class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </a> --}}
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
                                            <div class="form-select">
                                                <select class="form-control" name="kelas"
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
                            <h5 class="modal-title" id="konfirmasiModalLabel">Apakah Anda Yakin Untuk Memperbarui Data?
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
                        @foreach ($tpb as $t)
                            <form
                                action="/admin/edit/tarif-pembayaran/kelas/{{ $jp->tahun_ajaran }}/{{ $jp->tipe }}/{{ $t->nama_pembayaran }}"
                                method="get">
                        @endforeach
                        <div class="modal-body">
                            {{-- Kelas --}}
                            <div class=" mx-3">
                                <div class=" col-12">
                                    <div class="row align-items-center">
                                        @foreach ($tpb as $t)
                                            <input type="hidden" value="{{ $t->nama_pembayaran }}"
                                                name="nama_pembayaran">
                                        @endforeach
                                        <div class=" col-2">
                                            <label for="" class=" col-form-label">Kelas</label>
                                        </div>
                                        <div class=" col-10">
                                            <div class="form-select">
                                                <select class="form-control" name="kelas"
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
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Tutup</button>
                            <button href="submit" class="btn btn-success btn-sm">Lanjut Edit Data</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach ($tpb as $t)
        <!-- Modal Konfirmasi Delete -->
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
                        <button type="button" onclick="submitForm('{{ $t->id }}', '{{ $t->tahun_ajaran }}')"
                            class="btn btn-danger btn-sm " id="confirmButton{{ $t->id }}" disabled>
                            <i class=" fa fa-trash"></i> Hapus
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <script>
        // /admin/tarif-pembayaran-bebas/{{ $t->tahun_ajaran }}/hapus{{ $t->id }}
        function submitDelete(jpId) {
            // console.log(jpId);
            setTimeout(function() {
                // document.getElementById("perbaharuiButton").removeAttribute("disabled");
                document.getElementById("confirmButton" + jpId).removeAttribute("disabled");
            }, 3000);
        }

        function submitForm(jpId, jpTa) {
            // Ganti window.location.href dengan URL halaman yang ingin Anda tuju
            window.location.href = "/admin/tarif-pembayaran-bebas/" + jpTa + "/hapus" + jpId;
            // console.log(jpId);
        }

        function batal(jpId) {
            document.getElementById("confirmButton" + jpId).setAttribute("disabled", "disabled")
            // console.log(jpId);
        }
    </script>

    <script src="{{ asset('js/main/keuangan/tarif_pembayaran/tarif_pembayaran_bebas.js') }}"></script>
    @endforeach
    @yield('toastr')
    @if (session()->has('tidakAda'))
        <script type="text/javascript">
            toastr.warning('{{ session('tidakAda') }}', "", {
                "closeButton": true,
                "timeOut": 2500,
            });
        </script>
    @endif
@endsection
