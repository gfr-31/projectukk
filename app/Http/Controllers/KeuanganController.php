<?php

namespace App\Http\Controllers;

use App\Models\JenisPembayaran;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Pos;

class KeuanganController extends Controller
{
    public function PosKeuangan()
    {
        $admin = DB::table('users')->get();
        $pos = DB::table('pos')->get();
        return view('admin.layout.keuangan.pos_keuangan.pos_keuangan', compact('admin', 'pos'));
    }

    public function tambahposKeuangan(Request $request)
    {
        // dd($request->all());
        $pos = $request->pos;

        $this->validate($request, [
            'pos.*' => 'required|regex:/^[\pL\s]+$/u',
            'keterangan.*' => 'required|regex:/^[\pL\s]+$/u',
        ], [
            'pos.*.required' => 'POS harus diisi lengkap.',
            'keterangan.*.required' => 'Keterangan harus diisi lengkap.',
            'pos.*.regex' => 'POS harus diisi dengan Huruf.',
            'keterangan.*.regex' => 'Keterangan harus diisi dengan Huruf.',
        ]);

        foreach ($pos as $key => $p) {
            $a = Pos::where('pos', $p)->exists();
            if (!$a) {
                $datasave = [
                    'pos' => $p,
                    'keterangan' => $request->keterangan[$key],
                    'created_at' => now()
                ];
                Pos::create($datasave);
            } else {
                return back()->with('gagalPos', 'Data POS Sudah Ada');
            }
        }
        return redirect('/admin/pos-keuangan')->with('berhasilPos', 'Data Berhasil Ditambahkan');
    }
    public function updatePosKeuangan(Request $request)
    {
        // dd($request->all());
        Pos::where('id', $request->id)->update([
            'pos' => $request->pos,
            'keterangan' => $request->keterangan,
            'updated_at' => now()
        ]);
        return redirect('/admin/pos-keuangan')->with('berhasilUpdatePos', 'Data Pos Berhasil Diperbaharui');
    }

    public function hapusPosKeuangan($id)
    {
        // dd($id);
        Pos::where('id', $id)->delete();
        return redirect('/admin/pos-keuangan')->with('berhasilHapusPos', 'Data Berhasil Dihapus');
    }

    // Pos Pembayaran
    public function JenisPembayaran()
    {
        $admin = DB::table('users')->get();
        $jenis_pembayaran = JenisPembayaran::with('TahunAjaran')->orderBy('tahun_ajaran', 'desc')->get();
        // dd($jenis_pembayaran);
        return view('admin.layout.keuangan.jenis_pembayaran.jenis_pembayaran', compact('admin', 'jenis_pembayaran'));
    }
    public function tambahJenisPembayaran()
    {
        $pos = DB::table('pos')->get();
        $tahunAjaran = DB::table('tahun_ajaran')->where('keterangan', 'Aktif')->get();
        $admin = DB::table('users')->get();
        return view('admin.layout.keuangan.jenis_pembayaran.tambah_jenis_pembayaran', compact('admin', 'tahunAjaran', 'pos'));
    }
    public function insertJenisPembayaran(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'pos' => 'required',
            'tipe' => 'required',
            'tahun_ajaran' => 'required',
        ], [
            'pos.required' => 'POS Harus Diisi Terlebih Dahulu.',
            'tipe.required' => 'Tipe Harus Diisi Terlebih Dahulu.',
            'tahun_ajaran.required' => 'Tahun Ajaran Harus Diisi Terlebih Dahulu.',
        ]);
        $np = $request->pos . " - T.A " . $request->tahun_ajaran;
        $a = JenisPembayaran::where('nama_pembayaran', $np)->exists();
        // dd($np);
        if (!$a) {
            if ($request->Filled('tipe', 'tahun_ajaran', 'pos')) {
                DB::table('jenis_pembayaran')->insert([
                    'pos' => $request->pos,
                    'nama_pembayaran' => $request->pos . " - T.A " . $request->tahun_ajaran,
                    'tipe' => $request->tipe,
                    'tahun_ajaran' => $request->tahun_ajaran,
                    'created_at' => now(),
                ]);
                return redirect('/admin/jenis-pembayaran')->with('berhasilPosPembayaran', 'Data Berhasil ditambahkan');
            } else {
                return redirect()->back();
            }
        }
        return back()->with('gagalJenisPembayaran', 'Jenis Pembayaran Sudah Ada');
    }
    public function editJenisPembayaran($id)
    {
        // dd(123);
        $pos = DB::table('pos')->get();
        $tahunAjaran = DB::table('tahun_ajaran')->where('keterangan', 'Aktif')->get();
        $admin = DB::table('users')->get();
        $jenisPembayaran = JenisPembayaran::where('id', $id)->get();
        return view('admin.layout.keuangan.jenis_pembayaran.edit_jenis_pembayaran', compact('admin', 'tahunAjaran', 'pos', 'jenisPembayaran'));
    }
    public function updateJenisPembayaran(Request $request)
    {
        // dd($request->all());
        $jenisPembayaran = JenisPembayaran::where('id', $request->id)->get();
        $tipe = $jenisPembayaran->pluck('tipe')->first();
        $np = $jenisPembayaran->pluck('nama_pembayaran')->first();
        DB::table('tarif_pembayaran_' . $tipe)->where('nama_pembayaran', $np)->delete();
        $this->validate($request, [
            'pos' => 'required',
            'tipe' => 'required',
            'tahun_ajaran' => 'required',
        ], [
            'pos.required' => 'POS Harus Diisi Terlebih Dahulu.',
            'tipe.required' => 'Tipe Harus Diisi Terlebih Dahulu.',
            'tahun_ajaran.required' => 'Tahun Ajaran Harus Diisi Terlebih Dahulu.',
        ]);
        JenisPembayaran::where('id', $request->id)->update([
            'pos' => $request->pos,
            'nama_pembayaran' => $request->pos . " - T.A " . $request->tahun_ajaran,
            'tipe' => $request->tipe,
            'tahun_ajaran' => $request->tahun_ajaran,
            'updated_at' => now(),
        ]);
        return redirect('/admin/jenis-pembayaran')->with('berhasilUpdateJenisPembayaran', 'Data Berhsail Diperbaharui');
    }
    public function deleteJenisPembayaran($id)
    {
        // dd(123);
        DB::table('jenis_pembayaran')->where('id', $id)->delete();
        return redirect('/admin/jenis-pembayaran')->with('berhasilHapusPos', 'Data Berhasil Dihapus');
    }
}
