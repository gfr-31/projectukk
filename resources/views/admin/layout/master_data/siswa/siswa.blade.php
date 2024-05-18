@extends('admin.main')
@section('siswa')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Siswa
                    <a class=" btn btn-primary btn-sm text-white" href="/admin/tambah/siswa">
                        <i class=" fa fa-plus"></i>
                        Tambah
                    </a>
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Master Data</li>
                    <li class="breadcrumb-item active">Siswa</li>
                </ol>
            </div>
        </div>

        <div class="card card-blue card-outline mt-3">
            {{-- <div class="card-header">
                <div class="card-tools ">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" id="searchInput" class="form-control float-right"
                            placeholder="Search">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="card-body table-responsive ">
                {{-- <table id="myTable" class="table table-hover text-nowrap"> --}}
                <table id="example" class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Nis</th>
                            <th>
                                <center>Nama</center>
                            </th>
                            <th>
                                <center>Kelas</center>
                            </th>
                            <th>
                                <center>Nama Ibu Kandung</center>
                            </th>
                            <th>
                                <center>
                                    Aksi
                                </center>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0; ?>
                        @foreach ($siswa as $s)
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td>{{ $s->nis }}</td>
                                <td>
                                    <center>{{ $s->nama_lengkap }}</center>
                                </td>
                                @if ($s && $s->kelas)
                                    <td>
                                        <center>{{ $s->kelas->kelas }}</center>
                                    </td>
                                @else
                                    <td>
                                        <center>
                                            <div class="btn-sm btn-danger"> <strong>Kelas Tidak Ada</strong> </div>
                                        </center>
                                    </td>
                                @endif
                                <td>
                                    <center>{{ $s->nama_ibu }}</center>
                                </td>
                                {{-- <td>{{ $s-> }}</td> --}}
                                <td>
                                    <center>
                                        <a href="/admin/edit/siswa{{ $s->id }}" type="button"
                                            class="btn btn-success btn-sm">
                                            <i class="fa fa-pencil"></i>
                                            Edit
                                        </a>
                                        |
                                        {{-- <a href="/admin/siswa/hapus {{ $s->id }}" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </a> --}}
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#konfirmasiModal{{ $s->id }}"
                                            id="hapusButton{{ $s->id }}" onclick="submitDelete({{ $s->id }})">
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
    @foreach ($siswa as $jp)
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
                        <button type="button" class="btn btn-secondary btn-sm mx-1" data-dismiss="modal"
                            onclick="batal({{ $jp->id }})">Batal</button>
                        <button type="button" onclick="submitForm({{ $jp->id }})" class="btn btn-danger btn-sm "
                            id="confirmButton{{ $jp->id }}" disabled>
                            <i class=" fa fa-trash"></i> Hapus
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{-- DataTabel --}}
    <script src="{{ asset('jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('dataTable/dataTables.js') }}"></script>
    <script src="{{ asset('dataTable/dataTables.bootstrap5.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('dataTable/dataTables.bootstrap5.css') }}">

    <script src="{{ asset('js/main/master_data/siswa/siswa.js') }}"></script>
    @if (session()->has('berhasilSiswa'))
        <script type="text/javascript">
            toastr.success('{{ session('berhasilSiswa') }}')
        </script>
    @endif
    @if (session()->has('berhasilUpdateSiswa'))
        <script type="text/javascript">
            toastr.success('{{ session('berhasilUpdateSiswa') }}')
        </script>
    @endif
    @if (session()->has('berhasilHapusSiswa'))
        <script type="text/javascript">
            toastr.success('{{ session('berhasilHapusSiswa') }}')
        </script>
    @endif
@endsection
