@extends('admin.main')
@section('tambahPosPembayaran')
    <div class=" container-fluid">
        <div class="row mb-2 border-bottom">
            <div class="col-sm-6">
                <h1 class="m-0">Tambah Jenis Pembayaran</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Data Keuangan</li>
                    <li class="breadcrumb-item active">Tambah Jenis Pembayaran</li>
                </ol>
            </div>
        </div>

        <div class="">
            <form action="/admin/tambah/jenis-pembayaran" method="post">
                @csrf
                <div class=" row">
                    <div class=" col-sm-8 mt-2">
                        {{-- POS --}}

                        <div class=" form-group ">
                            <label for="">POS</label>
                            <select name="pos" id="" class=" form-control float-right "
                                aria-label="Default select example">
                                <option value="" selected>-- Pilih POS --</option>
                                @foreach ($pos as $p)
                                    <option value="{{ $p->pos }}" {{ old('pos') == $p->pos ? 'selected' : '' }}>{{ $p->pos }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Tahun Ajarana --}}
                        <div class=" form-group">
                            <label for="">Tahun Ajaran</label>
                            <select name="tahun_ajaran" id="" class=" form-control float-right">
                                <option value="" selected>-- Pilih Tahun Ajaran --</option>
                                @foreach ($tahunAjaran as $ta)
                                    <option value="{{ $ta->tahun_ajaran }}" {{ old('tahun_ajaran') == $ta->tahun_ajaran ? 'selected' : '' }}>{{ $ta->tahun_ajaran }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Tipe --}}
                        <div class=" form-group">
                            <label for="">Tipe</label>
                            <select name="tipe" id="" class=" form-control float-right">
                                <option value="" selected>-- Pilih Tipe --</option>
                                <option value="Bebas" {{ old('tipe') == 'Bebas'? 'selected' : '' }}>Bebas</option>
                                <option value="Bulanan" {{ old('tipe') == 'Bulanan'? 'selected' : '' }}>Bulanan</option>
                            </select>
                        </div>

                    </div>
                    <div class=" col-sm-4 mt-4 btn-sm">
                        <div class=" row">
                            <div class=" col-sm-12 ">
                                <button type="submit" style="width: 100%" class="btn btn-primary btn-sm">
                                    <i class=" fa fa-plus"></i> Tambah
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
    @error('pos')
        <script type="text/javascript">
            toastr.error("{{ $message }}")
        </script>
    @enderror
    @error('tahun_ajaran')
        <script type="text/javascript">
            toastr.error("{{ $message }}")
        </script>
    @enderror
    @error('tipe')
        <script type="text/javascript">
            toastr.error("{{ $message }}")
        </script>
    @enderror
@endsection
