<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class KelasController extends Controller
{
    // Kelas
    public function kelas()
    {
        $admin = DB::table('users')->get();
        $kelas = DB::table('kelas')->get();
        return view('admin.layout.master_data.kelas.kelas', ['admin' => $admin], ['kelas' => $kelas]);
    }
    public function tambah_kelas(Request $request)
    {
        // dd($request->all());
        $kelas = $request->kelas;

        for ($i = 0; $i < count($kelas); $i++) {
            $datasave = [
                'kelas' => $kelas[$i],
                'created_at'=> now(),
            ];
            // dd($datasave);
            DB::table('kelas')->insert($datasave);
        }

        return redirect('/admin/kelas')->with('berhasilKelas', 'Data Berhasil Ditambahkan');
    }
    public function hapus_kelas($id)
    {
        DB::table('kelas')->where('id', $id)->delete();
        return redirect('/admin/kelas')->with('berhasilHapusKelas', 'Data Berhasil Dihapus');
    }
    public function editKelas(Request $request)
    {
        $admin = DB::table('users')->get();
        $kelas = DB::table('kelas')->where('id', $request->id)->get();
        return view('admin.layout.master_data.kelas.kelas', ['kelas' => $kelas], ['admin' => $admin]);
    }
    public function updateKelas(Request $request)
    {
        DB::table('kelas')->where('id', $request->id)->update([
            'kelas' => $request->kelas,
            'updated_at' => now()
        ]);
        return redirect('/admin/kelas')->with('berhasilUpdateKelas', 'Data Kelas Berhasil Diperbaharui');
    }
    //
}
