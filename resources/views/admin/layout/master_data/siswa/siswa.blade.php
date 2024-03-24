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
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Nama Ibu Kandung</th>
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
                        @foreach ($siswa as $s)
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td>{{ $s->nis }}</td>
                                <td>{{ $s->nama_lengkap }}</td>
                                <td>{{ $s->kelas->kelas }}</td>
                                <td>{{ $s->nama_ibu }}</td>
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
