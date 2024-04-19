@extends('admin.main')
@section('posPembayaran')
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
                            <th >POS</th>
                            <th>Nama Pembayaran</th>
                            <th>Tipe</th>
                            <th>Tahun</th>
                            <th>Tarif Pembayaran</th>
                            <th>Aksi</th>
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
                                <td>{{ $jp->tahun_ajaran}}</td>
                                <td>
                                    <a href="/admin/tarif-pembayaran/{{ $jp->tahun_ajaran }}/{{ $jp->tipe }}/id={{ $jp->id }}/{{ $jp->nama_pembayaran }}" class=" btn btn-primary btn-sm">
                                        <i class=" fa fa-cog"></i> Tarif Pembayaran
                                    </a>
                                </td>
                                <td>
                                    {{-- <a href="/admin/edit/siswa{{ $jp->id }}" type="button"
                                                class="btn btn-success btn-sm">
                                                <i class="fa fa-pencil"></i>
                                                Edit
                                            </a>
                                    | --}}
                                    <a href="/admin/jenis-pembayaran/hapus{{ $jp->id }}"
                                        class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
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
