@extends('admin.main')
@section('tahunAjaran')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tahun Ajaran</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Master Data</li>
                    <li class="breadcrumb-item active">Tahun Ajaran</li>
                </ol>
            </div>
        </div>

        <div class="card card-blue card-outline mt-3">
            <div class="card-header">
                <a class=" btn btn-primary btn-sm text-white" href="tambah/tahun-ajaran">
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
                            <th>Tahun Ajaran</th>
                            <th>Keterangan</th>
                            <th>
                                <center>
                                    Opsi
                                </center>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0; ?>
                        @foreach ($tahun_ajaran as $ta)
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td>{{ $ta->tahun_ajaran }}</td>
                                <td>{{ $ta->keterangan }}</td>
                                <td>
                                    <center>
                                        <a href="/admin/edit/tahun-ajaran{{ $ta->id }}" type="button"
                                            class="btn btn-success btn-sm">
                                            <i class="fa fa-pencil"></i>
                                            Edit
                                        </a>
                                        |
                                        <a href="/admin/tahun-ajaran/hapus {{ $ta->id }}"
                                            class="btn btn-danger btn-sm">
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

        <script src="{{ asset('js/main/master_data/tahun_ajaran/tahun_ajaran.js') }}"></script>

        @if (session()->has('berhasil'))
            <script type="text/javascript">
                toastr.success('{{ session('berhasil') }}')
            </script>
        @endif
        @if (session()->has('berhasilHapus'))
            <script type="text/javascript">
                toastr.success('{{ session('berhasilHapus') }}')
            </script>
        @endif
        @if (session()->has('berhasilUpdateTh'))
            <script type="text/javascript">
                toastr.success('{{ session('berhasilUpdateTh') }}')
            </script>
        @endif
    @endsection
