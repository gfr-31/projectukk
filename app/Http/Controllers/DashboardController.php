<?php

namespace App\Http\Controllers;

use app\Models\User;
use App\Models\DataInformasi;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Dashboard
    public function dashboard()
    {
        $admin = User::where('id', '1')->get();
        dd($admin);
        return view('admin.layout.pembayaran.pembayaran',compact('admin','jurnal','data_informasi'));
    }

}
