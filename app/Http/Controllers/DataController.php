<?php

namespace App\Http\Controllers;

use App\Services\NotifWa;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DataController extends Controller
{
    // Dashboard
    public function dataInformasi()
    {
        $admin = DB::table('users')->get();
        $data_informasi = DB::table('data_informasi')->get();
        return view('admin.layout.data_informasi.data_informasi', compact('admin', 'data_informasi'));
    }

    public function tambahInformasi()
    {
        $admin = DB::table('users')->get();
        return view('admin.layout.data_informasi.tambahInformasi', ['admin' => $admin]);
    }

    public function insert_data(Request $request)
    {
        $file_foto = $request->file('fotos');
        $foto_ekstensi = $file_foto->getClientOriginalName();

        $nama_foto = date('Y-m-d_H-i-s') . "-" . $foto_ekstensi;
        $file_foto->move(public_path('post_image'), $nama_foto);
        // dd($nama_foto);
        DB::table('data_informasi')->insert([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tanggal' => now(),
            'gambar' => $nama_foto,
            'status' => $request->status
        ]);
        return redirect('/admin/data')->with('berhasil', 'Data Berhasil Disimpan');
    }

    public function hapus_data($id)
    {
        DB::table('data_informasi')->where('id', $id)->delete();
        return redirect('/admin/data')->with('berhasilHapusData', 'Data Berhasil Dihapus');
    }

    public function edit_informasi($id)
    {
        $admin = DB::table('users')->get();
        $data_informasi = DB::table('data_informasi')->where('id', $id)->get();
        return view('admin.layout.data_informasi.edit_informasi', compact('admin', 'data_informasi'));
    }

    public function update_data(Request $request)
    {
        if ($request->hasFile('fotos')) {
            $file_foto = $request->file('fotos');
            $foto_ekstensi = $file_foto->getClientOriginalName();

            $nama_foto = date('Y-m-d_H-i-s') . "-" . $foto_ekstensi;
            $file_foto->move(public_path('post_image'), $nama_foto);
            // dd($nama_foto);
            DB::table('data_informasi')->where('id', $request->id)->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'tanggal' => now(),
                'gambar' => $nama_foto,
                'status' => $request->status
            ]);

            return redirect('/admin/data')->with('berhasilUpdatedata', 'Data Informasi Berhasil Diperbaharui');
        } else {
            // dd($request->all());
            DB::table('data_informasi')->where('id', $request->id)->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'tg_update' => now(),
                'gambar' => $request->fotos,
                'status' => $request->status
            ]);
            return redirect('/admin/data')->with('berhasilUpdatedata', 'Data Informasi Berhasil Diperbaharui');
        }

    }
    public function NotifWa(Request $request)
    {
        $target = $request->target;
        $pesan = $request->pesan;

        // dd($target, $pesan);
        NotifWa::NotifWa($target, $pesan);
        return redirect()->back();
    }

}