<?php

namespace App\Http\Controllers;

use App\Models\JenisPembayaran;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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
        $keterangan = $request->keterangan;

        for ($i = 0; $i < count($pos); $i++) {
            $this->validate($request, [
                'pos[$i]' => 'required',
                'keterangan[$i]' => 'required',
            ], [
                'pos[$i].required' => 'POS harus diisi lengkap.',
                'keterangan[$i].required' => 'Keterangan harus diisi lengkap.',
            ]);
            $datasave = [
                'pos' => $pos[$i],
                'keterangan' => $keterangan[$i],
                'created_at' => now()
            ];
            DB::table('pos')->insert($datasave);
        }
        return redirect('/admin/pos-keuangan')->with('berhasilPos', 'Data Berhasil Ditambahkan');
    }
    public function updatePosKeuangan(Request $request)
    {
        // dd($request->all());
        DB::table('pos')->where('id', $request->id)->update([
            'pos' => $request->pos,
            'keterangan' => $request->keterangan,
            'tipe' => $request->tipe,
            'updated_at' => now()
        ]);
        return redirect('/admin/pos-keuangan')->with('berhasilUpdatePos', 'Data Pos Berhasil Diperbaharui');
    }

    public function hapusPosKeuangan($id)
    {
        DB::table('pos')->where('id', $id)->delete();
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
        // dd($request->tahun_ajaran);
        $this->validate($request, [
            'pos' => 'required',
            'tipe' => 'required',
            'tahun_ajaran' => 'required',
        ],[
            'pos.required' => 'POS harus diisi lengkap.',
            'tipe.required' => 'Tipe harus diisi lengkap.',
            'tahun_ajaran.required' => 'Tahun Ajaran harus diisi lengkap.',
        ]);
        if ($request->Filled('tipe', 'tahun_ajaran', 'pos')) {
            DB::table('jenis_pembayaran')->insert([
                'pos' => $request->pos,
                'nama_pembayaran' => $request->pos . " - T.A " . $request->tahun_ajaran,
                'tipe' => $request->tipe,
                'tahun_ajaran' => $request->tahun_ajaran
            ]);

            return redirect('/admin/jenis-pembayaran')->with('berhasilPosPembayaran', 'Data Berhasil ditambahkan');
        } else {
            return redirect()->back();
        }
    }
    public function deleteJenisPembayaran($id)
    {
        DB::table('jenis_pembayaran')->where('id', $id)->delete();
        return redirect('/admin/jenis-pembayaran')->with('berhasilHapusPos', 'Data Berhasil Dihapus');
    }
}