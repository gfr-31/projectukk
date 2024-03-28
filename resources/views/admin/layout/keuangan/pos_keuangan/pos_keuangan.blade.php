@extends('admin.main')
@section('posKeuangan')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Pos Keuangan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Data Keuangan</li>
                    <li class="breadcrumb-item active">POS Keuangan</li>
                </ol>
            </div>
        </div>
        <div class=" mb-3">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                <i class=" fa fa-plus"></i> Tambah
            </button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah POS</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/admin/tambah/pos-keuangan" method="post">
                            @csrf
                            <div class=" row">
                                <div class=" col-4">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">POS</label>
                                        <input type="text" class="form-control" id="recipient-name" id="input2"
                                            name="pos[]" placeholder="Nama POS" required>
                                    </div>
                                </div>
                                <div class=" col-8">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Keterangan</label>
                                        <input type="text" class="form-control" id="recipient-name" id="input2"
                                            name="keterangan[]" placeholder="Keterangan" required>
                                    </div>
                                </div>
                                <div class=" col-3">
                                    <div class=" form-group">
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- Area untuk menambahkan dan menghapus inputan -->
                            <div id="dynamicInputs"></div <div>
                            <a type="submit" class="btn btn-primary btn-sm mb-3" onclick="addInput()">
                                <i class=" fa fa-plus "></i> Tambah Inputan
                            </a>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-sm">Tambah</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Modal Edit --}}
        @foreach ($pos as $p)
            <div class="modal fade" id="exampleModalEdit{{ $p->id }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit POS</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="/admin/update/pos-keuangan" method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="hidden" name="id" value="{{ $p->id }}">
                                    <div class=" row">
                                        <div class=" col-3">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">POS</label>
                                                <input type="text" class="form-control" id="recipient-name"
                                                    id="input2" name="pos" placeholder="Nama POS" required
                                                    value="{{ $p->pos }}">
                                            </div>
                                        </div>
                                        <div class=" col-6">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Keterangan</label>
                                                <input type="text" class="form-control" id="recipient-name"
                                                    id="input2" name="keterangan" placeholder="Keterangan" required
                                                    value="{{ $p->keterangan }}">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger btn-sm"
                                        data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success btn-sm">Edit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="card">
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Nama Pos</th>
                            <th>Keterangan</th> 
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0; ?>
                        @foreach ($pos as $p)
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td>{{ $p->pos }}</td>
                                <td>{{ $p->keterangan }}</td>
                                <td>
                                    <a href="/admin/pos-keuangan/{{ $p->id }}" data-toggle="modal"
                                        data-target="#exampleModalEdit{{ $p->id }}" type="button"
                                        class="btn btn-success btn-sm">
                                        <i class="fa fa-pencil"></i>
                                        Edit
                                    </a>
                                    {{-- <button type="button" class="btn btn-sm btn-success btn-lg" data-toggle="modal"
                                            data-target="#myModal">
                                            <i class="fa fa-pencil"></i>
                                            Edit
                                        </button> --}}
                                    |
                                    <a href="/admin/pos-keuangan/hapus/{{ $p->id }}" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/main/keuangan/pos_keuangan/pos_keuangan.js') }}"></script>

    @if (session()->has('berhasilPos'))
        <script type="text/javascript">
            toastr.success('{{ session('berhasilPos') }}')
        </script>
    @endif
    @if (session()->has('berhasilHapusPos'))
        <script type="text/javascript">
            toastr.success('{{ session('berhasilHapusPos') }}')
        </script>
    @endif
    @if (session()->has('berhasilUpdatePos'))
        <script type="text/javascript">
            toastr.success('{{ session('berhasilUpdatePos') }}')
        </script>
    @endif
@endsection
