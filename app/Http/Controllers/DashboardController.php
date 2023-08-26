<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\laptop;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index() 
    {
        $laptopcount = laptop::count();
        $categorycount = Category::count();
        $usercount = User::count();
        return view('dashboard', ['laptop_count' => $laptopcount, 'category_count' => $categorycount, 'user_count' => $usercount]);  
    }
}
