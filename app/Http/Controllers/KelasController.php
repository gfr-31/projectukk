<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\User;
use App\Models\Siswa;


class KelasController extends Controller
{
    // Kelas
    public function kelas()
    {
        $admin = User::get();
        $kelas = Kelas::where('kelas', '!=', 'Lulus')->orderBy('created_at', 'desc')->get();
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
    public function up($id)
    {
        $data = Kelas::where('id', $id)->pluck('kelas')->first();
        $int = preg_replace('/\D+/', '', $data);
        $string = preg_replace('/[^a-zA-Z]+/', '', $data);
        // dd($int);
        if ($int == 9) {
            $a = Siswa::where('kelas_id', $id)->get();
            if ($a !== null && $a->isEmpty()) {
                Kelas::where('id', $id)->delete();
                return back();
            } else {
                // dd($id);
                Siswa::where('kelas_id', $id)->update(['kelas_id'=>1]);
                Kelas::where('id', $id)->delete();
            }
        } else {
            Kelas::where('id', $id)->update([
                'kelas' => $int + 1 . "-" . $string,
                'updated_at' => now(),
            ]);
        }
        return redirect('/admin/kelas')->with('berhasilUpdateKelas', 'Data Kelas Berhasil Diperbaharui');
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
