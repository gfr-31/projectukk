@extends('admin.main')
@section('dataInformasi')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Informasi</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Data Master</li>
                    <li class="breadcrumb-item active">Data Informasi</li>
                </ol>
            </div>
        </div>
        <div class=" mb-3">
            <a class=" btn btn-primary btn-sm text-white" href="/admin/data/tambah_data">
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
                            <th>Judul</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    </tbody>
                    <?php $no = 0; ?>
                    @foreach ($data_informasi as $d)
                        <tr>
                            <td>{{ ++$no }}</td>
                            <td>{{ $d->judul }}</td>
                            <td>{{ $d->tanggal }}</td>
                            <td>{{ $d->status }}</td>

                            <td>
                                <a href="/admin/edit/informasi{{ $d->id }}" type="button"
                                    class="btn btn-success btn-sm">
                                    <i class="fa fa-pencil"></i>
                                    Edit
                                </a>
                                |
                                <a href="/admin/data/hapus{{ $d->id }}" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    @if (session()->has('berhasilPosPembayaran'))
        <script type="text/javascript">
            toastr.success('{{ session('berhasilPosPembayaran') }}')
        </script>
    @endif
@endsection
