@extends('siswa.main_siswa')
@section('tagihan')
    <div class="table-responsive">
        <table class="table ">

        </table>
    </div>

    <div class="card card-olive card-outline">
        <div class="card-header text-center">
            <label class=" mt-2 " for="" style="font-size: 20px">Tagihan Siswa</label>
            {{-- <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" id="searchInput" class="form-control float-right" placeholder="Search">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div> --}}
        </div>

        <div class="card-body table-responsive" style="height: 190px;">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Pembayaran</th>
                        <th>Total Tagihan</th>
                        <th>Sisa Tagihan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 0; ?>
                    @foreach ($tagihan as $t)
                        <tr>
                            <td> {{ ++$no }} </td>
                            <td>{{ $t->nama_pembayaran }}</td>
                            <td>{{ $t->tagihan ?? $t->tarif }}</td>
                            <td>{{ $t->sisa_tagihan }}</td>
                        </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col text-right">
            <a href="/siswa/cetak-tagihan/{{ $t->Siswa->id }}" class="btn btn-danger btn-sm mb-3">
                <i class=" fa fa-print"></i> Cetak Semua
            </a>
        </div>
    </div>
@endsection
