@extends('admin.main')
@section('tambahTahunAjaran')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Master Data</li>
                    <li class="breadcrumb-item active">Data Tahun Ajaran</li>
                    <li class="breadcrumb-item active">Tambah Tahun Ajaran</li>
                </ol>
            </div>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Tambah Tahun Ajaran</h3>
            </div>
            <form action="/admin/tambah/tahun-ajaran" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tahun Ajaran</label>
                        <div class="row mb-1">
                            <div class=" col-5 ">
                                <input name="tj1" type="text" class="form-control mb-2" id=""
                                    placeholder="Ex: 2023" value="{{ old('tj1') }}">
                                @error('tj1')
                                    <small class=" text-danger ml-1 "><i class=" fa fa-warning"></i> {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <h1>-</h1>
                            <div class=" col-5">
                                <input id="tahun_ajaran" name="tj2" type="text" class="form-control mb-2"
                                    id="" placeholder="Ex: 2024" value="{{ old('tj2') }}">
                                @error('tj2')
                                    <small class=" text-danger ml-1"><i class=" fa fa-warning"></i> {{ $message }} </small>
                                @enderror
                            </div>
                        </div>
                        <div class=" form-group">
                            <label for="">Keterangan</label>
                            <div class="form-group">
                                <div class=" row">
                                    <div>
                                        <p class=" col-1"></p>
                                    </div>
                                    <div class=" colsm-3 custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="customRadio1"
                                            name="customRadio" value="Aktif"
                                            {{ old('customRadio') == 'Aktif' ? 'checked' : '' }}>
                                        <label for="customRadio1" class="custom-control-label">Aktif</label>
                                    </div>
                                    <div>
                                        <p class=" col-1"></p>
                                    </div>
                                    <div class="colsm-3 custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="customRadio2"
                                            name="customRadio" value="Tidak Aktif"
                                            {{ old('customRadio') == 'Tidak Aktif' ? 'checked' : '' }}>
                                        <label for="customRadio2" class="custom-control-label">Tidak Aktif</label>
                                    </div>
                                </div>
                                @error('customRadio')
                                    <small class=" text-danger ml-1"><i class=" fa fa-warning"></i> {{ $message }} </small>
                                @enderror
                                {{-- <p>(*wajib diisi</p> --}}
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="/admin/tahun-ajaran" class="btn btn-danger btn-sm float-right">
                                <i class=" fa fa-reply"></i> Kembali
                            </a>
                            <button type="submit" class="  btn btn-primary float-left btn-sm">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @if (session()->has('tjsama'))
        <script type="text/javascript">
            toastr.error('{{ session('tjsama') }}')
        </script>
    @endif
@endsection
