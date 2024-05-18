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

        <div class="card card-olive card-outline">
            <div class="card-body ">
                <table id="example" class="table-responsive table table-striped border-bottom dtr-inline ">
                    <thead>
                        <tr style="width: 100%">
                            {{-- <th style="width: 1%; " id="123">
                                <center>
                                    <input type="checkbox" name="" id="checkboxesMain">
                                </center>
                            </th> --}}
                            <th style="width: 5%; ">
                                <center>
                                    No
                                </center>
                            </th>
                            <th style="width: 20%; ">
                                <center>
                                    Gambar
                                </center>
                            </th>
                            <th style="width: 20%; ">
                                <center>
                                    Judul
                                </center>
                            </th>
                            <th style="width: 15%; ">
                                <center>
                                    Tanggal
                                </center>
                            </th>
                            <th style="width: 10%; ">
                                <center>
                                    Status
                                </center>
                            </th>
                            <th style="width: 15%; ">
                                <center>
                                    Aksi
                                </center>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0; ?>
                        @foreach ($data_informasi as $d)
                            <tr>
                                {{-- <td>
                                    <center>
                                        <input type="checkbox" class=" checkbox" data-id="{{ $d->id }}">
                                    </center>
                                </td> --}}
                                <td>
                                    <center>
                                        {{ ++$no }}
                                        {{-- {{ $d->id }} --}}
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        @if ($d->gambar === null)
                                            Gambar Tidak Ada
                                        @else
                                            <a href="{{ asset('post_image/' . $d->gambar) }}" data-lightbox="galery"
                                                data-title="Gambar Informas | {{ $d->judul }}">
                                                <img src="{{ asset('post_image/' . $d->gambar) }}" alt="Foto Error"
                                                    srcset="" id="preview" loading="lazy" width="30%"
                                                    height="50%">
                                            </a>
                                        @endif
                                    </center>
                                </td>
                                <td>{{ $d->judul }}</td>
                                <td>
                                    <center>
                                        {{ $d->tanggal }}
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        {{ $d->status }}
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        <a href="/admin/edit/informasi{{ $d->id }}" type="button"
                                            class="btn btn-success btn-sm">
                                            <i class="fa fa-pencil"></i>
                                            Edit
                                        </a>
                                        |
                                        {{-- <a href="/admin/data/hapus{{ $d->id }}" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </a> --}}
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#konfirmasiModal{{ $d->id }}"
                                            id="hapusButton{{ $d->id }}"
                                            onclick="submitDelete({{ $d->id }})">
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
    </div>

    @foreach ($data_informasi as $d)
        <!-- Modal Konfirmasi -->
        <div class="modal fade" id="konfirmasiModal{{ $d->id }}" tabindex="-1" role="dialog"
            aria-labelledby="konfirmasiModalLabel{{ $d->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header m-0">
                        <h5 class="modal-title" id="konfirmasiModalLabel{{ $d->id }}">Konfirmasi Menghapus Data
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body ">
                        Apakah Anda Yakin Untuk Menghapus Data?
                    </div>
                    <div class=" modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm mx-1" data-dismiss="modal"
                            onclick="batal({{ $d->id }})">Batal</button>
                        <button type="button" onclick="submitForm({{ $d->id }})" class="btn btn-danger btn-sm "
                            id="confirmButton{{ $d->id }}" disabled>
                            <i class=" fa fa-trash"></i> Hapus
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Modal Konfirmasi Hapus All -->
    <div class="modal fade" id="konfirmasiModal" tabindex="-1" role="dialog" aria-labelledby="konfirmasiModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header m-0">
                    <h5 class="modal-title" id="konfirmasiModalLabel">Konfirmasi Menghapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body ">
                    <h6>Apakah Anda Yakin Untuk Menghapus Data?</h6>
                </div>
                <div class=" modal-footer">
                    <button class="btn btn-secondary btn-sm mx-1" id="btnCancel">Batal</button>
                    <button class="btn btn-danger btn-sm" id="btnConfirm" disabled>Hapus</button>
                </div>
            </div>
        </div>
    </div>

    {{-- DataTabel --}}
    <script src="{{ asset('jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('dataTable/dataTables.js') }}"></script>
    <script src="{{ asset('dataTable/dataTables.bootstrap5.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('dataTable/dataTables.bootstrap5.css') }}">

    <script src="{{ asset('js/main/data_informasi/data_informasi.js') }}"></script>


    @if (session()->has('berhasilPosPembayaran'))
        <script type="text/javascript">
            toastr.success('{{ session('berhasilPosPembayaran') }}')
        </script>
    @endif
    @if (session()->has('berhasilHapusDataSemua'))
        <script type="text/javascript">
            toastr.success('{{ session('berhasilHapusDataSemua') }}')
        </script>
    @endif
    @if (session()->has('berhasilHapusData'))
        <script type="text/javascript">
            toastr.success('{{ session('berhasilHapusData') }}')
        </script>
    @endif
@endsection
