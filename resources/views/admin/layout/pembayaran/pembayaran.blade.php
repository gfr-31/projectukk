@extends('admin.main')
@section('pembayaran')
    <div class="container-fluid">
        <div class="row mb-2 ">
            <div class="col-sm-6">
                <h1 class="m-0">Pembayaran Siswa</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Pembayaran Siswa</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        <div class=" card card-olive card-outline">
            <div class=" mt-3 mx-3 ">
                <div class=" row">
                    <div class=" col-9">
                        <label style="font-size: 20px">Cari Data Siswa :</label>
                        <form action="/admin/pembayaran-" method="get">
                            <div class="row g-2 ml-5">
                                <div class=" col-auto">
                                    <label for="exampleInputEmail1" class=" col-form-label">NIS</label>
                                </div>
                                <div class=" col-9 form-group mx-5">
                                    <div class=" input-group">
                                        <input type="search" name="nis" class="form-control" id="exampleInputEmail1"
                                            placeholder="NIS">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class=" col-3 ">
                        {{-- <div class=" text-center" >
                            <label for="" style="font-size: 15px">Cetak Semua Tagihan</label>
                        </div> --}}
                        @if (isset($siswa))
                            <div class=" row">
                                <div class="col-5">
                                    <label for="" tyle="font-size: 14px">Per-Tanggal</label>
                                </div>
                                <div class=" col-7">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class=" fa fa-calendar"></i></span>
                                        </div>
                                        <input type="text" class="form-control form-control-sm mr-3"
                                            value="{{ \Carbon\Carbon::now()->format('d-m-Y') }}">
                                    </div>
                                </div>
                                <a href="" class="col-12 btn btn-danger btn-sm mb-3">
                                    <i class=" fa fa-print"></i>
                                    Cetak Semua Tagihan
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        @if (isset($siswa))
            @if (session()->has('key'))
                {
                <script type="text/javascript">
                    toastr.success("{{ session('key') }}", "", {
                        "closeButton": true,
                        "timeOut": 2500,
                    });
                </script>
                }
            @elseif ($pesan)
                <script type="text/javascript">
                    toastr.success("{{ $pesan }}", "", {
                        "closeButton": true,
                        "timeOut": 2500,
                    });
                </script>
            @endif
            <div class=" row">
                <div class=" col-12">
                    <div class=" card card-olive card-outline" style="height: 270px">
                        <div class=" mx-5 mt-2 text-center">
                            <label style="font-size: 18px">Informasi Siswa</label>
                        </div>
                        <div class=" row ml-2">
                            <div class=" col-8">
                                <table class="table table-sm ">
                                    <tr>
                                        <th width="150px"></th>
                                        <th width="20px"></th>
                                        <th width="550px"></th>
                                    </tr>
                                    <tr>
                                        <td>NIS</td>
                                        <td>:</td>
                                        <td>{{ $siswa->nis }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama Siswa</td>
                                        <td>:</td>
                                        <td>{{ $siswa->nama_lengkap }}</td>
                                    </tr>
                                    <tr>
                                        <td>Kelas</td>
                                        <td>:</td>
                                        <td>{{ $siswa->kelas->kelas }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama Ibu</td>
                                        <td>:</td>
                                        <td>{{ $siswa->nama_ibu }}</td>
                                    </tr>
                                    <tr>
                                        <td>No HP Siswa</td>
                                        <td>:</td>
                                        <td>{{ $siswa->no_hp }}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class=" col-4">
                                <div class=" m-1 mr-2 text-center">
                                    <a href="{{ asset('post_image/' . $siswa->foto_siswa) }}" data-lightbox="galery"
                                        data-title="Foto Siswa | {{ $siswa->nama_lengkap }}">
                                        <img src="{{ asset('post_image/' . $siswa->foto_siswa) }}" id="preview"
                                            class="rounded" alt="Cinque Terre" height="0%" width="210px">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class=" col-6">
                    
                </div> --}}

            </div>
            <div class=" row ">
                <div class=" col-8">
                    <div class=" card card-olive card-outline">
                        <div class=" text-center">
                            <label class=" mt-2 " for="" style="font-size: 20px">Jenis Pembayaran</label>
                            <ul class=" nav">
                                <li class=" nav-item">
                                    <a href="" id="bulanan_link">
                                        <p class="ml-3 mt-2 h6"><strong>Bulanan</strong></p>
                                    </a>
                                </li>
                                <li class=" nav-item">
                                    <a href="" id="bebas_link">
                                        <p class="ml-3 mt-2 h6"><strong>Bebas</strong></p>
                                    </a>
                                </li>
                            </ul>

                            <div id="bulanan" class=" table-responsive" style="height: 190px">
                                <table class=" table table-sm table-striped ">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th style="text-align: left">Nama Pembayaran</th>
                                            <th style="text-align: left">
                                                <center>Tagihan</center>
                                            </th>
                                            <th style="text-align: left">
                                                <center>Sisa Tagihan</center>
                                            </th>
                                            <th style="text-align: left">
                                                <center>Bayar</center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 0; ?>
                                        @foreach ($tpBulanan as $t)
                                            <tr>
                                                <td>{{ ++$no }}</td>
                                                <td style="text-align: left">{{ $t->nama_pembayaran }}</td>
                                                <td style="text-align: left">
                                                    <center>
                                                        {{ 'Rp. ' . number_format((float) $t->tagihan, 0, ',', '.') }}
                                                    </center>
                                                </td>
                                                <td style="text-align: left">
                                                    <center>
                                                        @if ($t->sisa_tagihan == '0')
                                                            <div class=" btn-primary rounded">
                                                                <strong>
                                                                    Sudah Lunas
                                                                </strong>
                                                            </div>
                                                        @elseif($t->sisa_tagihan)
                                                            {{ 'Rp. ' . number_format((float) $t->sisa_tagihan, 0, ',', '.') }}
                                                        @endif
                                                    </center>
                                                </td>
                                                <td style="text-align: left">
                                                    <center>
                                                        <button type="button" class=" btn btn-success btn-sm"
                                                            data-toggle="modal"
                                                            data-target="#popupModal{{ $t->id }}">
                                                            <i class=" fa fa-money"></i> Bayar
                                                        </button>
                                                    </center>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @foreach ($tpBulanan as $t)
                                    <div class="modal fade" id="popupModal{{ $t->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="popupModalLabel{{ $t->id }}"
                                        aria-hidden="true">
                                        <div class="modal-dialog " role="document" style="max-width: 90%">
                                            <div class="modal-content ">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="popupModalLabel">Pembayaran
                                                        {{ $t->nama_pembayaran }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class=" row mb-3">
                                                        <div class=" col-4" style="text-align: left">
                                                            <div class=" row">
                                                                <div class=" col-5">
                                                                    <label for="">Nama Pembayaran</label>
                                                                </div>
                                                                <div class=" col-7">
                                                                    <input name="nis" type="text"
                                                                        class="form-control float-right"
                                                                        value="{{ $t->nama_pembayaran }}" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class=" col-7 " style="text-align: left">
                                                            <div class=" row">
                                                                <div class=" col-2">
                                                                    <label for="">Sisa Tagihan</label>
                                                                </div>
                                                                <div class=" col-4">
                                                                    <input name="nis" type="text"
                                                                        class="form-control float-right {{ $t->sisa_tagihan == 0 ? 'bg-primary font-weight-bold text-center' : '' }}"
                                                                        value=" {{ $t->sisa_tagihan ? 'Rp. ' . number_format($t->sisa_tagihan, 0, ',', '.') : 'Sudah Lunas' }}"
                                                                        readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class=" col-1">
                                                            <a href="#" id="edit"
                                                                onclick="validasiEdit('{{ $t->tipe }}', '{{ $t->id }}')"
                                                                class=" btn btn-primary btn-sm ml-3" target="_blank">
                                                                <i class="fa fa-cog"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <table class=" table table-sm table-striped table-responsive-xl">
                                                        <thead>
                                                            <tr>
                                                                {{-- <th style="text-align: left">Nama Pembayaran</th>
                                                                <th style="text-align: left">Sisa Tagihan</th> --}}
                                                                <th style="text-align: left">Juli</th>
                                                                <th style="text-align: left">Agustus</th>
                                                                <th style="text-align: left">September</th>
                                                                <th style="text-align: left">Oktober</th>
                                                                <th style="text-align: left">November</th>
                                                                <th style="text-align: left">Desember</th>
                                                                <th style="text-align: left">Januari</th>
                                                                <th style="text-align: left">Februari</th>
                                                                <th style="text-align: left">Maret</th>
                                                                <th style="text-align: left">April</th>
                                                                <th style="text-align: left">Mei</th>
                                                                <th style="text-align: left">Juni</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <form
                                                                    action="/admin/simpan-pembayaran/{{ $t->tipe }}"
                                                                    method="post" id="form-pembayaran">
                                                                    @csrf
                                                                    {{-- supaya ada data nya --}}
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $t->id }}" id="id">
                                                                    <input type="hidden" name="ta"
                                                                        value="{{ $t->tahun_ajaran }}">
                                                                    <input type="hidden" name="kelas"
                                                                        value="{{ $t->kelas_id }}">
                                                                    <input type="hidden" name="siswa"
                                                                        value="{{ $t->siswa_id }}">
                                                                    <input type="hidden" name="np"
                                                                        value="{{ $t->nama_pembayaran }}">
                                                                    <input type="hidden" name="tipe"
                                                                        value="{{ $t->tipe }}">
                                                                    <input type="hidden"
                                                                        name="tagihan{{ $t->id }}"
                                                                        value="{{ $t->tagihan }}">
                                                                    <input type="hidden"
                                                                        name="sisa_tagihan{{ $t->id }}"
                                                                        id="sisa_tagihan{{ $t->id }}"
                                                                        value="{{ $t->sisa_tagihan }}">
                                                                    <input type="hidden" name="jumlah_bayar"
                                                                        id="jumlah_bayar{{ $t->id }}"
                                                                        value="">
                                                                    <input type="hidden" name="bulan"
                                                                        id="bulani{{ $t->id }}" value="">
                                                                    <input type="hidden" name="juli{{ $t->id }}"
                                                                        value="{{ $t->juli }}">
                                                                    <input type="hidden"
                                                                        name="agustus{{ $t->id }}"
                                                                        value="{{ $t->agustus }}">
                                                                    <input type="hidden"
                                                                        name="september{{ $t->id }}"
                                                                        value="{{ $t->september }}">
                                                                    <input type="hidden"
                                                                        name="oktober{{ $t->id }}"
                                                                        value="{{ $t->oktober }}">
                                                                    <input type="hidden"
                                                                        name="november{{ $t->id }}"
                                                                        value="{{ $t->november }}">
                                                                    <input type="hidden"
                                                                        name="desember{{ $t->id }}"
                                                                        value="{{ $t->desember }}">
                                                                    <input type="hidden"
                                                                        name="january{{ $t->id }}"
                                                                        value="{{ $t->january }}">
                                                                    <input type="hidden"
                                                                        name="february{{ $t->id }}"
                                                                        value="{{ $t->february }}">
                                                                    <input type="hidden" name="maret{{ $t->id }}"
                                                                        value="{{ $t->maret }}">
                                                                    <input type="hidden" name="april{{ $t->id }}"
                                                                        value="{{ $t->april }}">
                                                                    <input type="hidden" name="mei{{ $t->id }}"
                                                                        value="{{ $t->mei }}">
                                                                    <input type="hidden" name="juni{{ $t->id }}"
                                                                        value="{{ $t->juni }}">

                                                                    {{-- memunculkan data di button --}}
                                                                    {{-- Fungsi is_numeric = memeriksa apakah suatu nilai adalah angka atau bukan --}}
                                                                    <td style="text-align: left">
                                                                        <button type="submit" class="btn-sm btn"
                                                                            name="juli{{ $t->id }}"
                                                                            value="{{ $t->juli }}" 
                                                                            onclick="setTanggal('juli{{ $t->id }}', '{{ $t->id }}')">
                                                                            @if (is_numeric($t->juli))
                                                                                {{ 'Rp. ' . number_format($t->juli, 0, ',', '.') }}
                                                                            @else
                                                                                {{ $t->juli }}
                                                                            @endif
                                                                        </button>
                                                                        <input type="hidden" value="{{ $t->id }}"id="bulan">
                                                                    </td>
                                                                    <td style="text-align: left">
                                                                        <button type="submit" class="btn-sm btn"
                                                                            name="agustus{{ $t->id }}"
                                                                            value="{{ $t->agustus }}"
                                                                            onclick="setTanggal('agustus{{ $t->id }}', '{{ $t->id }}')">
                                                                            @if (is_numeric($t->agustus))
                                                                                {{ 'Rp. ' . number_format($t->agustus, 0, ',', '.') }}
                                                                            @else
                                                                                {{ $t->agustus }}
                                                                            @endif
                                                                        </button>
                                                                    </td>
                                                                    <td style="text-align: left"><button type="submit"
                                                                            class=" btn-sm btn"
                                                                            name="september{{ $t->id }}"
                                                                            value="{{ $t->september }}"
                                                                            onclick="setTanggal('september{{ $t->id }}', '{{ $t->id }}')">
                                                                            @if (is_numeric($t->september))
                                                                                {{ 'Rp. ' . number_format($t->september, 0, ',', '.') }}
                                                                            @else
                                                                                {{ $t->september }}
                                                                            @endif
                                                                        </button>
                                                                    </td>
                                                                    <td style="text-align: left"><button type="submit"
                                                                            class=" btn-sm btn"
                                                                            name="oktober{{ $t->id }}"value="{{ $t->oktober }}"
                                                                            onclick="setTanggal('oktober{{ $t->id }}', '{{ $t->id }}')">
                                                                            @if (is_numeric($t->oktober))
                                                                                {{ 'Rp. ' . number_format($t->oktober, 0, ',', '.') }}
                                                                            @else
                                                                                {{ $t->oktober }}
                                                                            @endif
                                                                        </button>
                                                                    </td>
                                                                    <td style="text-align: left"><button type="submit"
                                                                            class=" btn-sm btn"
                                                                            name="november{{ $t->id }}"
                                                                            value="{{ $t->november }}"
                                                                            onclick="setTanggal('november{{ $t->id }}', '{{ $t->id }}')">
                                                                            @if (is_numeric($t->november))
                                                                                {{ 'Rp. ' . number_format($t->november, 0, ',', '.') }}
                                                                            @else
                                                                                {{ $t->november }}
                                                                            @endif
                                                                        </button>
                                                                    </td>
                                                                    <td style="text-align: left"><button type="submit"
                                                                            class=" btn-sm btn"
                                                                            name="desember{{ $t->id }}"
                                                                            value="{{ $t->desember }}"
                                                                            onclick="setTanggal('desember{{ $t->id }}', '{{ $t->id }}')">
                                                                            @if (is_numeric($t->desember))
                                                                                {{ 'Rp. ' . number_format($t->desember, 0, ',', '.') }}
                                                                            @else
                                                                                {{ $t->desember }}
                                                                            @endif
                                                                        </button>
                                                                    </td>
                                                                    <td style="text-align: left"><button type="submit"
                                                                            class=" btn-sm btn"
                                                                            name="january{{ $t->id }}"
                                                                            value="{{ $t->january }}"
                                                                            onclick="setTanggal('january{{ $t->id }}', '{{ $t->id }}')">
                                                                            @if (is_numeric($t->january))
                                                                                {{ 'Rp. ' . number_format($t->january, 0, ',', '.') }}
                                                                            @else
                                                                                {{ $t->january }}
                                                                            @endif
                                                                        </button>
                                                                    </td>
                                                                    <td style="text-align: left"><button type="submit"
                                                                            class=" btn-sm btn"
                                                                            name="february{{ $t->id }}"
                                                                            value="{{ $t->february }}"
                                                                            onclick="setTanggal('february{{ $t->id }}', '{{ $t->id }}')">
                                                                            @if (is_numeric($t->february))
                                                                                {{ 'Rp. ' . number_format($t->february, 0, ',', '.') }}
                                                                            @else
                                                                                {{ $t->february }}
                                                                            @endif
                                                                        </button>
                                                                    </td>
                                                                    <td style="text-align: left"><button type="submit"
                                                                            class=" btn-sm btn"
                                                                            name="maret{{ $t->id }}"value="{{ $t->maret }}"
                                                                            onclick="setTanggal('maret{{ $t->id }}', '{{ $t->id }}')">
                                                                            @if (is_numeric($t->maret))
                                                                                {{ 'Rp. ' . number_format($t->maret, 0, ',', '.') }}
                                                                            @else
                                                                                {{ $t->maret }}
                                                                            @endif
                                                                        </button>
                                                                    </td>
                                                                    <td style="text-align: left"><button type="submit"
                                                                            class=" btn-sm btn"
                                                                            name="april{{ $t->id }}"value="{{ $t->april }}"
                                                                            onclick="setTanggal('april{{ $t->id }}', '{{ $t->id }}')">
                                                                            @if (is_numeric($t->april))
                                                                                {{ 'Rp. ' . number_format($t->april, 0, ',', '.') }}
                                                                            @else
                                                                                {{ $t->april }}
                                                                            @endif
                                                                        </button>
                                                                    </td>
                                                                    <td style="text-align: left"><button type="submit"
                                                                            class=" btn-sm btn"
                                                                            name="mei{{ $t->id }}"value="{{ $t->mei }}"
                                                                            onclick="setTanggal('mei{{ $t->id }}', '{{ $t->id }}')">
                                                                            @if (is_numeric($t->mei))
                                                                                {{ 'Rp. ' . number_format($t->mei, 0, ',', '.') }}
                                                                            @else
                                                                                {{ $t->mei }}
                                                                            @endif
                                                                        </button>
                                                                    </td>
                                                                    <td style="text-align: left"><button type="submit"
                                                                            class=" btn-sm btn"
                                                                            name="juni{{ $t->id }}"value="{{ $t->juni }}"
                                                                            onclick="setTanggal('juni{{ $t->id }}', '{{ $t->id }}')">
                                                                            @if (is_numeric($t->juni))
                                                                                {{ 'Rp. ' . number_format($t->juni, 0, ',', '.') }}
                                                                            @else
                                                                                {{ $t->juni }}
                                                                            @endif
                                                                        </button>
                                                                    </td>
                                                                </form>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Tutup</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div id="bebas" class=" table-responsive" style="height: 190px">
                                <table class="table table-sm table-striped">
                                    <thead>
                                        <tr>
                                            <th>No. </th>
                                            <th style="text-align: left">Nama Pembayaran</th>
                                            <th style="text-align: left">
                                                <center>Total Tagihan</center>
                                            </th>
                                            <th style="text-align: left">
                                                <center>Sisa Tagihan</center>
                                            </th>
                                            <th style="text-align: left">
                                                <center>Bayar</center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <?php $no = 1; ?>
                                    @foreach ($tpBebas as $t)
                                        <tbody>
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td style="text-align: left">{{ $t->nama_pembayaran }}</td>
                                                <td style="text-align: left">
                                                    <center>{{ 'Rp. ' . number_format((float) $t->tarif, 0, ',', '.') }}
                                                    </center>
                                                </td>
                                                <td style="text-align: left">
                                                    <center>
                                                        @if ($t->sisa_tagihan == '0')
                                                            <div class=" btn-primary rounded">
                                                                <strong>
                                                                    Sudah Lunas
                                                                </strong>
                                                            </div>
                                                        @elseif($t->sisa_tagihan)
                                                            {{ 'Rp. ' . number_format((float) $t->sisa_tagihan, 0, ',', '.') }}
                                                        @endif
                                                    </center>
                                                </td>
                                                <td style="text-align: left">
                                                    <center>
                                                        <button type="button" class="btn btn-sm btn-success btn-bayar"
                                                            data-toggle="modal" 
                                                            data-target="#popupModal{{ $t->id }}" onclick="rpBayar({{ $t->id }})"
                                                            <i class="fa fa-money"></i> Bayar  
                                                        </button>
                                                    </center>
                                                </td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                </table>
                                @foreach ($tpBebas as $t)
                                    <form id="paymentForm" action="/admin/simpan-pembayaran/{{ $t->tipe }}"
                                        method="post">
                                        @csrf
                                        <input type="hidden" name="ta" value="{{ $t->tahun_ajaran }}">
                                        <input type="hidden" name="kelas" value="{{ $t->kelas_id }}">
                                        <input type="hidden" name="siswa" value="{{ $t->siswa_id }}">
                                        <input type="hidden" name="tipe" value="{{ $t->tipe }}">
                                        <div class="modal fade" id="popupModal{{ $t->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="popupModalLabel{{ $t->id }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog " role="document" style="max-width: 40%">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="popupModalLabel{{ $t->id }}">
                                                            {{ $t->nama_pembayaran }}</h5>
                                                        <a href="#" id="edit"
                                                            onclick="validasiEdit('{{ $t->tipe }}', '{{ $t->id }}')"
                                                            class=" btn btn-primary btn-sm ml-1" target="_blank">
                                                            <i class="fa fa-cog"></i>
                                                        </a>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Isi modal -->
                                                        <input type="hidden" name="id"
                                                            value="{{ $t->id }}">
                                                        <div class=" row ">
                                                            <div class=" col-6">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1"
                                                                        style="float: left;">Nama
                                                                        Pembayaran</label>
                                                                    <input type="email" class="form-control"
                                                                        id="exampleInputEmail1" placeholder="Enter email"
                                                                        name="namaPembayaran" readonly
                                                                        value="{{ $t->nama_pembayaran }}">
                                                                </div>
                                                            </div>
                                                            <div class=" col-6">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1"
                                                                        style="float: left;">Tanggal</label>
                                                                    <input type="text" class="form-control"
                                                                        id="waktu{{ $t->id }}" name="" value="" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class=" row ">
                                                            <div class=" col-6">
                                                                <div class="form-group">
                                                                    <label for="" style="float: left;">Total
                                                                        Tagihan</label>
                                                                    <input type="text" class="form-control"
                                                                        id="" placeholder="Enter email"
                                                                        name="tarif" readonly
                                                                        value="{{ 'Rp. ' . number_format((float) $t->tarif, 0, ',', '.') }}">
                                                                </div>
                                                            </div>
                                                            <div class=" col-6">
                                                                <div class="form-group">
                                                                    <label for="" style="float: left;">Sisa
                                                                        Tagihan</label>
                                                                    <input type="email" class="form-control"
                                                                        name="sisaTagihan"
                                                                        value="{{ 'Rp. ' . number_format((float) $t->sisa_tagihan, 0, ',', '.') }}"
                                                                        readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class=" row ">
                                                            <div class=" col-6">
                                                                <div class="form-group">
                                                                    <label style="float: left;">Jumlah
                                                                        Bayar</label>
                                                                    <input type="text" class="form-control"
                                                                        name="jumlahBayar" id="inputJumlahBayar{{ $t->id }}"  required >
                                                                </div>
                                                            </div>
                                                            <div class=" col-6">
                                                                <div class="form-group">
                                                                    <label style="float: left;">Keterangan</label>
                                                                    <input type="text" class="form-control" id="keterangan{{ $t->id }}"
                                                                        name="keterangan" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Tambahkan elemen atau data lainnya sesuai kebutuhan -->
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-sm btn-secondary"
                                                            data-dismiss="modal">Tutup</button>
                                                        <button type="submit" id="submit{{ $t->id }}" onclick="btnbebas('{{ $t->id }}')"
                                                            class="btn btn-success btn-sm" ><i class=" fa fa-money"></i>
                                                            Bayar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class=" col-4">
                    <div class=" card card-olive card-outline">
                        <div class=" mx-3 mt-2 ">
                            <div class="text-center mb-1">
                                <label style="font-size: 16px;">Pembayaran</label>
                                <button class="btn btn-primary btn-sm " style="float: right" onclick="kosong()">
                                    <i class=" fa fa-refresh"></i>
                                </button>
                            </div>
                            <div class=" card card-primary card-outline">
                                <div class="row mx-1">
                                    <div class=" col-6">
                                        <label for="">Total</label>
                                        <div class="input-group">
                                            <input type="hidden" id="nis" value="{{ $siswa->nis }}">
                                            <input type="text" value="" id="total{{ $siswa->nis }}"
                                                class="form-control form-control-sm" readonly>
                                        </div>
                                    </div>
                                    <div class=" col-6">
                                        <label for="">Dibayar</label>
                                        <div class="input-group ">
                                            <input type="text" id="dibayar{{ $siswa->nis }}" value=""
                                                class="form-control form-control-sm" oninput="formatrp(this)" onkeypress="enterDibayar(event)">
                                        </div>
                                    </div>
                                </div>
                                <div class=" mx-3">
                                    <label for="">Kembalian</label>
                                    <div class=" input-group mb-3">
                                        <input type="text" id="kembalian{{ $siswa->nis }}" value=""
                                            class=" form-control form-control-sm" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class=" card card-olive card-outline">
                <div class=" mx-5 mt-2 text-center">
                    <label style="font-size: 18px">Transaksi Pembayaran</label>
                </div>
                <div class=" row mx-2">
                    <div class=" table-responsive" style="height: 227px">
                        <table class="table table-sm ">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No</th>
                                    <th>Pembayaran</th>
                                    <th>Tagihan</th>
                                    <th>Sisa Tagihan</th>
                                    <th>
                                        <center>Tanggal</center>
                                    </th>
                                    <th>
                                        <center>Cetak</center>
                                    </th>
                                </tr>
                            </thead>
                            <?php $no = 1; ?>
                            @foreach ($t_bebas as $t)
                                <tbody>
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $t->nama_pembayaran }}</td>
                                        <td>{{ 'Rp. ' . number_format((float) $t->tarif, 0, ',', '.') }}</td>
                                        <td>{{ 'Rp. ' . number_format((float) $t->sisa_tagihan, 0, ',', '.') }}
                                        </td>
                                        <td>
                                            <center>{{ $t->created_at->format('d-m-Y') }}</center>
                                        </td>
                                        <td>
                                            <center>
                                                <a href="" class=" btn btn-success btn-sm">
                                                    <i class=" fa fa-print"></i>
                                                </a>
                                            </center>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                            @foreach ($t_bulanan as $t)
                                <tbody>
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $t->nama_pembayaran }}</td>
                                        <td>{{ 'Rp. ' . number_format((float) $t->tagihan, 0, ',', '.') }}</td>
                                        <td>{{ 'Rp. ' . number_format((float) $t->sisa_tagihan, 0, ',', '.') }}
                                        </td>
                                        <td>
                                            <center>{{ $t->created_at->format('d-m-Y') }}</center>
                                        </td>
                                        <td>
                                            <center>
                                                <a href="" class=" btn btn-success btn-sm">
                                                    <i class=" fa fa-print"></i>
                                                </a>
                                            </center>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        @elseif(isset($pesan))
            <script type="text/javascript">
                toastr.error("{{ $pesan }}")
            </script>
        @endif
    </div>

    <script src="{{ asset('js/pembayaran.js') }}"></script>
    <style>
        .red-button {
            background-color: red;
            color: white;
        }

        /* Gaya khusus untuk pesan konfirmasi */
        .confirmation-toast {
            background-color: #007bff;
            border-radius: 5px;
            padding: 10px;
            color: #ffffff;
            font-family: Arial, sans-serif;
            font-size: 14px;
            margin-bottom: 10px;
        }
    </style>

    <style>
        a {
            text-decoration: none;
            /* Menghapus garis bawah */
        }

        /* Gaya untuk hyperlink yang dipilih */
        a.selected {
            background-color: lightblue;
            /* Memberi latar belakang berwarna biru muda */
            color: black;
            /* Warna teks hitam */
            font-weight: bold;
            /* Teks tebal */
        }
    </style>
@endsection
