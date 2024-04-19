@extends('admin.main')
@section('kelas')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Kelas</h1>
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
                                    placeholder="X(A)" required>
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
        <div class="card-header">
            <!-- Button trigger modal -->
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
                        <th style="width: 10px">No</th>
                        <th>Nama Kelas</th>
                        <th><center>ID Kelas</center></th>
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
                            <td>{{ $k->kelas }}</td>
                            <td><center>{{ $k->id }}</center></td>
                            <td>
                                <center>
                                    <a href="{{ $k->id }}" data-toggle="modal"
                                        data-target="#exampleModalEdit{{ $k->id }}" type="button"
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
                                    <a href="/admin/kelas/hapus {{ $k->id }}" class="btn btn-danger btn-sm">
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


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script>
        document.getElementById("searchInput").addEventListener("keyup", function() {
            var input, filter, table, tr, td, i, j;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.querySelector(".table-responsive table");
            tr = table.getElementsByTagName("tr");

            // Loop melalui semua baris tabel
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td");
                // Loop melalui semua sel dalam baris
                for (j = 0; j < td.length; j++) {
                    if (td[j]) {
                        // Jika teks dalam sel cocok dengan pencarian, tampilkan baris, jika tidak, sembunyikan
                        if (td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                            break; // Keluar dari loop saat pencocokan ditemukan
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }
            }
        });
    </script>

    <script src="{{ asset('js/main/master_data/kelas/kelas.js') }}"></script>

    @if (session()->has('berhasilKelas'))
        <script type="text/javascript">
            toastr.success('{{ session('berhasilKelas') }}')
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
