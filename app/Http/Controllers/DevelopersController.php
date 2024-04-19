<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class DevelopersController extends Controller
{
    // Developers
    public function developers()
    {
        $admin = DB::table('users')->get();
        return view('admin.layout.setting_aplikasi.developers',['admin' => $admin]);
    }

    public function bulan()
    {
        $admin = DB::table('users')->get();
        $bulan = DB::table('bulans')->get();
        return view('admin.layout.setting_aplikasi.bulan', compact('admin', 'bulan'));
    }

    public function developers_siswa()
    {
        $admin = DB::table('users')->get();
        return view('siswa.layout.setting_siswa.developers', compact('admin'));
    }
}
