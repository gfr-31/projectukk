<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

use App\Models\DataInformasi;

class AdminSiswaController extends Controller
{
    public function login_pemsis()
    {
        return view('siswa/login_siswa');
    }

    public function authenticat(Request $request)
    {

        $request->validate([
            'nama_lengkap' => ['required'],
            'password' => ['required'],
        ]);
        // dd($request);

        $infologin = [
            'nama_lengkap' => $request->nama_lengkap,
            'password' => $request->password,
        ];
        // dd($infologin);

        if (Auth::guard('siswa')->attempt($infologin)) {
            return redirect()->intended('/siswa/dashboard')->with('success', 'Anda Berhasil Login');
        }else{
            return back()->with('loginError', 'Login Gagal !!!');
        }
        // dd('berhasil login');
    }

    public function logout()
    {
        Auth::guard('siswa')->logout();
        return Redirect('/login_siswa')->with('success_loguot', 'Anda Berhasil Logout');
    }
    public function dashboard()
    {
        $siswa = DB::table('siswas')->get();
        $data_informasi = DataInformasi::where('status', 'Terbit')->get();
        return view('siswa.layout.dashboard_siswa', compact('siswa', 'data_informasi'));
    }

}