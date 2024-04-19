@extends('admin.main')
@section('userAdmin')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">List User Admin</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Setting Aplikasi</li>
                    <li class="breadcrumb-item active">List User</li>
                </ol>
            </div>
        </div>

        <div class="card card-blue card-outline mt-3">
            <div class="card-header">
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                    <i class=" fa fa-plus"></i> Tambah
                </button>
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
                            <th>No</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Tanggal Pembuatan</th>
                            <th>Tanggal Pembaharuan</th>
                            {{-- <th>Status</th> --}}
                            <th>
                                <center>
                                    Aksi
                                </center>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0; ?>
                        @foreach ($admin as $a)
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td>{{ $a->name }}</td>
                                <td>{{ $a->email }}</td>
                                <td>{{ $a->created_at }}</td>
                                <td>{{ $a->updated_at }}</td>
                                <td>
                                    <center>
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                            data-target="#exampleModalEdit{{ $a->id }}">
                                            <i class="fa fa-pencil"></i> Edit
                                        </button>
                                        |
                                        <a href="/admin/list-user/hapus-user/{{ $a->id }}"
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
    </div>

    {{-- Model --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="card card-olive modal-content">
                <div class="card-header modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah User Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class=" modal-body">
                    <form class="form-horizontal" method="post" action="/admin/list-user/tambah-user">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputEmail3" placeholder="Username"
                                        name="username" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputEmail3" placeholder="Email"
                                        name="email" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="inputPassword3" placeholder="Password"
                                        name="password" required>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-default  btn-sm" data-dismiss="modal">Cancel</a>
                            <button type="submit" class="btn bg-olive float-right btn-sm">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Edit --}}
    @foreach ($admin as $a)
        <div class="modal fade" id="exampleModalEdit{{ $a->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog " role="document">
                <div class="card card-olive modal-content">
                    <div class="card-header modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit User Admin</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class=" modal-body">
                        <form class="form-horizontal" method="post" action="/admin/list-user/edit-user/{{ $a->id }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Username</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="inputEmail3"
                                            placeholder="Username" name="username" required value="{{ $a->name }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="inputEmail3" placeholder="Email"
                                            name="email" required value="{{ $a->email }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-3 col-form-label">Password</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="inputPassword3"
                                            placeholder="Password" name="password" required value="">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a class="btn btn-default  btn-sm" data-dismiss="modal">Cancel</a>
                                <button type="submit" class="btn bg-olive float-right btn-sm">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <script src="{{ asset('js/main/master_data/siswa/siswa.js') }}"></script>
    @if (session()->has('berhasilUser'))
        <script type="text/javascript">
            toastr.success('{{ session('berhasilUser') }}')
        </script>
    @endif
    @if (session()->has('userPenuh'))
        <script type="text/javascript">
            toastr.error('{{ session('userPenuh') }}')
        </script>
    @endif
    @if (session()->has('bHapusUser'))
        <script type="text/javascript">
            toastr.success('{{ session('bHapusUser') }}')
        </script>
    @endif
    @if (session()->has('bEditsUser'))
        <script type="text/javascript">
            toastr.success('{{ session('bEditsUser') }}')
        </script>
    @endif
@endsection
