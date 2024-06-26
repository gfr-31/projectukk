<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\TarifPembayaranBulanan;
use App\Models\TarifPembayaranBebas;
use Illuminate\Support\Facades\Validator;

use App\Models\JenisPembayaran;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Kelas;

class TarifPembayaranController extends Controller
{
    //Tarif Pembayaran 
    public function tarifPembayaran(Request $request)
    {
        try {
            $admin = User::get();
            $kelas = Kelas::get();
            // dd($request->all());
            if ($request->tipe == 'Bulanan') {
                $jp = JenisPembayaran::with('TahunAjaran')->where([['tipe', $request->tipe], ['tahun_ajaran', $request->tahun_ajaran], ['id', $request->id]])->get();
                // Tarif Pembyaran Bulanan
                $tpb = TarifPembayaranBulanan::with('siswa')->where([['tahun_ajaran', $request->tahun_ajaran], ['nama_pembayaran', $request->nama_pembayaran]])->orderBy('kelas_id', 'asc')->get();
                // dd($tpb);
                return view('admin.layout.keuangan.tarif_pembayaran.tarif_pembayaran_bulanan', compact('admin', 'jp', 'kelas', 'tpb'));
            } elseif ($request->tipe == 'Bebas') {
                // dd($request->tahun_ajaran);
                $jp = JenisPembayaran::with('TahunAjaran')->where([['tipe', $request->tipe], ['tahun_ajaran', $request->tahun_ajaran], ['id', $request->id]])->get();
                // Tarif Pembyaran Bebas
                // dd($jp);
                $tpb = TarifPembayaranBebas::with('siswa')->where([['tahun_ajaran', $request->tahun_ajaran], ['nama_pembayaran', $request->nama_pembayaran]])->orderBy('kelas_id', 'asc')->get();
                // dd($tpb);
                return view('admin.layout.keuangan.tarif_pembayaran.tarif_pembayaran_bebas', compact('admin', 'jp', 'kelas', 'tpb'));
            }
        } catch (\Exception $e) {
        }
    }

    //Tambah Tarif Pembayaran
    public function ttp(Request $request)
    {
        try {
            if ($request->tipe == 'Bulanan') {
                $admin = User::get();
                $jp = JenisPembayaran::with('TahunAjaran')->where([['tipe', $request->tipe], ['tahun_ajaran', $request->tahun_ajaran]])->get();
                $kelas = Kelas::get();
                // dd(123);
                return view('admin.layout.keuangan.tarif_pembayaran.tambah_tarif_pembayaran_bulanan', compact('admin', 'jp', 'kelas'));
            } elseif ($request->tipe == 'Bebas') {
                $admin = User::get();
                $jp = JenisPembayaran::with('TahunAjaran')->where([['tipe', $request->tipe], ['tahun_ajaran', $request->tahun_ajaran], ['id', $request->id]])->get();
                $kelas = Kelas::get();
                // dd($jp);
                return view('admin.layout.keuangan.tarif_pembayaran.tambah_tarif_pembayaran_bebas', compact('admin', 'jp', 'kelas'));
            }
        } catch (\Exception $e) {
        }
    }
    public function ttp_siswa(Request $request)
    {
        $admin = User::get();
        if ($request->tipe == "Bulanan") {
            $kelasId = $request->input('kelas_id');
            // dd($request->kelas_id);
            $jp = JenisPembayaran::with('TahunAjaran')->where([['tipe', $request->tipe], ['tahun_ajaran', $request->tahun_ajaran]])->get();
            $kelas_id = $request->input();
            $kelas = Kelas::where('id', $kelas_id)->get();
            $siswa = Siswa::with('kelas')->where('kelas_id', $kelas_id)->get();
            // dd(123);
            return view('admin.layout.keuangan.tarif_pembayaran.tambah_tarif_pembayaran_bulanan_siswa', compact('admin', 'jp', 'siswa', 'kelas'));
        } elseif ($request->tipe == "Bebas") {
            $jp = JenisPembayaran::with('TahunAjaran')->where([['tipe', $request->tipe], ['tahun_ajaran', $request->tahun_ajaran], ['nama_pembayaran', $request->nama_pembayaran]])->get();
            // dd($jp);
            $kelas_id = $request->input();
            $kelas = Kelas::where('id', $kelas_id)->get();
            $siswa = Siswa::with('kelas')->where('kelas_id', $kelas_id)->get();
            return view('admin.layout.keuangan.tarif_pembayaran.tambah_tarif_pembayaran_bebas_siswa', compact('admin', 'jp', 'kelas', 'siswa'));
        }
    }

    public function insert_ttp_bulanan(Request $request)
    {
        // dd($request->all()); 
        $this->validate($request, [
            // 'pos' => 'required',
            // 'namaPembayaran' => 'required',
            // 'tj' => 'required',
            // 'tipe' => 'required',
            'kelas' => 'required',
            'totalTagihan' => 'required',
            'juli' => 'required',
            'agustus' => 'required',
            'september' => 'required',
            'oktober' => 'required',
            'november' => 'required',
            'desember' => 'required',
            'january' => 'required',
            'februari' => 'required',
            'maret' => 'required',
            'april' => 'required',
            'mei' => 'required',
            'juni' => 'required',
        ], [
            // 'pos.required' => 'POS Harus Diisi.',
            // 'namaPembayaran.required' => 'Nama Pembayaran harus diisi lengkap.',
            // 'tj.required' => 'Tahun Ajaran harus diisi lengkap.',
            // 'tipe.required' => 'Tipe harus diisi lengkap.',
            'kelas.required' => 'Kelas Harus Diisi.',
            'totalTagihan.required' => 'Total Tagihan Hurus Diisi.',
            'juli.required' => 'Bulan Juli Harus Diisi.',
            'agustus.required' => 'Bulan Agustus Harus Diisi.',
            'september.required' => 'Bulan September Harus Diisi.',
            'oktober.required' => 'Bulan Oktober Harus Diisi.',
            'november.required' => 'Bulan November Harus Diisi.',
            'desember.required' => 'Bulan Desember Harus Diisi.',
            'january.required' => 'Bulan Januari Harus Diisi.',
            'februari.required' => 'Bulan Februari Harus Diisi.',
            'maret.required' => 'Bulan Maret Harus Diisi.',
            'april.required' => 'Bulan April Harus Diisi.',
            'mei.required' => 'Bulan Mei Harus Diisi.',
            'juni.required' => 'Bulan Juni Harus Diisi.',
        ]);
        // return back();   

        $validasi = TarifPembayaranBulanan::where('kelas_id', $request->kelas)->where('tahun_ajaran', $request->tj)->where('nama_pembayaran', $request->namaPembayaran)->first();
        // dd($validasi);
        if ($validasi) {
            $kelas = Kelas::where('id', $request->kelas)->value('kelas');
            return redirect()->back()->with('dataSama', 'Maaf Pembayaran Bulanan Untuk Kelas ' . $kelas . ' Sudah Ada.');
        }
        // Validasi request jika diperlukan
        $kelasId = $request->kelas;
        // Ambil semua siswa yang terkait dengan kelas tersebut
        $siswas = Siswa::where('kelas_id', $kelasId)->get();
        // Iterasi semua siswa dan masukkan tarif pembayaran untuk masing-masing siswa
        foreach ($siswas as $siswa) {
            // Supaya Meghapus Data yang ada Rp.
            $juli = (int) preg_replace('/\D/', '', $request->juli);
            $agustus = (int) preg_replace('/\D/', '', $request->agustus);
            $september = (int) preg_replace('/\D/', '', $request->september);
            $oktober = (int) preg_replace('/\D/', '', $request->oktober);
            $november = (int) preg_replace('/\D/', '', $request->november);
            $desember = (int) preg_replace('/\D/', '', $request->desember);
            $januari = (int) preg_replace('/\D/', '', $request->january);
            $februari = (int) preg_replace('/\D/', '', $request->februari);
            $maret = (int) preg_replace('/\D/', '', $request->maret);
            $april = (int) preg_replace('/\D/', '', $request->april);
            $mei = (int) preg_replace('/\D/', '', $request->mei);
            $juni = (int) preg_replace('/\D/', '', $request->juni);
            $tagihan = (int) preg_replace('/\D/', '', $request->totalTagihan);
            // dd($julib);
            //masukan data
            TarifPembayaranBulanan::insert([
                'siswa_id' => $siswa->id,
                'nama_pembayaran' => $request->namaPembayaran,
                'tahun_ajaran' => $request->tj,
                'tipe' => $request->tipe,
                'kelas_id' => $request->kelas,
                'juli' => $juli,
                'agustus' => $agustus,
                'september' => $september,
                'oktober' => $oktober,
                'november' => $november,
                'desember' => $desember,
                'january' => $januari,
                'february' => $februari,
                'maret' => $maret,
                'april' => $april,
                'mei' => $mei,
                'juni' => $juni,
                'tagihan' => $tagihan,
                'sisa_tagihan' => $tagihan,
                'created_at' => now()
            ]);
        }
        $tipe = $request->tipe;
        $tj = $request->tj;
        $id = $request->id;
        $nm = $request->namaPembayaran;
        return redirect('/admin/tarif-pembayaran/' . $tj . '/' . $tipe . '/id=' . $id . "/" . $nm)->with('berhasilTTPBulanan', 'Berhasil Tambah Tarif Pembayaran ' . $nm);
    }
    public function insert_ttp_bulanan_siswa(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            // 'pos' => 'required',
            // 'namaPembayaran' => 'required',
            // 'tj' => 'required',
            // 'tipe' => 'required',
            'siswa' => 'required',
            'totalTagihan' => 'required',
            'juli' => 'required',
            'agustus' => 'required',
            'september' => 'required',
            'oktober' => 'required',
            'november' => 'required',
            'desember' => 'required',
            'january' => 'required',
            'februari' => 'required',
            'maret' => 'required',
            'april' => 'required',
            'mei' => 'required',
            'juni' => 'required',
        ], [
            // 'pos.required' => 'POS Harus Diisi.',
            // 'namaPembayaran.required' => 'Nama Pembayaran harus diisi lengkap.',
            // 'tj.required' => 'Tahun Ajaran harus diisi lengkap.',
            // 'tipe.required' => 'Tipe harus diisi lengkap.',
            'siswa.required' => 'Siswa Harus Diisi.',
            'totalTagihan.required' => 'Total Tagihan Hurus Diisi.',
            'juli.required' => 'Bulan Juli Harus Diisi.',
            'agustus.required' => 'Bulan Agustus Harus Diisi.',
            'september.required' => 'Bulan September Harus Diisi.',
            'oktober.required' => 'Bulan Oktober Harus Diisi.',
            'november.required' => 'Bulan November Harus Diisi.',
            'desember.required' => 'Bulan Desember Harus Diisi.',
            'january.required' => 'Bulan Januari Harus Diisi.',
            'februari.required' => 'Bulan Februari Harus Diisi.',
            'maret.required' => 'Bulan Maret Harus Diisi.',
            'april.required' => 'Bulan April Harus Diisi.',
            'mei.required' => 'Bulan Mei Harus Diisi.',
            'juni.required' => 'Bulan Juni Harus Diisi.',
        ]);

        $validasi = TarifPembayaranBulanan::where('siswa_id', $request->siswa)->where('tahun_ajaran', $request->tj)->where('nama_pembayaran', $request->namaPembayaran)->first();
        // dd($validasi);
        if ($validasi) {
            $siswa = DB::table('siswas')->where('id', $request->siswa)->value('nama_lengkap');
            return redirect()->back()->with('dataSama', 'Maaf Pembayaran Bulanan Atas Nama ' . $siswa . ' Sudah Ada.');
        }
        // Supaya Meghapus Data yang ada Rp.
        $juli = (int) preg_replace('/\D/', '', $request->juli);
        $agustus = (int) preg_replace('/\D/', '', $request->agustus);
        $september = (int) preg_replace('/\D/', '', $request->september);
        $oktober = (int) preg_replace('/\D/', '', $request->oktober);
        $november = (int) preg_replace('/\D/', '', $request->november);
        $desember = (int) preg_replace('/\D/', '', $request->desember);
        $januari = (int) preg_replace('/\D/', '', $request->january);
        $februari = (int) preg_replace('/\D/', '', $request->februari);
        $maret = (int) preg_replace('/\D/', '', $request->maret);
        $april = (int) preg_replace('/\D/', '', $request->april);
        $mei = (int) preg_replace('/\D/', '', $request->mei);
        $juni = (int) preg_replace('/\D/', '', $request->juni);
        $tagihan = (int) preg_replace('/\D/', '', $request->totalTagihan);
        // dd($julib);
        //masukan data
        TarifPembayaranBulanan::insert([
            'siswa_id' => $request->siswa,
            'nama_pembayaran' => $request->namaPembayaran,
            'tahun_ajaran' => $request->tj,
            'tipe' => $request->tipe,
            'kelas_id' => $request->kelas,
            'juli' => $juli,
            'agustus' => $agustus,
            'september' => $september,
            'oktober' => $oktober,
            'november' => $november,
            'desember' => $desember,
            'january' => $januari,
            'february' => $februari,
            'maret' => $maret,
            'april' => $april,
            'mei' => $mei,
            'juni' => $juni,
            'tagihan' => $tagihan,
            'sisa_tagihan' => $tagihan,
            'created_at' => now()
        ]);
        $tipe = $request->tipe;
        $tj = $request->tj;
        $id = $request->id;
        $nm = $request->namaPembayaran;
        return redirect('/admin/tarif-pembayaran/' . $tj . '/' . $tipe . '/id=' . $id . '/' . $nm)->with('berhasilTTPBulanan', 'Berhasil Tambah Tarif Pembayaran ' . $nm);
    }

    public function edit_tpb(Request $request)
    {
        try {
            if ($request->tipe == "Bulanan") {
                $admin = User::get();
                $tfb = TarifPembayaranBulanan::with('siswa', 'TahunAjaran')->where('id', $request->id)->get();
                // dd($tfb);
                $kelas = TarifPembayaranBulanan::with('kelas')->get();
                $kelas1 = Kelas::get();
                return view('admin.layout.keuangan.tarif_pembayaran.edit_tarif_pembayaran_bulanan', compact('admin', 'kelas', 'kelas1', 'tfb'));
            } elseif ($request->tipe == "Bebas") {
                $admin = User::get();
                $tfb = TarifPembayaranBebas::with('siswa', 'TahunAjaran')->where('id', $request->id)->get();
                $kelas = TarifPembayaranBebas::with('kelas')->get();
                $kelas1 = Kelas::get();
                return view('admin.layout.keuangan.tarif_pembayaran.edit_tarif_pembayaran_bebas', compact('admin', 'kelas', 'kelas1', 'tfb'));
            }
        } catch (\Exception $e) {
        }
    }
    public function edit_tpb_kelas(Request $request)
    {
        $admin = User::get();
        try {
            if ($request->tipe == "Bulanan") {
                $tfb = TarifPembayaranBulanan::where('kelas_id', $request->kelas)->take(1)->get();
                // dd($tfb->isNotEmpty());
                if ($tfb->isNotEmpty()) {
                    return view('admin.layout.keuangan.tarif_pembayaran.edit_tarif_pembayaran_bulanan_kelas', compact('admin', 'tfb'));
                } else {
                    return redirect()->back()->with('tidakAda', 'Data Kelas Tidak Ditemukan');
                }
            } elseif ($request->tipe == "Bebas") {
                // dd($request->all());
                $tfb = TarifPembayaranBebas::where([['kelas_id', $request->kelas], ['nama_pembayaran', $request->nama_pembayaran]])->take(1)->get();
                // dd($tfb);
                // dd($tfb->isNotEmpty());
                if ($tfb->isNotEmpty()) {
                    return view('admin.layout.keuangan.tarif_pembayaran.edit_tarif_pembayaran_bebas_kelas', compact('admin', 'tfb'));
                } else {
                    return redirect()->back()->with('tidakAda', 'Data Kelas Tidak Ditemukan');
                }
            }
        } catch (\Exception $e) {
        }
    }
    public function update_tpb(Request $request)
    {
        // dd($request->all());
        try {
            if ($request->tipe == "Bulanan") {
                $juli = (int) preg_replace('/\D/', '', $request->juli);
                $agustus = (int) preg_replace('/\D/', '', $request->agustus);
                $september = (int) preg_replace('/\D/', '', $request->september);
                $oktober = (int) preg_replace('/\D/', '', $request->oktober);
                $november = (int) preg_replace('/\D/', '', $request->november);
                $desember = (int) preg_replace('/\D/', '', $request->desember);
                $januari = (int) preg_replace('/\D/', '', $request->january);
                $februari = (int) preg_replace('/\D/', '', $request->februari);
                $maret = (int) preg_replace('/\D/', '', $request->maret);
                $april = (int) preg_replace('/\D/', '', $request->april);
                $mei = (int) preg_replace('/\D/', '', $request->mei);
                $juni = (int) preg_replace('/\D/', '', $request->juni);
                $tagihan = (int) preg_replace('/\D/', '', $request->totalTagihan);
                // dd($request->all());
                TarifPembayaranBulanan::where('id', $request->id)->update([
                    'nama_pembayaran' => $request->namaPembayaran,
                    'tahun_ajaran' => $request->tj,
                    'tipe' => $request->tipe,
                    'kelas_id' => $request->kelas,
                    'juli' => $juli,
                    'agustus' => $agustus,
                    'september' => $september,
                    'oktober' => $oktober,
                    'november' => $november,
                    'desember' => $desember,
                    'january' => $januari,
                    'february' => $februari,
                    'maret' => $maret,
                    'april' => $april,
                    'mei' => $mei,
                    'juni' => $juni,
                    'tagihan' => $tagihan,
                    'sisa_tagihan' => $tagihan,
                    'updated_at' => now()
                ]);
                $tipe = $request->tipe;
                $tj = $request->tj;
                $nama_pembayaran = $request->namaPembayaran;
                $idj = DB::table('jenis_pembayaran')->where('nama_pembayaran', $request->namaPembayaran)->pluck('id')->first();
                // dd($idj);
                return redirect('/admin/tarif-pembayaran/' . $tj . '/' . $tipe . '/id=' . $idj . '/' . $nama_pembayaran)->with('berhasilUpdatePos', 'Data Pos Berhasil Diperbaharui');
            } elseif ($request->tipe == "Bebas") {
                // dd($request->all());
                $tarif = (int) preg_replace('/\D/', '', $request->tarif);
                TarifPembayaranBebas::where("id", $request->id)->update([
                    'nama_pembayaran' => $request->namaPembayaran,
                    'tahun_ajaran' => $request->tj,
                    'tipe' => $request->tipe,
                    'tarif' => $tarif,
                    'sisa_tagihan' => $tarif,
                    'updated_at' => now()
                ]);
                $tipe = $request->tipe;
                $tj = $request->tj;
                $nama_pembayaran = $request->namaPembayaran;
                $idj = JenisPembayaran::where('nama_pembayaran', $request->namaPembayaran)->pluck('id')->first();
                // dd($idj);
                return redirect('/admin/tarif-pembayaran/' . $tj . '/' . $tipe . '/id=' . $idj . '/' . $nama_pembayaran)->with('berhasilUpdatePos', 'Data Pos Berhasil Diperbaharui');
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
    public function update_tpb_kelas(Request $request)
    {
        // dd($request->all());
        try {
            if ($request->tipe == "Bulanan") {
                // dd($request->all());
                $kelasId = $request->kelas;
                // Ambil semua siswa yang terkait dengan kelas tersebut
                $siswas = TarifPembayaranBulanan::where('kelas_id', $kelasId)->get();
                // dd($siswas);
                // Iterasi semua siswa dan masukkan tarif pembayaran untuk masing-masing siswa
                try {
                    foreach ($siswas as $siswa) {
                        $juli = (int) preg_replace('/\D/', '', $request->juli);
                        $agustus = (int) preg_replace('/\D/', '', $request->agustus);
                        $september = (int) preg_replace('/\D/', '', $request->september);
                        $oktober = (int) preg_replace('/\D/', '', $request->oktober);
                        $november = (int) preg_replace('/\D/', '', $request->november);
                        $desember = (int) preg_replace('/\D/', '', $request->desember);
                        $januari = (int) preg_replace('/\D/', '', $request->january);
                        $februari = (int) preg_replace('/\D/', '', $request->februari);
                        $maret = (int) preg_replace('/\D/', '', $request->maret);
                        $april = (int) preg_replace('/\D/', '', $request->april);
                        $mei = (int) preg_replace('/\D/', '', $request->mei);
                        $juni = (int) preg_replace('/\D/', '', $request->juni);
                        $tagihan = (int) preg_replace('/\D/', '', $request->totalTagihan);
                        // dd($siswa->siswa_id);
                        TarifPembayaranBulanan::where('siswa_id', $siswa->siswa_id)->update([
                            // 'siswa_id' => $siswa->id,
                            'nama_pembayaran' => $request->namaPembayaran,
                            'tahun_ajaran' => $request->tj,
                            'tipe' => $request->tipe,
                            'kelas_id' => $request->kelas,
                            'juli' => $juli,
                            'agustus' => $agustus,
                            'september' => $september,
                            'oktober' => $oktober,
                            'november' => $november,
                            'desember' => $desember,
                            'january' => $januari,
                            'february' => $februari,
                            'maret' => $maret,
                            'april' => $april,
                            'mei' => $mei,
                            'juni' => $juni,
                            'tagihan' => $tagihan,
                            'sisa_tagihan' => $tagihan,
                            'updated_at' => now()
                        ]);
                    }
                } catch (\Exception $e) {
                    dd($e->getMessage());
                }
                $tj = $request->tj;
                // dd($tj);
                $tipe = $request->tipe;
                $nama_pembayaran = $request->namaPembayaran;
                $idj = JenisPembayaran::where('nama_pembayaran', $request->namaPembayaran)->pluck('id')->first();
                return redirect('/admin/tarif-pembayaran/' . $tj . '/' . $tipe . '/id=' . $idj . '/' . $nama_pembayaran)->with('berhasilUpdatePos', 'Data Pos Berhasil Diperbaharui');
                // dd("Bulanan");

            } elseif ($request->tipe == "Bebas") {
                // dd($request->all());
                $kelasId = $request->kelas;
                // Ambil semua siswa yang terkait dengan kelas tersebut
                $siswas = TarifPembayaranBebas::where('kelas_id', $kelasId)->get();
                // dd($siswas);

                try {
                    $tarif = (int) preg_replace('/\D/', '', $request->tarif);
                    // dd($request->namaPembayaran);
                    $i = TarifPembayaranBebas::where([["nama_pembayaran", $request->namaPembayaran], ["kelas_id", $request->kelas]])->update([
                        'nama_pembayaran' => $request->namaPembayaran,
                        'tahun_ajaran' => $request->tj,
                        'tipe' => $request->tipe,
                        'tarif' => $tarif,
                        'sisa_tagihan' => $tarif,
                        'updated_at' => now()
                    ]);

                    // dd($i->toSql());
                } catch (\Exception $e) {
                    dd($e->getMessage());
                }

                $tj = $request->tj;
                $tipe = $request->tipe;
                $nama_pembayaran = $request->namaPembayaran;
                $idj = JenisPembayaran::where('nama_pembayaran', $request->namaPembayaran)->pluck('id')->first();
                return redirect('/admin/tarif-pembayaran/' . $tj . '/' . $tipe . '/id=' . $idj . '/' . $nama_pembayaran)->with('berhasilUpdatePos', 'Data Pos Berhasil Diperbaharui');
                // dd("Bebas");
            }
        } catch (\Exception $e) {
        }
    }
    public function hapus_tpBulanan(Request $request)
    {
        // dd($request->id);
        $id = $request->id;
        try {
            TarifPembayaranBulanan::where('id', $id)->delete();
            // dd($coba);
            return redirect()->back()->with('berhasilUpdatePos', 'Data Pos Berhasil Diperbaharui');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
    public function hapus_tpBebas(Request $request)
    {
        // dd($request->id);
        $id = $request->id;
        try {
            TarifPembayaranBebas::where('id', $id)->delete();
            return redirect()->back()->with('berhasilUpdatePos', 'Data Pos Berhasil Diperbaharui');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function insert_ttp_bebas(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'kelas' => 'required',
            'tarif' => 'required',
        ], [
            'kelas.required' => 'Kelas Harus DIisi',
            'tarif.required' => 'Tarif Harus DIisi',
        ]);
        $validasi = TarifPembayaranBebas::where('kelas_id', $request->kelas)->where('tahun_ajaran', $request->tj)->where('nama_pembayaran', $request->namaPembayaran)->first();
        // dd($validasi);
        if ($validasi) {
            $kelas = Kelas::where('id', $request->kelas)->value('kelas');
            $np = $request->namaPembayaran;
            // dd($kelas);
            return redirect()->back()->with('dataSama', 'Maaf Pembayaran ' . $np . '  Untuk Kelas ' . $kelas . ' Sudah Ada.');
        }
        // Validasi request jika diperlukan
        $kelasId = $request->kelas;
        // Ambil semua siswa yang terkait dengan kelas tersebut
        $siswas = Siswa::where('kelas_id', $kelasId)->get();
        // Iterasi semua siswa dan masukkan tarif pembayaran untuk masing-masing siswa
        foreach ($siswas as $siswa) {
            $tarif = (int) preg_replace('/\D/', '', $request->tarif);

            TarifPembayaranBebas::insert([
                'siswa_id' => $siswa->id,
                'nama_pembayaran' => $request->namaPembayaran,
                'tahun_ajaran' => $request->tj,
                'tipe' => $request->tipe,
                'kelas_id' => $request->kelas,
                'tarif' => $tarif,
                'sisa_tagihan' => $tarif,
                'created_at' => now()
            ]);
        }
        $tipe = $request->tipe;
        $tj = $request->tj;
        $id = $request->id;
        $nm = $request->namaPembayaran;
        // dd($nm);    
        return redirect('/admin/tarif-pembayaran/' . $tj . '/' . $tipe . '/id=' . $id . '/' . $nm);
    }
    public function insert_ttp_bebas_siswa(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'siswa' => 'required',
            'tarif' => 'required',
        ], [
            'siswa.required' => 'Siswa Harus Diisi.',
            'tarif.required' => 'Tarif Hurus Diisi.',
        ]);
        $validasi = TarifPembayaranBebas::where('siswa_id', $request->siswa)->where('tahun_ajaran', $request->tj)->where('nama_pembayaran', $request->namaPembayaran)->first();
        // dd($validasi);
        if ($validasi) {
            $siswa = Siswa::where('id', $request->siswa)->value('nama_lengkap');
            $nm = $request->namaPembayaran;
            return redirect()->back()->with('dataSama', 'Maaf Pembayaran ' . $nm . ' Atas Nama ' . $siswa . ' Sudah Ada.');
        }
        $tarif = (int) preg_replace('/\D/', '', $request->tarif);
        TarifPembayaranBebas::insert([
            'kelas_id' => $request->kelas,
            'siswa_id' => $request->siswa,
            'nama_pembayaran' => $request->namaPembayaran,
            'tahun_ajaran' => $request->tj,
            'tipe' => $request->tipe,
            'tarif' => $tarif,
            'sisa_tagihan' => $tarif,
            'created_at' => now()
        ]);

        $tipe = $request->tipe;
        $tj = $request->tj;
        $id = $request->id;
        $nm = $request->namaPembayaran;
        // dd($nm);    
        return redirect('/admin/tarif-pembayaran/' . $tj . '/' . $tipe . '/id=' . $id . '/' . $nm);
    }
}
