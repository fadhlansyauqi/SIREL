<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function profile() 
    {
        return view('profile');
    }

    function index() 
    {
        $users = User::where('role_id', 2)->where('status', 'active')->get();
        return view('user', ['users' => $users]);
    }

    function registeredUser()
    {
        $registeredUsers = User::where('status', 'inactive')->where('role_id', 2)->get();
        return view('registered-user', ['registeredUsers' => $registeredUsers]);    
    }

    function show($slug) 
    {
        $user = User::where('slug', $slug)->first();
        return view('user-detail', ['user' => $user]);    
    }

    function approve($slug) 
    {
        $user = User::where('slug', $slug)->first();
        $user->status = 'active';
        $user->save();
        
        return redirect('user-detail/'.$slug)->with('status', 'User Berhasil Diapprove!'); 
    }

}
