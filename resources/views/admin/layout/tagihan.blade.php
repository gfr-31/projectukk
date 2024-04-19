<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>MH - Tagihan Siswa</title>
    <link rel="icon" href="{{ asset('gambar/icon1.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">

    <!-- External CSS libraries -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('fontawesome/css/font-awesome.min.css') }}">


    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('tagihan/css/style.css') }}">
</head>

<body>

    <!-- Invoice 7 start -->
    <div class="invoice-7 invoice-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="invoice-inner" style=""
                        id="invoice_wrapper1">
                        <div class="invoice-top ">
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="logo">
                                        <img src="{{ asset('tagihan/img/logos/icon.png') }}" alt="logo">
                                    </div>
                                </div>
                                <div class="col-sm-10 ">
                                    <div class="invoice">
                                        <h1>MTS MATHLA UL HUDA</h1>
                                        <p class="mb-1">Jl. Raya Cibunar No.3, Cibunar, Kec. Parung Panjang, Kabupaten
                                            Bogor, Jawa Barat 16360</p>
                                        <p class="mb-0">Telp. (021)5977424 | Web: www.mtsmathlaulhuda.com | Email:
                                            mtsmathlaulhuda.com</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="invoice-info">
                            <div class="row">
                                <div class="col-sm-6 ">
                                    <div class="invoice-number">
                                        <h4 class="inv-title-1">Tagihan</h4>
                                        <p class="mb-1">Nomor Tagihan <span>#45613</span></p>
                                        <p class="mb-0">Tanggal Tagihan <span>21 Sep 2021</span></p>
                                    </div>
                                </div>
                                <div class="col-sm-6 ">
                                    <div class="invoice-number text-end">
                                        <h4 class="inv-title-1">Tagihan Kepada</h4>
                                        @foreach ($siswa as $s)
                                            <p class="invo-addr-1">
                                                {{ $s->nama_ibu }}<br />
                                                {{ $s->no_hp_ortu }} <br />
                                                {{ $s->alamat }}<br />
                                            </p>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="order-summary">
                            <div class="table-responsive">
                                <table class="table invoice-table">
                                    <thead class="bg-active">
                                        <tr>
                                            {{-- <td class=" text-center">No </td> --}}
                                            <th class=" text-center">Kode </th>
                                            <th>Nama Tagihan </th>
                                            <th class="text-center">Jumlah Tagihan </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tagihan as $t)
                                            @if ($t->sisa_tagihan > 0)
                                                <tr>
                                                    {{-- <td></td> --}}
                                                    <td class="text-center">#-{{ $t->id }}</td>
                                                    <td class="text-start">{{ $t->nama_pembayaran }} </td>
                                                    <td class="text-end">
                                                        {{ 'Rp. ' . number_format((float) $t->sisa_tagihan, 0, ',', '.') }}
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        <tr>
                                            <td colspan="2" class="text-end">Total Keseluruhan</td>
                                            <td class="text-end">
                                                {{ 'Rp. ' . number_format((float) $totalKeseluruhan, 0, ',', '.') }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="invoice-informeshon">
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="payment-info mb-30">
                                        <h3 class="inv-title-1">Payment Info</h3>
                                        <ul class="bank-transfer-list-1">
                                            <li><strong>Account Name:</strong> 647 840</li>
                                            <li><strong>Account Number:</strong> Jhon Doe</li>
                                            <li><strong>Branch Name:</strong> xyz</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="nates mb-30">
                                        <h4 class="inv-title-1">Terms and Condistions</h4>
                                        <p class="text-muted">Once order done, money can't refund. Delivery might delay
                                            due to some external</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="invoice-contact clearfix">
                            <div class="row g-0">
                                <div class="col-lg-12 col-md-11 col-sm-12 ">
                                    <div class="contact-info">
                                        <a href=""><i class="fa fa-phone"></i> (021) 5977424</a>
                                        <a href=""><i class="fa fa-envelope"></i>
                                            mtsmathlaulhuda.gmail.com</a>
                                        <a href="" class="mr-0 d-none-580"><i class="fa fa-map-marker"></i> Jl.
                                            Raya Cibunar No.3, Parungpanjang, Bogor</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="invoice-btn-section clearfix d-print-none">
                        <a href="javascript:window.print()" class="btn btn-lg btn-print">
                            <i class="fa fa-print"></i> Print Invoice
                        </a>
                        <a id="invoice_download_btn1" class="btn btn-lg btn-download btn-theme">
                            <i cla ss="fa fa-download"></i> Download Tagihan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Invoice 7 end -->

    <script>
        document.getElementById('invoice_download_btn1').addEventListener('click', function() {
            // alert(123)
            var contentWidth = $("#invoice_wrapper1").width();
            var contentHeight = $("#invoice_wrapper1").height();
            var topLeftMargin = 20;
            var pdfWidth = contentWidth + (topLeftMargin * 2);
            var pdfHeight = (pdfWidth * 1.5) + (topLeftMargin * 2);
            var canvasImageWidth = contentWidth;
            var canvasImageHeight = contentHeight;
            var totalPDFPages = Math.ceil(contentHeight / pdfHeight) - 1;

            html2canvas($("#invoice_wrapper1")[0], {
                allowTaint: true
            }).then(function(canvas) {
                canvas.getContext('2d');
                var imgData = canvas.toDataURL("image/jpeg", 1.0);
                var pdf = new jsPDF('p', 'pt', [pdfWidth, pdfHeight]);
                pdf.addImage(imgData, 'JPG', topLeftMargin, topLeftMargin, canvasImageWidth,
                    canvasImageHeight);
                for (var i = 1; i <= totalPDFPages; i++) {
                    pdf.addPage(pdfWidth, pdfHeight);
                    pdf.addImage(imgData, 'JPG', topLeftMargin, -(pdfHeight * i) + (topLeftMargin * 4),
                        canvasImageWidth, canvasImageHeight);
                }
                pdf.save("tagihan.pdf");
            });
        })
    </script>
    <script src="{{ asset('js/pdf/html2canvas.js') }}"></script>
    <script src="{{ asset('js/pdf/jspdf.min.js') }}"></script>
    <script src="{{ asset('jquery-3.7.1.min.js') }}"></script>

</body>

</html>
