@extends('admin.main')
@section('kirimTagihan')
    <div class=" container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Kirim Tagihan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Kirim Tagihan</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->

        <div class="card card-blue card-outline mt-3">
            <div class="card-header">
                <div class="card-tools">
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
                            <th>POS</th>
                            <th>Nama Pembayaran</th>
                            <th>Tipe</th>
                            <th>Tahun</th>
                            <th>
                                <center>Aksi</center>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0; ?>
                        @foreach ($jenis_pembayaran as $jp)
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td>{{ $jp->pos }}</td>
                                <td>{{ $jp->pos }} - T.A {{ $jp->TahunAjaran->tahun_ajaran }}</td>
                                <td>{{ $jp->tipe }}</td>
                                <td>{{ $jp->TahunAjaran->tahun_ajaran }}</td>
                                <td>
                                    <center>
                                        <a href="/admin/kirim-tagihan/{{ $jp->tipe }}" class="btn btn-success btn-sm">
                                            <i class="fa fa-whatsapp"></i> Kirim Notif WhatsApp
                                        </a>
                                    </center>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{-- @foreach ($jenis_pembayaran as $jp)
            <p>{{ $jp->pos }} - T.A {{ $jp->TahunAjaran->tahun_ajaran }}</p>
        @endforeach --}}
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
                        // Jika teks dalam sel cocsok dengan pencarian, tampilkan baris, jika tidak, sembunyikan
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
@endsection
