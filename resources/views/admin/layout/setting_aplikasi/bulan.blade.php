@extends('admin.main')
@section('bulan')
    <div class=" container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Bulan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Setting Aplikasi</li>
                    <li class="breadcrumb-item active">Data Bulan</li>
                </ol>
            </div>
        </div>

        <div class=" card">
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Nama Bulan</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <?php $no = 0; ?>
                    @foreach ($bulan as $b)
                        <tbody>
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td>{{ $b->bulan }}</td>
                                <td>
                                    <a href="/admin/edit/bulan{{ $b->id }}" type="button"
                                        class="btn btn-success btn-sm">
                                        <i class="fa fa-pencil"></i>
                                        Edit
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
