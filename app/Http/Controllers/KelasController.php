<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\User;


class KelasController extends Controller
{
    // Kelas
    public function kelas()
    {
        $admin = User::get();
        $kelas = Kelas::get();
        // dd($kelas);
        return view('admin.layout.master_data.kelas.kelas', ['admin' => $admin], ['kelas' => $kelas]);
    }

    public function tambah_kelas(Request $request)
    {
        // dd($request->all());
        $kelas = $request->kelas;
        // Validasi dilakukan di luar loop
        $this->validate($request, [
            'kelas.*' => 'required',
        ], [
            'kelas.*.required' => 'Kelas harus diisi lengkap.',
        ]);

        foreach ($kelas as $kelas_item) {
            $a = Kelas::where('kelas', $kelas_item)->exists();
            if (!$a) {
                $datasave = [
                    'kelas' => $kelas_item,
                    'created_at' => now(),
                ];
                Kelas::create($datasave);
            } else {
                return back()->with('gagalKelas', 'Data Kelas Sudah Ada');
            }
        }
        return redirect('/admin/kelas')->with('berhasilKelas', 'Data Berhasil Ditambahkan');
    }

    public function hapus_kelas($id)
    {
        // dd($id);
        Kelas::where('id', $id)->delete();
        return redirect('/admin/kelas')->with('berhasilHapusKelas', 'Data Berhasil Dihapus');
    }
    public function editKelas(Request $request)
    {
        $admin = User::get();
        $kelas = Kelas::where('id', $request->id)->get();
        return view('admin.layout.master_data.kelas.kelas', ['kelas' => $kelas], ['admin' => $admin]);
    }
    public function updateKelas(Request $request)
    {
        Kelas::where('id', $request->id)->update([
            'kelas' => $request->kelas,
            'updated_at' => now()
        ]);
        return redirect('/admin/kelas')->with('berhasilUpdateKelas', 'Data Kelas Berhasil Diperbaharui');
    }
    //
}
