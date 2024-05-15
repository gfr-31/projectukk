@extends('admin.main')
@section('editJenisPembayaran')
    <div class=" container-fluid">
        <div class="row mb-2 border-bottom">
            <div class="col-sm-6">
                @foreach ($jenisPembayaran as $jp)
                    <h1 class="m-0">Edit {{ $jp->nama_pembayaran }}</h1>
                @endforeach
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Data Keuangan</li>
                    <li class="breadcrumb-item active">Edit Jenis Pembayaran </li>
                </ol>
            </div>
        </div>

        <div class="">
            <form action="/admin/edit-jenis-pembayaran" method="post">
                @csrf
                <div class=" row">
                    @foreach ($jenisPembayaran as $jp)
                        <input type="hidden" value="{{ $jp->id }}" name="id">
                    @endforeach
                    <div class=" col-sm-8 mt-2">
                        {{-- POS --}}
                        <div class=" form-group ">
                            <label for="">POS</label>
                            <select name="pos" id="" class=" form-control float-right "
                                aria-label="Default select example">
                                @foreach ($jenisPembayaran as $jp)
                                    <option value="{{ $jp->pos }}" selected>{{ $jp->pos }}</option>
                                @endforeach
                                @foreach ($pos as $p)
                                    <option value="{{ $p->pos }}" {{ old('pos') == $p->pos ? 'selected' : '' }}>
                                        {{ $p->pos }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('pos')
                            <small class=" text-danger ml-1"><i class=" fa fa-warning"></i>
                                {{ $message }} </small>
                        @enderror

                        {{-- Tahun Ajarana --}}
                        <div class=" form-group">
                            <label for="">Tahun Ajaran</label>
                            <select name="tahun_ajaran" id="" class=" form-control float-right">
                                @foreach ($jenisPembayaran as $jp)
                                    <option value="{{ $jp->tahun_ajaran }}" selected>{{ $jp->tahun_ajaran }}</option>
                                @endforeach
                                @foreach ($tahunAjaran as $ta)
                                    <option value="{{ $ta->tahun_ajaran }}"
                                        {{ old('tahun_ajaran') == $ta->tahun_ajaran ? 'selected' : '' }}>
                                        {{ $ta->tahun_ajaran }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('tahun_ajaran')
                            <small class=" text-danger ml-1"><i class=" fa fa-warning"></i>
                                {{ $message }} </small>
                        @enderror

                        {{-- Tipe --}}
                        <div class=" form-group">
                            <label for="">Tipe</label>
                            <select name="tipe" id="" class=" form-control float-right">
                                @foreach ($jenisPembayaran as $jp)
                                    <option value="{{ $jp->tipe }}" selected>{{ $jp->tipe }}</option>
                                @endforeach
                                <option value="Bebas" {{ old('tipe') == 'Bebas' ? 'selected' : '' }}>Bebas</option>
                                <option value="Bulanan" {{ old('tipe') == 'Bulanan' ? 'selected' : '' }}>Bulanan</option>
                            </select>
                        </div>
                        @error('tipe')
                            <small class=" text-danger ml-1"><i class=" fa fa-warning"></i>
                                {{ $message }} </small>
                        @enderror

                    </div>
                    <div class=" col-sm-4 mt-4 btn-sm">
                        <div class=" row">
                            <div class=" col-sm-12 ">
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                    style="width: 100%" data-target="#konfirmasiModal" id="perbaharuiButton">
                                    <i class="fa fa-save"></i> Perbaharui
                                </button>
                            </div>
                            <div class=" col-sm-12 mt-1">
                                <a href="/admin/jenis-pembayaran" class=" btn btn-danger btn-sm" style="width: 100%">
                                    <i class=" fa fa-reply"></i> Kembali
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Konfirmasi -->
    <div class="modal fade" id="konfirmasiModal" tabindex="-1" role="dialog" aria-labelledby="konfirmasiModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header m-0">
                    <h5 class="modal-title" id="konfirmasiModalLabel">Apakah Anda Yakin Untuk Memperbarui Data?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body " style="color: red">
                    <b>
                        Jika data diperbaharui, secara otomatis menghapus seluruh data Tarif Pembayaran
                    </b>
                    <div class=" mt-2 text-center">
                        <button type="button" class="btn btn-danger btn-sm mx-1" data-dismiss="modal">Batal</button>
                        <!-- Tombol Perbarui -->
                        <button type="button" onclick="submitForm()" class="btn btn-primary btn-sm " id="confirmButton"
                            disabled>Perbaharui</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function submitForm() {
            document.querySelector("form").submit();
        }
        setTimeout(function() {
            // document.getElementById("perbaharuiButton").removeAttribute("disabled");
            document.getElementById("confirmButton").removeAttribute("disabled");
        }, 5000);
    </script>
@endsection
