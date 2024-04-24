<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use DateTime;

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
            'nama' => 'required',
            'jk' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'no_hp_siswa' => 'required',
            'alamat' => 'required',
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
            'no_hp_ortu' => 'required',
            'nis' => 'required',
            'nisn' => 'required',
            'kelas_id' => 'required',
            'fotos' => 'required',
        ], [
            'nama.required' => 'Nama harus diisi lengkap.',
            'jk.required' => 'Jenis Kelamin harus diisi lengkap.',
            'tempat_lahir.required' => 'Tempat Lahir harus diisi lengkap.',
            'tanggal_lahir.required' => 'Tanggal Lahir harus diisi lengkap.',
            'no_hp_siswa.required' => 'No Hp harus diisi lengkap.',
            'alamat.required' => 'Alamat harus diisi lengkap.',
            'nama_ayah.required' => 'Nama Ayah harus diisi lengkap.',
            'nama_ibu.required' => 'Nama Ibu harus diisi lengkap.',
            'no_hp_ortu.required' => 'No HP Orang Tua harus diisi lengkap.',
            'nis.required' => 'NIS harus diisi lengkap.',
            'nisn.required' => 'NISN harus diisi lengkap.',
            'kelas_id.required' => 'Kelas harus diisi lengkap.',
            'fotos.required' => 'Foto Siswa harus diisi lengkap.',
        ]);

        $validasi = Validator::make($request->all(), [
            'nis' => 'unique:siswas,nis'
        ]);
        // dd($validasi);
        if($validasi->fails()){
            return redirect()->back()->with('gagalInput', 'NIS Tidak Boleh Sama Atau Data Sudah Ada');
            // return redirect()->back()->withErrors($validasi)->withInput();
        }
        
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
        DB::table('siswas')->where('id', $id)->delete();
        return redirect('/admin/siswa')->with('berhasilHapusSiswa', 'Data Berhasil Dihapus');
    }

    //
}
