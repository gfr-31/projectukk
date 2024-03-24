<?php

namespace App\Http\Controllers;

use App\Services\NotifWa;

use App\Models\Siswa;
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

    public function kirimNotif($tipe)
    {
        if ($tipe == "Bebas") {
            $siswa = TarifPembayaranBebas::with('Siswa')->pluck('siswa_id');
            $no_hp = Siswa::whereIn('id', $siswa)->get();

            // Ambil nomor telepon ortu dari setiap siswa
            $data = [];
            foreach ($no_hp as $i) {
                $data[] = $i['no_hp_ortu'];
            }

            $target = implode(',', $data);
            $pesan = "*Pemberitahuan Pembayaran SPP - T. A 2023/2024*\n\n";
            $pesan .= "Diberitahukan kepada orang tua/wali dari Ananda/Anandi Siswa dengan, ";
            $pesan .= "diharapkan untuk segera melunasi tagihan tersebut. Segera datang ke Bagian Administrasi untuk melakukan pembayaran dengan membawa Buku SPP.\n\n";
            $pesan .= "Demikian, terima kasih.\n";
            $pesan .= "Salam, Admin SPP\n\n";
            $pesan .= "*_Abaikan jika sudah membayar._*";
            // dd($target);

            // dd($target, $pesan);
            NotifWa::NotifWa($target, $pesan);
            return redirect()->back();

        } elseif ($tipe == "Bulanan") {
            $siswa = TarifPembayaranBulanan::with('Siswa')->pluck('siswa_id');
            $no_hp = Siswa::whereIn('id', $siswa)->get();

            // Ambil nomer telepon ortu dai setiap siswa
            foreach ($no_hp as $i) {
                $data[] = $i['no_hp_ortu'];
            }

            $target = implode(',', $data);
            $pesan = "*Pemberitahuan Pembayaran" . "*\n\n";
            $pesan .= "Diberitahukan kepada orang tua/wali dari Ananda/Anandi Siswa dengan, ";
            $pesan .= "diharapkan untuk segera melunasi tagihan tersebut.\nSegera datang ke Bagian Administrasi untuk melakukan pembayaran dengan membawa Buku SPP.\n\n";
            $pesan .= "Demikian, terima kasih.\n";
            $pesan .= "Salam, Admin SPP\n\n";
            $pesan .= "*_Abaikan jika sudah membayar._*";
            // dd($target, $pesan);
            NotifWa::NotifWa($target, $pesan);
            return redirect()->back();
        }
    }
}
