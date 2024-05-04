@extends('admin.main')
@section('siswa')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Siswa</h1>
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
            <div class="card-header">
                <a class=" btn btn-primary btn-sm text-white" href="/admin/tambah/siswa">
                    <i class=" fa fa-plus"></i>
                    Tambah
                </a>
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
            </div>
            <div class="card-body table-responsive p-0">
                <table id="myTable" class="table table-hover text-nowrap">
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
                                        <a href="/admin/siswa/hapus {{ $s->id }}" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </center>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

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
