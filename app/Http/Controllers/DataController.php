<?php

namespace App\Http\Controllers;

use App\Services\NotifWa;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\DataInformasi;

class DataController extends Controller
{

    public function dataInformasi()
    {
        $admin = User::get();
        $data_informasi = DB::table('data_informasi')->get();
        return view('admin.layout.data_informasi.data_informasi', compact('admin', 'data_informasi'));
    }

    public function tambahInformasi()
    {
        $admin = User::get();
        return view('admin.layout.data_informasi.tambahInformasi', ['admin' => $admin]);
    }

    public function insert_data(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'judul' => 'required',
            'deskripsi' => 'required|min:16',
            'status' => 'required',
            'fotos' => 'mimes:jpeg,png,jpg|max:2048',
        ], [
            'judul.required' => 'Judul Harus Disii.',
            'deskripsi.required' => 'Deskripsi Harus Disii.',
            'deskripsi.min' => 'Minimum Input 10 Karakter.',
            'status.required' => 'Status Harus Disii.',
            // 'fotos.required' => 'Foto Harus Disii.',
            'fotos.mimes' => 'Foto Siswa Harus Berupa JPEG, PNG, JPG.',
            'fotos.max' => 'Size Foto Siswa Harus Dibawah 2MB',
        ]);
        if ($request->hasFile('fotos')) {
            $file_foto = $request->file('fotos');
            $foto_ekstensi = $file_foto->getClientOriginalName();

            $nama_foto = date('Y-m-d_H-i-s') . "-" . $foto_ekstensi;
            $file_foto->move(public_path('post_image'), $nama_foto);

            DataInformasi::insert([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'tanggal' => now(),
                'gambar' => $nama_foto,
                'status' => $request->status
            ]);

            return redirect('/admin/data')->with('berhasil', 'Data Berhasil Disimpan');
        } else {
            DataInformasi::insert([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'tanggal' => now(),
                'gambar' => null,
                'status' => $request->status
            ]);
            return redirect('/admin/data')->with('berhasil', 'Data Berhasil Disimpan');
        }
    }

    public function hapus_data($id)
    {
        // dd($id);
        DataInformasi::where('id', $id)->delete();
        return redirect('/admin/data')->with('berhasilHapusData', 'Data Berhasil Dihapus');
    }
    public function hapus_semua(Request $request){
        $ids = $request->ids;
        // dd($ids);
        DataInformasi::whereIn('id',explode(",",$ids))->delete();
        return back();
    }

    public function edit_informasi($id)
    {
        $admin = User::get();
        $data_informasi = DataInformasi::where('id', $id)->get();
        return view('admin.layout.data_informasi.edit_informasi', compact('admin', 'data_informasi'));
    }

    public function update_data(Request $request)
    {
        // dd($request->all());
        if ($request->hasFile('fotos')) {
            $this->validate($request, [
                'judul' => 'required',
                'deskripsi' => 'required|min:16',
                'status' => 'required',
                'fotos' => 'mimes:jpeg,png,jpg|max:2048',
            ], [
                'judul.required' => 'Judul Harus Disii.',
                'deskripsi.required' => 'Deskripsi Harus Disii.',
                'deskripsi.min' => 'Minimum Input 10 Karakter.',
                'status.required' => 'Status Harus Disii.',
                // 'fotos.required' => 'Foto Harus Disii.',
                'fotos.mimes' => 'Foto Siswa Harus Berupa JPEG, PNG, JPG.',
                'fotos.max' => 'Size Foto Siswa Harus Dibawah 2MB',
            ]);

            $file_foto = $request->file('fotos');
            $foto_ekstensi = $file_foto->getClientOriginalName();

            $nama_foto = date('Y-m-d_H-i-s') . "-" . $foto_ekstensi;
            $file_foto->move(public_path('post_image'), $nama_foto);
            // dd($nama_foto);
            DataInformasi::where('id', $request->id)->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'tanggal' => now(),
                'gambar' => $nama_foto,
                'status' => $request->status
            ]);

            return redirect('/admin/data')->with('berhasilUpdatedata', 'Data Informasi Berhasil Diperbaharui');
        } else {
            // dd($request->all());
            $this->validate($request, [
                'judul' => 'required',
                'deskripsi' => 'required|min:16',
                'status' => 'required',
                // 'fotos' => 'required',
            ], [
                'judul.required' => 'Judul Harus Disii.',
                'deskripsi.required' => 'Deskripsi Harus Disii.',
                'deskripsi.min' => 'Minimum Input 10 Karakter.',
                'status.required' => 'Status Harus Disii.',
                // 'fotos.required' => 'Foto Harus Disii.',
            ]);
            DataInformasi::where('id', $request->id)->update([
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
