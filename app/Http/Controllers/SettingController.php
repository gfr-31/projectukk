<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class SettingController extends Controller
{
    // Developers
    public function developers()
    {
        $admin = User::get();
        return view('admin.layout.setting_aplikasi.developers', ['admin' => $admin]);
    }

    public function developers_siswa()
    {
        $admin = User::get();
        return view('siswa.layout.setting_siswa.developers', compact('admin'));
    }

    //User Admin
    public function user_admin()
    {
        $admin = User::get();
        return view('admin.layout.setting_aplikasi.user_admin.user', compact('admin'));
    }
    public function insert(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'username' => 'required',
            'email' => 'required|email:dns|unique:users,email',
            'password' => 'required',
        ], [
            'email.unique' => 'Email sudah terdaftar.',
        ]);
        $data = [
            'name' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'created_at' => now()
        ];
        $jumlah_user = User::count();
        if ($jumlah_user >= 3) {
            return redirect()->back()->with('userPenuh', 'Batas Pengguna Telah Mencapai Maksimum.');
        }

        // dd($data);
        User::insert($data);
        return redirect()->back()->with('berhasilUser', 'Data Berhasil Disimpan');
    }

    public function delete($id)
    {
        // dd($id);
        User::where('id', $id)->delete();
        return redirect()->back()->with('bHapusUser', 'Data Berhasil Dihapus');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'email' => 'required|email:dns|unique:users,email',
            'password' => 'required',
        ], [
            'email.unique' => 'Email sudah terdaftar.',
        ]);
        $data = [
            'name' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'updated_at' => now()
        ];
        // dd($data);
        User::where('id', $request->id)->update($data);
        return redirect()->back()->with('bEditsUser', 'Data Berhasil Diperbaharui');
    }
}
