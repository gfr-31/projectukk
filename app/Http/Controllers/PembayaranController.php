<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\TarifPembayaranBulanan;
use App\Models\TarifPembayaranBebas;
use App\Models\TransaksiBebas;
use App\Models\TransaksiBulanan;
use App\Services\NotifWa;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    // Pembayaran
    public function transaksi(Request $request)
    {
        $admin = User::get();
        // $cariSiswa = $request->input('search');
        // $siswa = Siswa::with('kelas')->orWhere('nis', 'LIKE', '%'.$cariSiswa.'%')->get();
        return view('admin.layout.pembayaran.pembayaran', compact('admin'));
    }

    public function cariSiswa(Request $request)
    {
        $admin = DB::table('users')->get();
        $nis = $request->input('nis');
        $siswa = Siswa::with('kelas')->where('nis', $nis)->first();

        $kelasId = Siswa::with('kelas')->where('nis', $nis)->pluck('kelas_id')->first();
        $siswaId = Siswa::with('kelas')->where('nis', $nis)->pluck('id')->first();
        $coba = DB::table('coba')->get();
        $pembayaran = DB::table('coba')
            ->where('kelas_id', $kelasId)
            ->where('siswa_id', $siswaId)
            ->first();
        // dd($pembayaran);
        $bulanLunas = $pembayaran ? json_decode($pembayaran->bulan_lunas, true) : [];
        // dd($bulanLunas);
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
            })->orderBy('created_at', 'desc')->get();
            // dd($t_bulanan);
            $t_bebas = TransaksiBebas::whereHas('Siswa', function ($query) use ($nis) {
                $query->where('nis', $nis);
            })->orderBy('created_at', 'desc')->get();
            // $transaksi = $transaksi_bulanan->union($transaksi_bebas)->get();
            // dd($transaksi);
            // dd($tpBebas);
            return view('admin.layout.pembayaran.pembayaran', compact('admin', 'siswa', 'tpBulanan', 'tpBebas', 't_bulanan', 't_bebas', 'coba', 'bulanLunas'));
        } else {
            $pesan = "Data Siswa Tidak Ditemukan";
            // dd($pesan);
            return view('admin.layout.pembayaran.pembayaran', compact('admin', 'pesan'));
        }
    }

    public function simpanPembayaran(Request $request)
    {
        try {
            if ($request->tipe == "Bulanan") {
                $st = $request->input('sisa_tagihan' . $request->id);
                if ($st > 0) {
                    $bulan = ucfirst($request->bulan);
                    $np = $request->np;
                    $ta = date('Y');
                    $jb = $request->jumlah_bayar;
                    $nama = Siswa::where('id', $request->siswa)->pluck('nama_lengkap')->first();
                    $target = Siswa::where('id', $request->siswa)->pluck('no_hp_ortu')->first();
                    $pesan = "
Pembayaran *" . $np . "*, 

Atas nama *" . $nama . "*.

Pada bulan *" . $bulan . " " . $ta . "*, sebesar *" . 'Rp. ' . number_format($jb, 0, ',', '.') . ',' . 0 . "" . 0 . "* berhasil dilakukan,
Sisa Tagihan " . $np . " yang tersisi adalah sebesar *" . 'Rp. ' . number_format($st, 0, ',', '.') . ',' . 0 . "" . 0 . ".*" .
                        "
                    
Tanggal Pembayaran : " . date('d-m-Y') . "
                ";
                    // dd($target, $pesan);
                    NotifWa::NotifWa($target, $pesan);
                } else {
                    $bulan = ucfirst($request->bulan);
                    $np = $request->np;
                    $ta = date('Y');
                    $jb = $request->jumlah_bayar;
                    $nama = Siswa::where('id', $request->siswa)->pluck('nama_lengkap')->first();
                    $target = Siswa::where('id', $request->siswa)->pluck('no_hp_ortu')->first();
                    $pesan = "
Pembayaran *" . $np . "*, 

Atas nama *" . $nama . "*.

Pada bulan *" . $bulan . " " . $ta . "*, sebesar *" . 'Rp. ' . number_format($jb, 0, ',', '.') . ',' . 0 . "" . 0 . "* berhasil dilakukan dan Sudah *LUNAS*,
Sisa Tagihan " . $np . " yang tersisi adalah sebesar *" . 'Rp. ' . number_format($st, 0, ',', '.') . ',' . 0 . "" . 0 . ".*" .
                        "
                    
Tanggal Pembayaran : " . date('d-m-Y') . "
                ";
                    // dd($target, $pesan);
                    NotifWa::NotifWa($target, $pesan);
                }
                // return back();

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
                $a = date('ymd');
                $b = TransaksiBulanan::max('id') + 1;
                $huruf = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $c = substr(str_shuffle($huruf), 0, 3);
                $d = mt_rand(100, 999);

                $kode = 'BPS' . $d . '-' . $a . '-' . $c . $b;
                // dd($b);
                DB::table('transaksi_bulanan')->insert([
                    'kode_transaksi' => $kode,
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
                $nm = $request->np;
                $pesan = "Pembayaran  $nm  Berhasil";
                session()->flash('key', $pesan);
                return redirect()->back();
            } elseif ($request->tipe == "Bebas") {
                // dd($request->all());
                $sisaTagihan = (int) preg_replace('/\D/', '', $request->sisaTagihan);
                $jumlahBayar = (int) preg_replace('/\D/', '', $request->jumlahBayar);
                if ($sisaTagihan - $jumlahBayar > 0) {
                    $target = Siswa::where('id', $request->siswa)->pluck('no_hp_ortu')->first();
                    $np = $request->namaPembayaran;
                    $ta = date('d-m-Y');
                    $jb = $request->jumlahBayar;

                    $st = $sisaTagihan - $jumlahBayar;
                    $nama = Siswa::where('id', $request->siswa)->pluck('nama_lengkap')->first();
                    $pesan = "
Pembayaran *" . $np . "*, 

Atas nama *" . $nama . "*.

Pada tanggal " . $ta . ", sebesar *" . $jb . ',' . 0 . "" . 0 . "* berhasil dilakukan,
Sisa Tagihan " . $np . " yang tersisi adalah sebesar *" . 'Rp. ' . number_format($st, 0, ',', '.') . ',' . 0 . "" . 0 . "*" .
                        "

                ";
                    // dd($target, $pesan);
                    NotifWa::NotifWa($target, $pesan);
                    // return back();
                } else {
                    $target = Siswa::where('id', $request->siswa)->pluck('no_hp_ortu')->first();
                    $np = $request->namaPembayaran;
                    $ta = date('d-m-Y');
                    $jb = $request->jumlahBayar;

                    $nama = Siswa::where('id', $request->siswa)->pluck('nama_lengkap')->first();
                    $pesan = "
Pembayaran *" . $np . "*, 

Atas nama *" . $nama . "*.

Pada tanggal " . $ta . ", sebesar *" . $jb . ',' . 0 . "" . 0 . "* berhasil dilakukan,
Sisa Tagihan " . $np . " sudah *LUNAS*. " .
                        "
                ";
                    // dd($target, $pesan);
                    NotifWa::NotifWa($target, $pesan);
                    // return back();
                }
                $tarif = (int) preg_replace('/\D/', '', $request->tarif);
                $sisaTagihan = (int) preg_replace('/\D/', '', $request->sisaTagihan);
                $jumlahBayar = (int) preg_replace('/\D/', '', $request->jumlahBayar);

                $a = date('ymd');
                $b = TransaksiBebas::max('id') + 1;
                $huruf = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $c = substr(str_shuffle($huruf), 0, 3);
                $d = mt_rand(100, 999);;
                $kode = 'BPS' . $d . '-' . $a . '-' . $c . $b;
                // dd($kode);
                DB::table('transaksi_bebas')->insert([
                    'kode_transaksi' => $kode,
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
                $nm = $request->namaPembayaran;
                $pesan = "Pembayaran  $nm  Berhasil";
                session()->flash('key', $pesan);
                return redirect()->back();
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function bukti(Request $request)
    {
        // dd($request->tipe);
        if ($request->tipe == 'Bulanan') {
            $t_bulanan = TransaksiBulanan::with('Siswa')->where('id', $request->id)->get();
            // dd($t_bulanan);
            foreach ($t_bulanan as $transaksi) {
                $transaksi->jumlah_bayar_terbilang = $this->terbilang($transaksi->jumlah_bayar) . ' RUPIAH';
            }
            foreach ($t_bulanan as $transaksi) {
                $transaksi->tanggal_formatted = $this->formatTanggal($transaksi->created_at);
                // dd($transaksi);
            }
            // dd($transaksi);
            return view('admin.layout.bukti_pembayaran', compact('t_bulanan'));
        } elseif ($request->tipe == 'Bebas') {
            $t_bebas = TransaksiBebas::with('Siswa')->where('id', $request->id)->get();
            // dd($t_bebas);
            foreach ($t_bebas as $transaksi) {
                $transaksi->jumlah_bayar_terbilang = $this->terbilang($transaksi->jumlah_bayar) . ' RUPIAH';
            }
            foreach ($t_bebas as $transaksi) {
                $transaksi->tanggal_formatted = $this->formatTanggal($transaksi->created_at);
                // dd($transaksi);
            }
            return view('admin.layout.bukti_pembayaran', compact('t_bebas'));
        }
    }
    private function terbilang($angka)
    {
        $angka = abs($angka);
        $bilangan = array(
            '',
            'SATU',
            'DUA',
            'TIGA',
            'EMPAT',
            'LIMA',
            'ENAM',
            'TUJUH',
            'DELAPAN',
            'SEMBILAN',
            'SEPULUH',
            'SEBELAS'
        );
        $terbilang = '';
        if ($angka < 12) {
            $terbilang = ' ' . $bilangan[$angka];
        } elseif ($angka < 20) {
            $terbilang = $this->terbilang($angka - 10) . ' BELAS';
        } elseif ($angka < 100) {
            $terbilang = $this->terbilang($angka / 10) . ' PULUH' . $this->terbilang($angka % 10);
        } elseif ($angka < 200) {
            $terbilang = ' SERATUS' . $this->terbilang($angka - 100);
        } elseif ($angka < 1000) {
            $terbilang = $this->terbilang($angka / 100) . ' RATUS' . $this->terbilang($angka % 100);
        } elseif ($angka < 2000) {
            $terbilang = ' SERIBU' . $this->terbilang($angka - 1000);
        } elseif ($angka < 1000000) {
            $terbilang = $this->terbilang($angka / 1000) . ' RIBU' . $this->terbilang($angka % 1000);
        } elseif ($angka < 1000000000) {
            $terbilang = $this->terbilang($angka / 1000000) . ' JUTA' . $this->terbilang($angka % 1000000);
        }
        return $terbilang;
    }
    private function formatTanggal($tanggal)
    {
        // Memformat tanggal dari format standar ke format yang diinginkan
        return date('d F Y', strtotime($tanggal));
    }
    public function hapus_bukti(Request $request)
    {
        if ($request->tipe == 'Bulanan') {
            TransaksiBulanan::where('kode_transaksi', $request->kode_transaksi)->delete();
            return redirect()->back()->with('success1', 'Anda Berhasil Menghapus Data');
        } elseif ($request->tipe == 'Bebas') {
            TransaksiBebas::where('kode_transaksi', $request->kode_transaksi)->delete();
            return redirect()->back()->with('success2', 'Anda Berhasil Menghapus Data');
        }
    }

    public function tagihan(Request $request)
    {
        $siswas = Siswa::where('id', $request->id)->first();
        if (!$siswas) {
            return redirect()->back();
        }

        $a = TarifPembayaranBebas::where('siswa_id', $request->id)->get();
        $b = TarifPembayaranBulanan::where('siswa_id', $request->id)->get();
        $tagihan = $a->concat($b);
        // dd($tagihan);
        $siswa = Siswa::where('id', $request->id)->get();
        $totalKeseluruhan = $tagihan->pluck('sisa_tagihan')->sum();
        return view('admin.layout.tagihan', compact('tagihan', 'siswa', 'totalKeseluruhan'));
    }

    public function kirim_wa($tipe, $nama_pembayaran, $id)
    {

        if ($tipe === 'Bulanan') {
            // dd($nama_pembayaran);
            $id_siswa = TarifPembayaranBulanan::where('nama_pembayaran', $nama_pembayaran)->where('id', $id)->pluck('siswa_id');
            $nama = Siswa::where('id', $id_siswa)->pluck('nama_lengkap')->first();
            $id_kelas = Siswa::where('id', $id_siswa)->pluck('kelas_id');
            $kelas = Kelas::where('id', $id_kelas)->pluck('kelas')->first();
            $tagihan = TarifPembayaranBulanan::where('nama_pembayaran', $nama_pembayaran)->where('id', $id)->pluck('sisa_tagihan')->first();
            $ta = TarifPembayaranBulanan::where('nama_pembayaran', $nama_pembayaran)->where('id', $id)->pluck('tahun_ajaran')->first();
            // dd($ta);

            if ($tagihan > 0) {
                $pesan = '
*Pemberitahuan Pembayaran ' . $nama_pembayaran . '*
                
    Diberitahukan kepada orang tua/wali dari Ananda Siswa/Siswi dengan detail sebagai berikut : 
                
*Nama : ' . $nama . '*
*Kelas : ' . $kelas . '*
*Jumlah Tagihan : ' . 'Rp. ' . number_format($tagihan, 0, ',', '.') . '*
*Tagihan  : ' . $nama_pembayaran . '*
*Tahun Ajaran : ' . $ta . '*
                
    Diharapkan untuk segera melunasi Tagihan tersebut, dan segera datang ke bagian Administrasi untuk melakukan pembayaran dengan membawa kartu SPP atau kartu Bayaran
                
Demikian Terimakasih 
Salam,
Admin SPP
                
*_Abaikan jika sudah membayar_*';
                $target = Siswa::where('id', $id_siswa)->pluck('no_hp_ortu')->first();
                // dd($target, $pesan);
                NotifWa::NotifWa($target, $pesan);
                return redirect()->back()->with('bKirimWa', 'Pesan Tagihan Behasil Dikirim');
            } else {
                return redirect()->back()->with('gKirimWa', 'Tidak Ada Tagihan');
            }
        } elseif ($tipe === 'Bebas') {
            // dd($nama_pembayaran);
            $id_siswa = TarifPembayaranBebas::where('nama_pembayaran', $nama_pembayaran)->where('id', $id)->pluck('siswa_id');
            $nama = Siswa::where('id', $id_siswa)->pluck('nama_lengkap')->first();
            $id_kelas = Siswa::where('id', $id_siswa)->pluck('kelas_id');
            $kelas = Kelas::where('id', $id_kelas)->pluck('kelas')->first();
            $tagihan = TarifPembayaranBebas::where('nama_pembayaran', $nama_pembayaran)->where('id', $id)->pluck('sisa_tagihan')->first();
            $ta = TarifPembayaranBebas::where('nama_pembayaran', $nama_pembayaran)->where('id', $id)->pluck('tahun_ajaran')->first();
            // dd($tagihan);
            if ($tagihan > 0) {
                $pesan = '
*Pemberitahuan Pembayaran ' . $nama_pembayaran . '*

    Diberitahukan kepada orang tua/wali dari Ananda Siswa/Siswi dengan detail sebagai berikut : 

*Nama : ' . $nama . '*
*Kelas : ' . $kelas . '*
*Jumlah Tagihan : ' . 'Rp. ' . number_format($tagihan, 0, ',', '.') . '*
*Tagihan  : ' . $nama_pembayaran . '*
*Tahun Ajaran : ' . $ta . '*

    Diharapkan untuk segera melunasi Tagihan tersebut, dan segera datang ke bagian Administrasi untuk melakukan pembayaran dengan membawa kartu SPP atau kartu Bayaran

Demikian Terimakasih 
Salam,
Admin SPP
                
*_Abaikan jika sudah membayar_*';
                $target = Siswa::where('id', $id_siswa)->pluck('no_hp_ortu')->first();

                // dd($target, $pesan);
                NotifWa::NotifWa($target, $pesan);
                return redirect()->back()->with('bKirimWa', 'Pesan Tagihan Behasil Dikirim');
            } else {
                return redirect()->back()->with('gKirimWa', 'Tidak Ada Tagihan');
            }
        }
    }

    public function kirim_semua_wa($id)
    {
        $nama = Siswa::where('id', $id)->pluck('nama_lengkap')->first();
        $kelas_id = Siswa::where('id', $id)->pluck('kelas_id')->first();
        $kelas = Kelas::where('id', $kelas_id)->pluck('kelas')->first();
        $tagihanBulanan = TarifPembayaranBulanan::where('siswa_id', $id)->get();
        $tagihanBebas = TarifPembayaranBebas::where('siswa_id', $id)->get();
        $tagihan = $tagihanBulanan->concat($tagihanBebas);
        $sisaTagihan = $tagihan->sum('sisa_tagihan');
        $a = "";
        foreach ($tagihan as $t) {
            if ($t->sisa_tagihan > 0) {
                $a .= $t->nama_pembayaran . " - T.A " . $t->tahun_ajaran . "\n";
                $a .= "*Sebesar : " . 'Rp. ' . number_format($t->sisa_tagihan, 0, ',', '.') . ',' . 0 . "" . 0 . "*\n\n";
            }
        }
        // dd($a);
        $target = Siswa::where('id', $id)->pluck('no_hp_ortu')->first();
        $pesan = "
*Pemberitahuan Pembayaran*

    Diberitahukan kepada orang tua/wali dari Ananda Siswa/Siswi dengan detail sebagai berikut : 

*Nama : " . $nama . "*
*Kelas : " . $kelas . "*

*Tagihan  :* 

" . $a . "

*Jumlah Seluruh : " . 'Rp. ' . number_format($sisaTagihan, 0, ',', '.') . ',' . 0 . "" . 0 . "*

    Diharapkan untuk segera melunasi Tagihan tersebut, dan segera datang ke bagian Administrasi untuk melakukan pembayaran dengan membawa kartu SPP atau kartu Bayaran

Demikian Terimakasih 
Salam,
Admin SPP

*_Abaikan jika sudah membayar_*
        ";

        // dd($target, $pesan);
        NotifWa::NotifWa($target, $pesan);
        return back()->with('bKirimSemuaW', 'Tagihan Berhasil Dikirim Semua');
    }
}
