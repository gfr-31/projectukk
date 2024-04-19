<?php

namespace App\Http\Controllers;

use App\Models\TarifPembayaranBebas;
use App\Models\TarifPembayaranBulanan;
use App\Models\TransaksiBulanan;
use App\Models\TransaksiBebas;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TagihanSiswaController extends Controller
{
    public function tagihan($nis)
    {
        $tpBulanan = TarifPembayaranBulanan::whereHas('siswa', function ($query) use ($nis) {
            $query->where('nis', $nis);
        })->orderBy('tahun_ajaran', 'asc')->get(['id', 'siswa_id', 'nama_pembayaran', 'tahun_ajaran', 'tipe', 'kelas_id', 'juli', 'agustus', 'september', 'oktober', 'november', 'desember', 'january', 'february', 'maret', 'april', 'mei', 'juni', 'tagihan', 'sisa_tagihan']);
        // dd($tpb);
        $tpBebas = TarifPembayaranBebas::whereHas('Siswa', function ($query) use ($nis) {
            $query->where('nis', $nis);
        })->orderBy('tahun_ajaran', 'asc')->get(['id', 'tahun_ajaran', 'siswa_id', 'nama_pembayaran', 'tahun_ajaran', 'tipe', 'kelas_id', 'tarif', 'sisa_tagihan', 'jumlah_bayar', 'keterangan']);
        $t_bulanan = TransaksiBulanan::whereHas('Siswa', function ($query) use ($nis) {
            $query->where('nis', $nis);
        })->orderBy('created_at', 'desc')->get();
        // dd($t_bulanan);
        $t_bebas = TransaksiBebas::whereHas('Siswa', function ($query) use ($nis) {
            $query->where('nis', $nis);
        })->orderBy('created_at', 'desc')->get();

        // dd($tagihan);
        return view('siswa.layout.tagihan_siswa.tagihan', compact('tpBulanan', 'tpBebas', 't_bulanan', 't_bebas'));
    }

}