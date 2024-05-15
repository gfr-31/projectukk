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
            <button class=" btn btn-sm btn-danger removeAll float-right">
                <i class=" fa fa-trash"></i> Hapus Semua
            </button>
        </div>

        <div class="card">
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                        <tr style="width: 100%">
                            <th style="width: 1%; ">
                                <center>
                                    <input type="checkbox" name="" id="checkboxesMain">
                                </center>
                            </th>
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
                    </tbody>
                    <?php $no = 0; ?>
                    @foreach ($data_informasi as $d)
                        <tr id="tr_{{ $d->id }}">
                            <td>
                                <center>
                                    <input type="checkbox" class=" checkbox" data-id="{{ $d->id }}">
                                </center>
                            </td>
                            <td>
                                <center>
                                    {{ ++$no }}
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
                                                srcset="" id="preview" loading="lazy" width="50%" height="50%">
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

    <script src="{{ asset('jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('js/main/data_informasi/data_informasi.js') }}"></script>
    @if (session()->has('berhasilPosPembayaran'))
        <script type="text/javascript">
            toastr.success('{{ session('berhasilPosPembayaran') }}')
        </script>
    @endif
@endsection
