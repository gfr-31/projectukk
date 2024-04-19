<?php

namespace App\Http\Controllers;

use App\Models\TahunAjaran;
use App\Services\NotifWa;

use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\TarifPembayaranBebas;
use App\Models\TarifPembayaranBulanan;
use App\Models\JenisPembayaran;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KirimTagihanController extends Controller
{
    public function kirimTagihan()
    {
        $admin = DB::table('users')->get();
        $jenis_pembayaran = JenisPembayaran::with('TahunAjaran')->get();
        return view('admin.layout.kirim_tagihan.kirim_tagihan', compact('admin', 'jenis_pembayaran'));
    }

    public function kirimNotif($tipe, $nama_pembayaran)
    {
        if ($tipe == "Bebas") {
            $siswa_ids = TarifPembayaranBebas::pluck('siswa_id');
            $siswas = Siswa::whereIn('id', $siswa_ids)->get();

            foreach ($siswas as $siswa) {
                $nama = $siswa->nama_lengkap;
                $kelas = $siswa->kelas->kelas;
                $tagihan = TarifPembayaranBebas::where('nama_pembayaran', $nama_pembayaran)
                    ->where('siswa_id', $siswa->id)
                    ->pluck('sisa_tagihan')
                    ->first();
                $ta = TarifPembayaranBebas::where('nama_pembayaran', $nama_pembayaran)
                    ->where('siswa_id', $siswa->id)
                    ->pluck('tahun_ajaran')
                    ->first();

                if ($tagihan !== null && $ta !== null && $tagihan > 0) {
                    $pesan = '
*Pemberitahuan Pembayaran '.$nama_pembayaran.'*

    Diberitahukan kepada orang tua/wali dari Ananda Siswa dengan detail sebagai berikut : 

*Nama : ' . $nama . '*
*Kelas : ' . $kelas . '*
*Jumlah Tagihan : ' . 'Rp. ' . number_format($tagihan, 0, ',', '.') . '*
*Tagihan  : ' . $nama_pembayaran . '*
*TA : ' . $ta . '*

    Diharapkan untuk segera melunasi Tagihan tersebut, dan segera datang ke bagian Aministrasi untuk melakukan pembayaran dengan membawa kartu SPP atau Kartu Bayaran

Demikian Terimakasih 
Salam,
Admin SPP

*_Abaikan jika sudah membayar_*';

                    // Kirim pesan ke nomor telepon orang tua siswa yang bersangkutan
                    // dd($siswa->no_hp_ortu);
                    // dd($pesan);
                    NotifWa::NotifWa($siswa->no_hp_ortu, $pesan);
                }
            }
            return redirect()->back()->with('berhasilKirim', 'Pesan Tagihan Behasil Dikirim');

        } elseif ($tipe == "Bulanan") {
            $siswa_ids = TarifPembayaranBulanan::pluck('siswa_id');
            $siswas = Siswa::whereIn('id', $siswa_ids)->get();

            foreach ($siswas as $siswa) {
                $nama = $siswa->nama_lengkap;
                $kelas = $siswa->kelas->kelas;
                $tagihan = TarifPembayaranBulanan::where('nama_pembayaran', $nama_pembayaran)
                    ->where('siswa_id', $siswa->id)
                    ->pluck('sisa_tagihan')
                    ->first();
                $ta = TarifPembayaranBulanan::where('nama_pembayaran', $nama_pembayaran)
                    ->where('siswa_id', $siswa->id)
                    ->pluck('tahun_ajaran')
                    ->first();

                if ($tagihan !== null && $ta !== null && $tagihan > 0) {
                    $pesan = '
*Pemberitahuan Pembayaran '.$nama_pembayaran.'*

    Diberitahukan kepada orang tua/wali dari Ananda Siswa dengan detail sebagai berikut : 

*Nama : ' . $nama . '*
*Kelas : ' . $kelas . '*
*Jumlah Tagihan : ' . 'Rp. ' . number_format($tagihan, 0, ',', '.') . '*
*Tagihan  : ' . $nama_pembayaran . '*
*TA : ' . $ta . '*

    Diharapkan untuk segera melunasi Tagihan tersebut, dan segera datang ke bagian Aministrasi untuk melakukan pembayaran dengan membawa kartu SPP atau Kartu Bayaran

Demikian Terimakasih 
Salam,
Admin SPP

*_Abaikan jika sudah membayar_*';

                    // Kirim pesan ke nomor telepon orang tua siswa yang bersangkutan
                    // dd($siswa->no_hp_ortu);
                    // dd($pesan);
                    NotifWa::NotifWa($siswa->no_hp_ortu, $pesan);
                }
            }
            return redirect()->back()->with('berhasilKirim', 'Pesan Tagihan Behasil Dikirim');
        }
    }
}
