<?php

namespace App\Http\Controllers;

use App\Models\laptop;
use Illuminate\Http\Request;

class LaptopController extends Controller
{
    function index() 
    {
        $laptops = laptop::all();
       return view('laptop', ['laptops' => $laptops]);   
    }

}
