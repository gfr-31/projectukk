@extends('admin.main')
@section('editTahunAjaran')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Master Data</li>
                    <li class="breadcrumb-item active">Tahun Ajaran</li>
                    <li class="breadcrumb-item active">Edit Tahun Ajaran</li>
                </ol>
            </div>
        </div>
        <div class="card card-success ">
            <div class="card-header">
                <h3 class="card-title">Edit Tahun Ajaran</h3>
            </div>
            @foreach ($tahun_ajaran as $th)
                <form action="/admin/update/tahun-ajaran" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $th->id }}">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tahun Ajaran</label>
                            <div class="row">
                                <div class=" col-12 ">
                                    <input name="tj1" type="text" class="form-control" id=""
                                        placeholder="Tahun Ajaran" value="{{ $th->tahun_ajaran }}">
                                </div>
                                {{-- <h3>/</h3>
                                    <div class=" col-5">
                                        <input id="tahun_ajaran" name="tj2" type="text" class="form-control" id=""
                                            placeholder="Tahun Ajaran"  value="{{ $th->tahun_ajaran }}">
                                    </div> --}}
                            </div>
                            <div class=" form-group mt-2">
                                <label for="">Keterangan</label>
                                <br>
                                @if ($th->keterangan == 'Aktif')
                                    <div class=" form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="inlineRadio1" name="customRadio"
                                            value="Aktif" checked>
                                        <label for="inlineRadio1" class="form-check-label">Aktif</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="inlineRadio2" name="customRadio"
                                            value="Tidak Aktif">
                                        <label for="inlineRadio2" class="form-check-label">Tidak Aktif</label>
                                    </div>
                                @elseif ($th->keterangan == 'Tidak Aktif')
                                    <div>
                                        <p class=" col-1"></p>
                                    </div>
                                    <div class=" colsm-3 custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="customRadio1"
                                            name="customRadio" value="Aktif">
                                        <label for="customRadio1" class="custom-control-label">Aktif</label>
                                    </div>
                                    <div>
                                        <p class=" col-1"></p>
                                    </div>
                                    <div class="colsm-3 custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="customRadio2"
                                            name="customRadio" value="Tidak Aktif" checked>
                                        <label for="customRadio2" class="custom-control-label">Tidak Aktif</label>
                                    </div>
                                @elseif ($th->keterangan == '')
                                    <div>
                                        <p class=" col-1"></p>
                                    </div>
                                    <div class=" colsm-3 custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="customRadio1"
                                            name="customRadio" value="Aktif">
                                        <label for="customRadio1" class="custom-control-label">Aktif</label>
                                    </div>
                                    <div>
                                        <p class=" col-1"></p>
                                    </div>
                                    <div class="colsm-3 custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="customRadio2"
                                            name="customRadio" value="Tidak Aktif">
                                        <label for="customRadio2" class="custom-control-label">Tidak Aktif</label>
                                    </div>
                                @endif
                            </div>
                            <div class="card-footer">
                                <a href="/admin/tahun-ajaran" class="btn btn-danger btn-sm float-right">
                                    <i class=" fa fa-reply"></i> Kembali
                                </a>
                                <button type="submit" class="  btn btn-success float-left btn-sm">Perbaharui</button>
                            </div>
                        </div>
                    </div>
                </form>
            @endforeach
        </div>
    </div>
    @error('tj1')
        <script type="text/javascript">
            toastr.error("{{ $message }}")
        </script>
    @enderror
    @error('tj2')
        <script type="text/javascript">
            toastr.error("{{ $message }}")
        </script>
    @enderror
    @error('customRadio')
        <script type="text/javascript">
            toastr.error("{{ $message }}")
        </script>
    @enderror
@endsection
<script>
    document.getElementById('tahun_ajaran').click();
</script>
