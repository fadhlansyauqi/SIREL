<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function profile() 
    {
        return view('profile');
    }

    function index() 
    {
        return view('user');
    }
}
