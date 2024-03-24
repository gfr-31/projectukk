<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\TarifPembayaranBulanan;
use App\Models\TarifPembayaranBebas;
use App\Models\TransaksiBebas;
use App\Models\TransaksiBulanan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    // Pembayaran
    public function transaksi(Request $request)
    {
        $admin = DB::table('users')->get();
        // $cariSiswa = $request->input('search');
        // $siswa = Siswa::with('kelas')->orWhere('nis', 'LIKE', '%'.$cariSiswa.'%')->get();
        return view('admin.layout.pembayaran.pembayaran', compact('admin'));
    }

    public function cariSiswa(Request $request)
    {
        $admin = DB::table('users')->get();
        $nis = $request->input('nis');
        $siswa = Siswa::with('kelas')->where('nis', $nis)->first();
        // dd($siswa);
        if ($siswa) {
            // Mengambil data TarifPembayaranBulanan berdasarkan NIS siswa
            $tpBulanan = TarifPembayaranBulanan::whereHas('siswa', function ($query) use ($nis) {
                $query->where('nis', $nis);
            })->orderBy('tahun_ajaran', 'asc')->get(['id', 'siswa_id', 'nama_pembayaran', 'tahun_ajaran', 'tipe', 'kelas_id', 'juli', 'agustus', 'september', 'oktober', 'november', 'desember', 'january', 'february', 'maret', 'april', 'mei', 'juni', 'tagihan', 'sisa_tagihan']);
            // dd($tpb);
            $tpBebas = TarifPembayaranBebas::whereHas('Siswa', function ($query) use ($nis) {
                $query->where('nis', $nis);
            })->orderBy('tahun_ajaran', 'asc')->get(['id', 'tahun_ajaran', 'siswa_id', 'nama_pembayaran', 'tahun_ajaran', 'tipe', 'kelas_id', 'tarif', 'sisa_tagihan', 'jumlah_bayar', 'keterangan']);

            $t_bulanan = TransaksiBulanan::whereHas('Siswa', function ($query) use ($nis) {
                $query->where('nis', $nis);
            })->orderBy('created_at', 'asc')->get(['kelas_id', 'siswa_id', 'nama_pembayaran', 'tahun_ajaran', 'tipe', 'tagihan', 'sisa_tagihan', 'jumlah_bayar', 'bulan', 'created_at']);

            $t_bebas = TransaksiBebas::whereHas('Siswa', function ($query) use ($nis) {
                $query->where('nis', $nis);
            })->orderBy('created_at', 'asc')->get(['tahun_ajaran', 'kelas_id', 'siswa_id', 'nama_pembayaran', 'tipe', 'tarif', 'jumlah_bayar', 'sisa_tagihan', 'keterangan', 'created_at']);
            // $transaksi = $transaksi_bulanan->union($transaksi_bebas)->get();
            // dd($transaksi);
            $pesan = "Data Siswa Berhasil Ditemukan";
            // dd($tpBebas);
            return view('admin.layout.pembayaran.pembayaran', compact('admin', 'siswa', 'tpBulanan', 'tpBebas', 'pesan', 't_bulanan', 't_bebas'));
        } else {
            $pesan = "Data Siswa Tidak Ditemukan";
            // dd($pesan);
            return view('admin.layout.pembayaran.pembayaran', compact('admin', 'pesan'));
        }
    }

    public function simpanPembayaran(Request $request)
    {
        // dd($request->all());
        // dd($total);

        return back();
        try {
            if ($request->tipe == "Bulanan") {
                $juli = $request->input('juli' . $request->id);
                $agustus = $request->input('agustus' . $request->id);
                $september = $request->input('september' . $request->id);
                $oktober = $request->input('oktober' . $request->id);
                $november = $request->input('november' . $request->id);
                $desember = $request->input('desember' . $request->id);
                $january = $request->input('january' . $request->id);
                $february = $request->input('february' . $request->id);
                $maret = $request->input('maret' . $request->id);
                $april = $request->input('april' . $request->id);
                $mei = $request->input('mei' . $request->id);
                $juni = $request->input('juni' . $request->id);
                $tagihan = $request->input('tagihan' . $request->id);
                $sisa_tagihan = $request->input('sisa_tagihan' . $request->id);
                // dd($sisa_tagihan);
                DB::table('transaksi_bulanan')->insert([
                    'kelas_id' => $request->kelas,
                    'siswa_id' => $request->siswa,
                    'nama_pembayaran' => $request->np,
                    'tahun_ajaran' => $request->ta,
                    'tipe' => $request->tipe,
                    'tagihan' => $tagihan,
                    'sisa_tagihan' => $sisa_tagihan,
                    'jumlah_bayar' => $request->jumlah_bayar,
                    'bulan' => $request->bulan,
                    'created_at' => now()
                ]);
                $i = DB::table('tarif_pembayaran_bulanan')->where([['id', $request->id], ['nama_pembayaran', $request->np]])->update([
                    'nama_pembayaran' => $request->np,
                    'tahun_ajaran' => $request->ta,
                    'tipe' => $request->tipe,
                    'kelas_id' => $request->kelas,
                    'siswa_id' => $request->siswa,
                    'juli' => $juli,
                    'agustus' => $agustus,
                    'september' => $september,
                    'oktober' => $oktober,
                    'november' => $november,
                    'desember' => $desember,
                    'january' => $january,
                    'february' => $february,
                    'maret' => $maret,
                    'april' => $april,
                    'mei' => $mei,
                    'juni' => $juni,
                    'tagihan' => $tagihan,
                    'sisa_tagihan' => $sisa_tagihan
                ]);
                // dd($i->sql());
                $nm =  $request->np;
                $pesan = "Pembayaran  $nm  Berhasil";
                session()->flash('key', $pesan);
                return redirect()->back();
            } elseif ($request->tipe == "Bebas") {
                $tarif = (int) preg_replace('/\D/', '', $request->tarif);
                $sisaTagihan = (int) preg_replace('/\D/', '', $request->sisaTagihan);
                $jumlahBayar = (int) preg_replace('/\D/', '', $request->jumlahBayar);
                // dd($jumlahBayar);
                DB::table('transaksi_bebas')->insert([
                    'tahun_ajaran' => $request->ta,
                    'kelas_id' => $request->kelas,
                    'siswa_id' => $request->siswa,
                    'nama_pembayaran' => $request->namaPembayaran,
                    'tipe' => $request->tipe,
                    'tarif' => $tarif,
                    'jumlah_bayar' => $jumlahBayar,
                    'sisa_tagihan' => $sisaTagihan - $jumlahBayar,
                    'keterangan' => $request->keterangan,
                    'created_at' => now()
                ]);
                DB::table('tarif_pembayaran_bebas')->where('id', $request->id)->update([
                    'sisa_tagihan' => $sisaTagihan - $jumlahBayar,
                    'jumlah_bayar' => $jumlahBayar,
                    'keterangan' => $request->keterangan,
                ]);
                $nm =  $request->namaPembayaran;
                $pesan = "Pembayaran  $nm  Berhasil";
                session()->flash('key', $pesan);
                return redirect()->back();
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

}
