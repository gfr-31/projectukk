<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

// use PDF;

class CetakController extends Controller
{
    function viewPdf()
    {

        $pdf = PDF::loadview('print');
        return $pdf->download('tagihan.pdf');

    }
}
