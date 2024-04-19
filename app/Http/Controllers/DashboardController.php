<?php

namespace App\Http\Controllers;

use App\Models\DataInformasi;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Dashboard
    public function dashboard()
    {
        $admin = DB::table('users')->get();
        $jurnal = DB::table('jurnal_umum')->get();
        $data_informasi = DataInformasi::where('status', 'Terbit')->get();
        // dd($data_informasi);
        return view('admin.layout.dashboard',compact('admin','jurnal','data_informasi'));
    }

}
