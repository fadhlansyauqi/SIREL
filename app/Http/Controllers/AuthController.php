<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

    function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    function registerProcess(Request $request) 
    {
        $validated = $request->validate([
            'username' => 'required|unique:users|max:255',
            'password' => 'required|max:255',
            'phone' => 'max:255',
            'address' => 'required|max:255',
        ]);

        $request['password'] = Hash::make($request->password);
        $user = User::create($request->all());

        Session::flash('status', 'success');
        Session::flash('message', 'Register Berhasil! Silahkan menunggu persetujuan admin');
        return redirect('register');
    }
}