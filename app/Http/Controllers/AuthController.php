<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    function login() 
    {
        return view('login');
    }

    function register()
    {
        return view('register');
    }

    function authenticating(Request $request)  
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        
        // cek apakah login bener
        
        if (Auth::attempt($credentials)) {
            // cek apakah user statusnya active
            if (Auth::user()->status != 'active') {
                Session::flash('status', 'failed');
                Session::flash('message', 'Akun anda belum aktif, silahkan kontak admin!');
                return redirect('/login');
            }

            // $request->session()->regenerate();
            if(Auth::user()->role_id == 1) {
                return redirect('dashboard');
            }

            if(Auth::user()->role_id == 2) {
                return redirect('profile');
            }
        }

        Session::flash('status', 'failed');
        Session::flash('message', 'Username atau password salah!');
        return redirect('/login');
    }
}