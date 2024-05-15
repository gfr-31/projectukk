<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\Siswa;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    public function siswa()
    {
        $admin = DB::table('users')->get();
        $siswa = Siswa::with('kelas')->get();
        // dd($siswa);
        return view('admin.layout.master_data.siswa.siswa', compact('admin', 'siswa'));
    }
    public function tambahSiswa()
    {
        $admin = DB::table('users')->get();
        $kelas = DB::table('kelas')->get();
        return view('admin.layout.master_data.siswa.tambahSiswa', ['admin' => $admin], ['kelas' => $kelas]);
    }
    public function insert_siswa(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'nama' => 'regex:/^[\pL\s]+$/u',
            'tempat_lahir' => 'regex:/^[\pL\s]+$/u',
            'tanggal_lahir' => 'date',
            'no_hp_siswa' => 'numeric',
            'alamat' => 'max:500|min:10',
            'nama_ayah' => 'regex:/^[\pL\s]+$/u',
            'nama_ibu' => 'regex:/^[\pL\s]+$/u',
            'no_hp_ortu' => 'numeric',
            'nis' => 'numeric|unique:siswas,nis',
            'nisn' => 'numeric|unique:siswas,nisn',
            'fotos' => 'required|mimes:jpeg,png,jpg|max:2048',
        ], [
            'nama.regex' => 'Nama Harus Diisi Dengan Huruf.',
            'tempat_lahir.regex' => 'Tempat Lahir Harus Diisi Dengan Huruf',
            'tanggal_lahir.date' => 'Tanggal Lahir Harus Diisi Dengan Format Tanggal Yang Benar.',
            'no_hp_siswa.numeric' => 'No Hp Harus Diisi Dengan Angka.',
            'alamat.max' => 'Maximal Input 500 Karakter.',
            'alamat.min' => 'Minimum Input 10 Karakter.',
            'nama_ayah.regex' => 'Nama Ayah Harus Diisi Dengan Huruf.',
            'nama_ibu.regex' => 'Nama Ibu Harus Diisi Dengan Huruf.',
            'no_hp_ortu.numeric' => 'No Hp Orang Tua Harus Diisi Dengan Angka.',
            'nis.numeric' => 'NIS Harus Diisi Dengan Angka.',
            'nisn.numeric' => 'NISN Harus Diisi Dengan Angka.',
            'nis.unique' => 'NIS Sudah Ada Pada Data Siswa Lain.',
            'nisn.unique' => 'NISN Sudah Ada Pada Data Siswa Lain.',
            'fotos.mimes' => 'Foto Siswa Harus Berupa JPEG, PNG, JPG.',
            'fotos.max' => 'Size Foto Siswa Harus Dibawah 2MB',
            'fotos.required' => 'Foto Siswa Wajib Diisi',
        ]);

        $file_foto = $request->file('fotos');
        $foto_ekstensi = $file_foto->getClientOriginalName();

        $nama_foto = date('Y-m-d_H-i-s') . "-" . $foto_ekstensi;
        $file_foto->move(public_path('post_image'), $nama_foto);
        // $siswa = strtoupper($request->nama);
        // dd($siswa);
        $password = bcrypt($request->nis);
        DB::table('siswas')->insert([
            'nis' => $request->nis,
            'nisn' => $request->nisn,
            'password' => $password,
            'kelas_id' => $request->kelas_id,
            'nama_lengkap' => strtoupper($request->nama),
            'jk' => $request->jk,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp_siswa,
            'foto_siswa' => $nama_foto,
            'nama_ibu' => $request->nama_ibu,
            'nama_ayah' => $request->nama_ayah,
            'no_hp_ortu' => $request->no_hp_ortu,
            'created_at' => now()
        ]);
        return redirect('/admin/siswa')->with('berhasilSiswa', 'Data Berhasil Ditambahkan');
    }
    public function editSiswa(Request $request)
    {
        $kelas = DB::table('kelas')->get();
        $admin = DB::table('users')->get();
        $siswa = Siswa::with('kelas')->where('id', $request->id)->get();
        return view('admin.layout.master_data.siswa.edit_siswa', compact('kelas', 'admin', 'siswa'));
    }
    public function updateSiswa(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'nama' => 'regex:/^[\pL\s]+$/u',
            'tempat_lahir' => 'regex:/^[\pL\s]+$/u',
            'tanggal_lahir' => 'date',
            'no_hp_siswa' => 'numeric',
            'alamat' => 'max:500|min:10',
            'nama_ayah' => 'regex:/^[\pL\s]+$/u',
            'nama_ibu' => 'regex:/^[\pL\s]+$/u',
            'no_hp_ortu' => 'numeric',
            'nis' => 'numeric',
            'nisn' => 'numeric',
            'fotos' => 'mimes:jpeg,png,jpg|max:2048',
            'kelas_id' => 'required',
        ], [
            'nama.regex' => 'Nama Harus Diisi Dengan Huruf.',
            'tempat_lahir.regex' => 'Tempat Lahir Harus Diisi Dengan Huruf',
            'tanggal_lahir.date' => 'Tanggal Lahir Harus Diisi Dengan Format Tanggal Yang Benar.',
            'no_hp_siswa.numeric' => 'No Hp Harus Diisi Dengan Angka.',
            'alamat.max' => 'Maximal Input 500 Karakter.',
            'alamat.min' => 'Minimum Input 10 Karakter.',
            'nama_ayah.regex' => 'Nama Ayah Harus Diisi Dengan Huruf.',
            'nama_ibu.regex' => 'Nama Ibu Harus Diisi Dengan Huruf.',
            'no_hp_ortu.numeric' => 'No Hp Orang Tua Harus Diisi Dengan Angka.',
            'nis.numeric' => 'NIS Harus Diisi Dengan Angka.',
            'nisn.numeric' => 'NISN Harus Diisi Dengan Angka.',
            'fotos.mimes' => 'Foto Siswa Harus Berupa JPEG, PNG, JPG.',
            'fotos.max' => 'Size Foto Siswa Harus Dibawah 2MB',
            'kelas_id.required' => 'Kelas Wajib Diisi',
        ]);

        if ($request->hasFile('foto')) {
            $file_foto = $request->file('foto');
            $foto_ekstensi = $file_foto->getClientOriginalName();

            $nama_foto = date('Y-m-d_H-i-s') . "-" . $foto_ekstensi;
            $file_foto->move(public_path('post_image'), $nama_foto);
            // $siswa = strtoupper($request->nama);
            // dd($siswa);
            $password = bcrypt($request->nis);
            // dd($file_foto);
            DB::table('siswas')->where('id', $request->id)->update([
                'nis' => $request->nis,
                'password' => $password,
                'nisn' => $request->nisn,
                'kelas_id' => $request->kelas_id,
                'nama_lengkap' => strtoupper($request->nama),
                'jk' => $request->jk,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp_siswa,
                'foto_siswa' => $nama_foto,
                'nama_ibu' => $request->nama_ibu,
                'nama_ayah' => $request->nama_ayah,
                'no_hp_ortu' => $request->no_hp_ortu,
                'updated_at' => now()
            ]);
            return redirect('/admin/siswa')->with('berhasilUpdateSiswa', 'Data Siswa Berhasil Diperbaharui');
        } else {
            $siswa = strtoupper($request->nama);
            // dd($siswa);
            $password = bcrypt($request->nis);
            DB::table('siswas')->where('id', $request->id)->update([
                'nis' => $request->nis,
                'password' => $password,
                'nisn' => $request->nisn,
                'kelas_id' => $request->kelas_id,
                'nama_lengkap' => $siswa,
                'jk' => $request->jk,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp_siswa,
                'foto_siswa' => $request->foto,
                'nama_ibu' => $request->nama_ibu,
                'nama_ayah' => $request->nama_ayah,
                'no_hp_ortu' => $request->no_hp_ortu,
                'updated_at' => now()
            ]);
            return redirect('/admin/siswa')->with('berhasilUpdateSiswa', 'Data Siswa Berhasil Diperbaharui');
        }
    }
    public function hapus_siswa($id)
    {
        // dd($id);
        DB::table('siswas')->where('id', $id)->delete();
        return redirect('/admin/siswa')->with('berhasilHapusSiswa', 'Data Berhasil Dihapus');
    }

    //
}
