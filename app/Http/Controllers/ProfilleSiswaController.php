<?php

namespace App\Http\Controllers;

use App\Models\ProfilleSiswa;
use App\Models\Siswa;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProfilleSiswaController extends Controller
{
    public function Profille($id)
    {
        $profille = Siswa::where('id', $id)->get();
        // dd($profille);
        return view('siswa.layout.profile.profille', compact('profille'));
    }

}