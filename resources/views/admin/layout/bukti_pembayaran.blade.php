<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bukti Pembayaran Siswa</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('fontawesome/css/font-awesome.min.css') }}">

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <link rel="icon" href="{{ asset('gambar/icon1.png') }}">

</head>

<body class=" mt-5" style="font-family: 'Times New Roman', Times, serif;  background:#ffffff">
    <div class=" container" id="invoice_wrapper">
        <div class="row bg-white">
            <div class=" col-lg-12">
                <div class=" row">
                    {{-- <div class=" col-md-1"></div>   --}}
                    <div class=" col-md-1 text-center d-flex align-items-center justify-content-center">
                        <img src="{{ asset('gambar/icon.png') }}" width="90x" alt="" loading="lazy">
                    </div>
                    <div class=" col-md-10">
                        <h2 style="margin-top: 10px"><strong>MTS MATHLA UL HUDA</strong></h2>
                        <small style="display:flex; line-height:1.2">
                            Jl. Raya Cibunar No.3, Cibunar, Kec. Parung Panjang, Kabupaten Bogor, Jawa Barat 16360
                            <br>Telp. (021)5977424 | Web: www.mtsmathlaulhuda.com | Email: mtsmathlaulhuda.com
                        </small>
                    </div>
                </div>
                <table class=" mt-1" style="width: 100%;">
                    <tr>
                        <th
                            style="text-align: center; border-top: 1px solid black; border-bottom: 1px solid black; vertical-align:middle; padding-bottom:2px;padding-top:2px">
                            <h4 style="margin: 0; padding-top:2px; padding-bottom:2px">
                                <strong>BUKTI PEMBAYARAN SISWA</strong>
                            </h4>
                        </th>
                    </tr>
                </table>
                @if (isset($t_bulanan))
                    <div class=" row">
                        <div class=" col-md-6">
                            @foreach ($t_bulanan as $t)
                                <table>
                                    <tr>
                                        <td style="padding: 5px; padding-top: 0; padding-bottom: 0;">Kode Transaksi</td>
                                        <td>:</td>
                                        <td style="padding: 5px; padding-top: 0; padding-bottom: 0;">
                                            {{ $t->kode_transaksi }}</td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 5px; padding-top: 0; padding-bottom: 0;">Tanggal Transaksi
                                        </td>
                                        <td>:</td>
                                        <td style="padding: 5px; padding-top: 0; padding-bottom: 0;">
                                            {{ substr($t->created_at, 0, 10) }}</td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 5px; padding-top: 0; padding-bottom: 0;">Jam Transaksi</td>
                                        <td>:</td>
                                        <td style="padding: 5px; padding-top: 0; padding-bottom: 0;">
                                            {{ substr($t->created_at, 11) }}</td>
                                    </tr>
                                </table>
                            @endforeach
                        </div>
                        <div class=" col-md-6 ">
                            @foreach ($t_bulanan as $t)
                                <table>
                                    <tr>
                                        <td style="padding: 5px; padding-top: 0; padding-bottom: 0;">NIS</td>
                                        <td>:</td>
                                        <td style="padding: 5px; padding-top: 0; padding-bottom: 0;">
                                            {{ $t->Siswa->nis }}</td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 5px; padding-top: 0; padding-bottom: 0;">Nama Siswa</td>
                                        <td>:</td>
                                        <td style="padding: 5px; padding-top: 0; padding-bottom: 0;">
                                            @php
                                                $nama_lengkap = $t->Siswa->nama_lengkap;
                                                // Memeriksa apakah nama_lengkap memiliki lebih dari 5 kata
                                                if (str_word_count($nama_lengkap) > 5) {
                                                    // Mengambil kata pertama hingga keempat
                                                    $potongan_nama = implode(
                                                        ' ',
                                                        array_slice(explode(' ', $nama_lengkap), 0, 4),
                                                    );
                                                    // Mengambil inisial kata terakhir
                                                    $inisial_terakhir = substr(strrchr($nama_lengkap, ' '), 0, 2) . '.';
                                                    // Menggabungkan potongan nama dengan inisial terakhir
                                                    $nama_singkat = $potongan_nama . ' ' . $inisial_terakhir;
                                                    echo $nama_singkat;
                                                } else {
                                                    echo $nama_lengkap;
                                                }
                                            @endphp
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 5px; padding-top: 0; padding-bottom: 0;">Kelas</td>
                                        <td>:</td>
                                        <td style="padding: 5px; padding-top: 0; padding-bottom: 0;">
                                            {{ $t->Siswa->kelas->kelas }}
                                        </td>
                                    </tr>
                                </table>
                            @endforeach
                        </div>
                    </div>
                    <div>
                        <table class=" mt-2" style="width: 100%">
                            <thead style="; border-top: 1px solid black; border-bottom: 1px solid black">
                                <tr>
                                    <th style="text-align: center;width: 5%; vertical-align:middle " class="">
                                        <h5 style="margin: 0; padding-top:2px; padding-bottom:2px"><strong>No. </strong>
                                        </h5>
                                    </th>
                                    <th style="width: 40%; vertical-align:middle " class="">
                                        <h5 style="margin: 0; padding-top:2px; padding-bottom:2px"><strong>Keterangan
                                                Pembayaran</strong></h5>
                                    </th>
                                    <th style="width: 30%;  vertical-align:middle " class=" ">
                                        <h5 style="margin: 0; padding-top:2px; padding-bottom:2px">
                                            <strong>Bulan</strong>
                                        </h5>
                                    </th>
                                    <th style="text-align: center;width: 25%; vertical-align:middle " class="">
                                        <h5 style="margin: 0; padding-top:2px; padding-bottom:2px"><strong>Jumlah
                                                (Rp.)</strong>
                                        </h5>
                                    </th>
                                </tr>
                            </thead>
                            @foreach ($t_bulanan as $t)
                                <tbody class="">
                                    <tr>
                                        <td style="text-align: center">1</td>
                                        <td>{{ $t->nama_pembayaran }}</td>
                                        <td>{{ ucfirst($t->bulan) }}</td>
                                        <td style="text-align: end">
                                            {{ 'Rp. ' . number_format((float) $t->jumlah_bayar, 0, ',', '.') . ',00' }}
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                        <div class=" mt-4" style="border-bottom: 1px solid black"></div>
                        <div class=" row mt-1">
                            <div class=" col-md-7 ">
                                @foreach ($t_bulanan as $t)
                                    <table>
                                        <tr>
                                            <th>Terbilang :</th>
                                            <th><i>{{ $t->jumlah_bayar_terbilang }} </i> </th>
                                        </tr>
                                    </table>
                                @endforeach
                            </div>
                            <div class=" col-md-5  " style="border-bottom: 1px solid black">
                                @foreach ($t_bulanan as $t)
                                    <table style="width: 100%">
                                        <tr>
                                            <th>Grand Total :</th>
                                            <th style="text-align: end">
                                                {{ 'Rp. ' . number_format((float) $t->jumlah_bayar, 0, ',', '.') . ',00' }}
                                            </th>
                                        </tr>
                                    </table>
                                @endforeach
                            </div>
                        </div>
                        <div class=" row mt-3">
                            <div class=" col-md-7">
                                <small style="display: flex;line-height:1.2">
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    Catatatan: <br>
                                    - Disimpan sebagai bukti pembayaran yang SAH. <br>
                                    - Uang yang sudah dibayarkan tidak dapat diminta kembali.
                                </small>
                            </div>
                            <div class=" col-md-5">
                                @foreach ($t_bulanan as $t)
                                    <h6 class=" text-center">
                                        Parungpanjang, {{ $t->tanggal_formatted }}
                                        <br>
                                        Yang Menerima,
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        {{ $t->Siswa->nama_ibu }}
                                    </h6>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @elseif(isset($t_bebas))
                    <div class=" row">
                        <div class=" col-md-6">
                            @foreach ($t_bebas as $t)
                                <table>
                                    <tr>
                                        <td style="padding: 5px; padding-top: 0; padding-bottom: 0;">Kode Transaksi</td>
                                        <td>:</td>
                                        <td style="padding: 5px; padding-top: 0; padding-bottom: 0;">
                                            {{ $t->kode_transaksi }}</td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 5px; padding-top: 0; padding-bottom: 0;">Tanggal Transaksi
                                        </td>
                                        <td>:</td>
                                        <td style="padding: 5px; padding-top: 0; padding-bottom: 0;">
                                            {{ substr($t->created_at, 0, 10) }}</td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 5px; padding-top: 0; padding-bottom: 0;">Jam Transaksi</td>
                                        <td>:</td>
                                        <td style="padding: 5px; padding-top: 0; padding-bottom: 0;">
                                            {{ substr($t->created_at, 11) }}</td>
                                    </tr>
                                </table>
                            @endforeach
                        </div>
                        <div class=" col-md-6 ">
                            @foreach ($t_bebas as $t)
                                <table>
                                    <tr>
                                        <td style="padding: 5px; padding-top: 0; padding-bottom: 0;">NIS</td>
                                        <td>:</td>
                                        <td style="padding: 5px; padding-top: 0; padding-bottom: 0;">
                                            {{ $t->Siswa->nis }}</td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 5px; padding-top: 0; padding-bottom: 0;">Nama Siswa</td>
                                        <td>:</td>
                                        <td style="padding: 5px; padding-top: 0; padding-bottom: 0;">
                                            @php
                                                $nama_lengkap = $t->Siswa->nama_lengkap;
                                                // Memeriksa apakah nama_lengkap memiliki lebih dari 5 kata
                                                if (str_word_count($nama_lengkap) > 5) {
                                                    // Mengambil kata pertama hingga keempat
                                                    $potongan_nama = implode(
                                                        ' ',
                                                        array_slice(explode(' ', $nama_lengkap), 0, 4),
                                                    );
                                                    // Mengambil inisial kata terakhir
                                                    $inisial_terakhir = substr(strrchr($nama_lengkap, ' '), 0, 2) . '.';
                                                    // Menggabungkan potongan nama dengan inisial terakhir
                                                    $nama_singkat = $potongan_nama . ' ' . $inisial_terakhir;
                                                    echo $nama_singkat;
                                                } else {
                                                    echo $nama_lengkap;
                                                }
                                            @endphp
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 5px; padding-top: 0; padding-bottom: 0;">Kelas</td>
                                        <td>:</td>
                                        <td style="padding: 5px; padding-top: 0; padding-bottom: 0;">
                                            {{ $t->Siswa->kelas->kelas }}
                                        </td>
                                    </tr>
                                </table>
                            @endforeach
                        </div>
                    </div>
                    <div>
                        <table class=" mt-2" style="width: 100%">
                            <thead style="; border-top: 1px solid black; border-bottom: 1px solid black">
                                <tr>
                                    <th style="text-align: center;width: 5%; vertical-align:middle " class="">
                                        <h5 style="margin: 0; padding-top:2px; padding-bottom:2px"><strong>No.
                                            </strong>
                                        </h5>
                                    </th>
                                    <th style="width: 40%; vertical-align:middle " class="">
                                        <h5 style="margin: 0; padding-top:2px; padding-bottom:2px"><strong>Ketarangan
                                                Pembayaran</strong></h5>
                                    </th>
                                    <th style="text-align: end;width: 25%; vertical-align:middle " class="">
                                        <h5 style="margin: 0; padding-top:2px; padding-bottom:2px"><strong>Jumlah
                                                (Rp.)</strong>
                                        </h5>
                                    </th>
                                </tr>
                            </thead>
                            @foreach ($t_bebas as $t)
                                <tbody class="">
                                    <tr>
                                        <td style="text-align: center">1</td>
                                        <td>{{ $t->nama_pembayaran }}</td>
                                        <td style="text-align: end">
                                            {{ 'Rp. ' . number_format((float) $t->jumlah_bayar, 0, ',', '.') . ',00' }}
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                        <div class=" mt-4" style="border-bottom: 1px solid black"></div>
                        <div class=" row mt-1">
                            <div class=" col-md-7 ">
                                @foreach ($t_bebas as $t)
                                    <table>
                                        <tr>
                                            <th>Terbilang :</th>
                                            <th><i>{{ $t->jumlah_bayar_terbilang }} </i> </th>
                                        </tr>
                                    </table>
                                @endforeach
                            </div>
                            <div class=" col-md-5  " style="border-bottom: 1px solid black">
                                @foreach ($t_bebas as $t)
                                    <table style="width: 100%">
                                        <tr>
                                            <th>Grand Total :</th>
                                            <th style="text-align: end">
                                                {{ 'Rp. ' . number_format((float) $t->jumlah_bayar, 0, ',', '.') . ',00' }}
                                            </th>
                                        </tr>
                                    </table>
                                @endforeach
                            </div>
                        </div>
                        <div class=" row mt-3">
                            <div class=" col-md-7">
                                <small style="display: flex;line-height:1.2">
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    Catatatan: <br>
                                    - Disimpan sebagai bukti pembayaran yang SAH. <br>
                                    - Uang yang sudah dibayarkan tidak dapat diminta kembali.
                                </small>
                            </div>
                            <div class=" col-md-5">
                                @foreach ($t_bebas as $t)
                                    <h6 class=" text-center">
                                        Parungpanjang, {{ $t->tanggal_formatted }}
                                        <br>
                                        Yang Menerima,
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        {{ $t->Siswa->nama_ibu }}
                                    </h6>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <br><br>
    <hr>
    <div class="invoice-btn-section clearfix d-print-none mt-4 text-center justify-content-center " style="font-family: 'Poppins', sans-serif;">
        <a href="javascript:window.print()" class="btn btn-print btn-dark">
            <i class="fa fa-print"></i> Print Invoice
        </a>
        <a id="invoice_download_btn" class="btn btn-download btn-primary">
            <i class="fa fa-download"></i> Download Bukti
        </a>
    </div>
</body>

    <script src="{{ asset('js/pdf/app.js') }}"></script>
    <script src="{{ asset('js/pdf/html2canvas.js') }}"></script>
    <script src="{{ asset('js/pdf/jspdf.min.js') }}"></script>
    <script src="{{ asset('jquery-3.7.1.min.js') }}"></script>

{{-- <script>
    window.print();
</script> --}}

</html>
