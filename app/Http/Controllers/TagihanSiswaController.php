<?php

namespace App\Http\Controllers;

use App\Models\TarifPembayaranBebas;
use App\Models\TarifPembayaranBulanan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TagihanSiswaController extends Controller
{
    public function tagihan($id)
    {
        $tpBulanan = TarifPembayaranBulanan::where('siswa_id', $id)->get();
        $tpBebas = TarifPembayaranBebas::where('siswa_id', $id)->get();
        $tagihan = $tpBulanan->concat($tpBebas);
        // dd($tagihan);
        return view('siswa.layout.tagihan_siswa.tagihan', compact('tagihan'));
    }

}