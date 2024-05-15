<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\TahunAjaran;

class TahunAjaranController extends Controller
{
    // Tahun Ajaran
    public function tahun_ajaran()
    {
        $admin = DB::table('users')->get();
        $tahun_ajaran = DB::table('tahun_ajaran')->orderBy('created_at', 'desc')->get();
        return view('admin.layout.master_data.tahun_ajaran.tahun_ajaran', ['admin' => $admin], ['tahun_ajaran' => $tahun_ajaran]);
    }
    public function tambah_tahun_ajaran()
    {
        $admin = DB::table('users')->get();
        return view('admin.layout.master_data.tahun_ajaran.tambah', ['admin' => $admin]);
    }
    public function insert_tahun_ajaran(Request $request)
    {
        // dd($request->customRadio);

        $this->validate($request, [
            'tj1' => 'required|integer',
            'tj2' => 'required|integer',
            'customRadio' => 'required',
        ], [
            'tj1.required' => 'Tahun ajaran harus diisi lengkap.',
            'tj1.integer' => 'Data harus berupa angka',
            'tj2.required' => 'Tahun ajaran harus diisi lengkap.',
            'tj2.integer' => 'Data harus berupa angka',
            'customRadio.required' => 'Pilih salah satu opsi pada keterangan.',
        ]);

        // Mulai transaksi database
        $a = $request->tj1 . '-' . $request->tj2;
        $b = (TahunAjaran::where('tahun_ajaran', $a)->pluck('tahun_ajaran')->first());

        if ($b == null) {
            DB::beginTransaction();
            try {
                // Nonaktifkan semua tahun ajaran yang lain
                DB::table('tahun_ajaran')->update(['keterangan' => 'Tidak Aktif']);

                // Insert tahun ajaran baru
                DB::table('tahun_ajaran')->insert([
                    'tahun_ajaran' => $request->tj1 . "-" . $request->tj2,
                    'keterangan' => $request->customRadio,
                    'created_at' => now()
                ]);
                // Commit transaksi
                DB::commit();
            } catch (\Exception $e) {
                // Rollback transaksi jika terjadi kesalahan
                DB::rollBack();
            }
            return redirect('/admin/tahun-ajaran')->with('berhasil', 'Data Berhasil Disimpan');
        } else {
            return back()->with('tjsama', 'Tahun Ajaran Sudah Ada');
        }
    }
    public function editTh(Request $request)
    {
        $admin = DB::table('users')->get();
        $tahun_ajaran = DB::table('tahun_ajaran')->where('id', $request->id)->get();
        return view('admin.layout.master_data.tahun_ajaran.edit_th', ['tahun_ajaran' => $tahun_ajaran], ['admin' => $admin]);
    }
    public function updateTh(Request $request)
    {
        $this->validate($request, [
            'tj1' => 'required',
            'customRadio' => 'required',
        ], [
            'tj1.required' => 'Tahun ajaran harus diisi lengkap.',
            'customRadio.required' => 'Pilih salah satu opsi pada keterangan.',
        ]);
        DB::beginTransaction();
        try {
            DB::table('tahun_ajaran')->update(['keterangan' => 'Tidak Aktif']);
            DB::table('tahun_ajaran')->where('id', $request->id)->update([
                'tahun_ajaran' => $request->tj1,
                'keterangan' => $request->customRadio,
                'updated_at' => now()
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }
        // dd($request->all());

        return redirect('/admin/tahun-ajaran')->with('berhasilUpdateTh', 'Data Berhasil Diperbaharui');
    }
    public function hapus_tahun_ajaran($id)
    {
        // dd($id);
        DB::table('tahun_ajaran')->where('id', $id)->delete();
        return redirect('/admin/tahun-ajaran')->with('berhasilHapus', 'Data Berhasil Dihapus');
    }
}
