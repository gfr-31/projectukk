<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function login(){
        return view('admin/login_admin');
    }

    public function authenticat(Request $request){
        $credentials = $request -> validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->intended('admin/dashboard')->with('success', 'Anda Berhasil Login');
        }
        return back()->with('loginError', 'Login Gagal !!!');
        // dd('berhasil login');
    }

    public function logout(){
        Auth::logout();
        return Redirect('/login_admin')->with('success', 'Anda Berhasil Logout');
        
    }

}
