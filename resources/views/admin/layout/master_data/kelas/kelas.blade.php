@extends('admin.main')
@section('kelas')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Kelas
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                        <i class=" fa fa-plus"></i> Tambah
                    </button>
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Maseter Data</li>
                    <li class="breadcrumb-item active">Kelas</li>
                </ol>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Kelas</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/admin/tambah/kelas" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Kelas</label>
                                <input type="text" class="form-control" id="recipient-name" id="input2" name="kelas[]"
                                    placeholder="Ex. 7-A" required>
                            </div>
                            <!-- Area untuk menambahkan dan menghapus inputan -->
                            <div id="dynamicInputs"></div <div>
                            <button type="submit" class="btn btn-primary btn-sm mb-3" onclick="addInput()">
                                <i class=" fa fa-plus "></i> Tambah Inputan
                            </button>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-sm">Tambah</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Edit --}}
    @foreach ($kelas as $k)
        <div class="modal fade" id="exampleModalEdit{{ $k->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Kelas</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/admin/update/kelas" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="id" value="{{ $k->id }}">
                                <label for="recipient-name" class="col-form-label">Kelas</label>
                                <input type="text" class="form-control" id="recipient-name" name="kelas"
                                    value="{{ $k->kelas }}" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success btn-sm">Edit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <div class="card card-blue card-outline mt-3">
        {{-- <div class="card-header">
            <!-- Button trigger modal -->

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
        <div class="card-body table-responsive">
            <table id="example" class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th style="width: 10px">No</th>
                        <th> Kelas</th>
                        <th>
                            <center>ID Kelas</center>
                        </th>
                        <th>
                            <center>Tanggal Dibuat</center>
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
                    @foreach ($kelas as $k)
                        <tr>
                            <td>{{ ++$no }}</td>
                            @if ($k->kelas == 'Lulus')
                                <td>
                                    <button class=" btn btn-sm btn-danger">
                                        <b>{{ $k->kelas }}</b>
                                    </button>
                                </td>
                            @else
                                <td>{{ $k->kelas }}</td>
                            @endif
                            <td>
                                <center>{{ $k->id }}</center>
                            </td>
                            <td>
                                <center>{{ $k->created_at }}</center>
                            </td>
                            <td>
                                <center>
                                    <a href="/admin/edit/kelas{{ $k->id }}/up" class=" btn btn-primary btn-sm">
                                        <i class=" fa fa-arrow-up"></i> Up
                                    </a>
                                    |
                                    <a href="{{ $k->id }}" data-toggle="modal"
                                        data-target="#exampleModalEdit{{ $k->id }}" type="button"
                                        class="btn btn-success btn-sm">
                                        <i class="fa fa-pencil"></i>
                                        Edit
                                    </a>
                                    |
                                    {{-- <a href="/admin/kelas/hapus {{ $k->id }}" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </a> --}}
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#konfirmasiModal{{ $k->id }}"
                                        id="hapusButton{{ $k->id }}" onclick="submitDelete({{ $k->id }})">
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
    @foreach ($kelas as $ta)
        <!-- Modal Konfirmasi -->
        <div class="modal fade" id="konfirmasiModal{{ $ta->id }}" tabindex="-1" role="dialog"
            aria-labelledby="konfirmasiModalLabel{{ $ta->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header m-0">
                        <h5 class="modal-title" id="konfirmasiModalLabel{{ $ta->id }}">Konfirmasi Menghapus Data
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body ">
                        Apakah Anda Yakin Untuk Menghapus Data Ini?
                    </div>
                    <div class=" modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm mx-1" data-dismiss="modal"
                            onclick="batal({{ $ta->id }})">Batal</button>
                        <button type="button" onclick="submitForm({{ $ta->id }})" class="btn btn-danger btn-sm "
                            id="confirmButton{{ $ta->id }}" disabled>
                            <i class=" fa fa-trash"></i> Hapus
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <script src="{{ asset('jquery-3.7.1.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    {{-- DataTabel --}}
    <script src="{{ asset('dataTable/dataTables.js') }}"></script>
    <script src="{{ asset('dataTable/dataTables.bootstrap5.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('dataTable/dataTables.bootstrap5.css') }}">

    <script src="{{ asset('js/main/master_data/kelas/kelas.js') }}"></script>
    @if ($errors->any())
        <script type="text/javascript">
            toastr.success(`
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach`)
        </script>
    @endif
    @if (session()->has('berhasilKelas'))
        <script type="text/javascript">
            toastr.success('{{ session('berhasilKelas') }}')
        </script>
    @endif
    @if (session()->has('gagalKelas'))
        <script type="text/javascript">
            toastr.error('{{ session('gagalKelas') }}')
        </script>
    @endif
    @if (session()->has('berhasilHapusKelas'))
        <script type="text/javascript">
            toastr.success('{{ session('berhasilHapusKelas') }}')
        </script>
    @endif
    @if (session()->has('berhasilUpdateKelas'))
        <script type="text/javascript">
            toastr.success('{{ session('berhasilUpdateKelas') }}')
        </script>
    @endif
@endsection
