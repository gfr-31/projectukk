@extends('admin.main')
@section('jenisPembayaran')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Jenis Pembayaran</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Data Keuangan</li>
                    <li class="breadcrumb-item active">Jenis Pembayaran</li>
                </ol>
            </div>
        </div>
        <div class=" mb-3">
            <a class=" btn btn-primary btn-sm text-white" href="/admin/tambah-jenis-pembayaran">
                <i class=" fa fa-plus"></i>
                Tambah
            </a>
        </div>

        <div class="card">
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>POS</th>
                            <th>Nama Pembayaran</th>
                            <th>Tipe</th>
                            <th>Tahun</th>
                            <th>Tarif Pembayaran</th>
                            <th>
                                <center>Aksi</center>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0; ?>
                        @foreach ($jenis_pembayaran as $jp)
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td>{{ $jp->pos }}</td>
                                <td>{{ $jp->nama_pembayaran }}</td>
                                <td>{{ $jp->tipe }}</td>
                                <td>{{ $jp->tahun_ajaran }}</td>
                                <td>
                                    <a href="/admin/tarif-pembayaran/{{ $jp->tahun_ajaran }}/{{ $jp->tipe }}/id={{ $jp->id }}/{{ $jp->nama_pembayaran }}"
                                        class=" btn btn-primary btn-sm">
                                        <i class=" fa fa-cog"></i> Tarif Pembayaran
                                    </a>
                                </td>
                                <td>
                                    <center>
                                        <a href="/admin/edit-jenis-pembayaran/{{ $jp->id }}" type="button"
                                            class="btn btn-success btn-sm">
                                            <i class="fa fa-pencil"></i>
                                            Edit
                                        </a>
                                        |
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#konfirmasiModal{{ $jp->id }}"
                                            id="hapusButton{{ $jp->id }}"
                                            onclick="submitDelete({{ $jp->id }})">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </center>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @foreach ($jenis_pembayaran as $jp)
        <!-- Modal Konfirmasi -->
        <div class="modal fade" id="konfirmasiModal{{ $jp->id }}" tabindex="-1" role="dialog"
            aria-labelledby="konfirmasiModalLabel{{ $jp->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header m-0">
                        <h5 class="modal-title" id="konfirmasiModalLabel{{ $jp->id }}">Konfirmasi Menghapus Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body ">
                        Apakah Anda Yakin Untuk Menghapus Data?
                    </div>
                    <div class=" modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm mx-1" data-dismiss="modal" onclick="batal({{ $jp->id }})">Batal</button>
                        <button type="button" onclick="submitForm({{ $jp->id }})" class="btn btn-danger btn-sm "
                            id="confirmButton{{ $jp->id }}" disabled>
                            <i class=" fa fa-trash"></i> Hapus
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <script>
        function batal(jpId) {
            document.getElementById("confirmButton" + jpId).setAttribute("disabled", "disabled")
        }
        function submitForm(jpId) {
            // Ganti window.location.href dengan URL halaman yang ingin Anda tuju
            window.location.href = "/admin/jenis-pembayaran/hapus" + jpId;
        }

        function submitDelete(jpId) {
            // console.log(jpId);
            setTimeout(function() {
                // document.getElementById("perbaharuiButton").removeAttribute("disabled");
                document.getElementById("confirmButton" + jpId).removeAttribute("disabled");
            }, 3000);
        }
    </script>

    @if (session()->has('berhasilPosPembayaran'))
        <script type="text/javascript">
            toastr.success('{{ session('berhasilPosPembayaran') }}')
        </script>
    @endif
    @if (session()->has('berhasilUpdateJenisPembayaran'))
        <script type="text/javascript">
            toastr.success('{{ session('berhasilUpdateJenisPembayaran') }}')
        </script>
    @endif
@endsection
