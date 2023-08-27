<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\laptop;
use Illuminate\Http\Request;

class LaptopController extends Controller
{
    function index() 
    {
        $laptops = laptop::all();
       return view('laptop', ['laptops' => $laptops]);   
    }

    function add()
    {
        $categories = Category::all();
        return view('laptop-add', ['categories' => $categories]);
        
    }

    function store(Request $request)
    {
        $validated = $request->validate([
            'laptop_code' => 'required|unique:laptops|max:255',
            'title' => 'required|max:255',
        ]);

        $newName = '';
        if($request->file('image')) {
            $extension = $request -> file('image')->getClientOriginalExtension();
            $newName = $request->title.'-'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('cover', $newName);
        }

        $request['cover'] = $newName;
        $laptop = Laptop::create($request->all());
        $laptop->categories()->sync($request->categories);
        return redirect('laptops')->with('status', 'Laptop Berhasil Ditambahkan!');
    }

    function edit($slug) 
    {
        $laptop = Laptop::where('slug', $slug)->first();
        $categories = Category::all();
        return view('laptop-edit', ['categories' => $categories, 'laptop' => $laptop]);    
    }

    function update(Request $request, $slug) 
    {
        if($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title.'-'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('cover', $newName);
            $request['cover'] = $newName;
        }
        
        $laptop = Laptop::where('slug', $slug)->first();
        $laptop->update($request->all());

        if($request->categories) {
            $laptop->categories()->sync($request->categories);
        }

        return redirect('laptops')->with('status', 'Laptop Berhasil Diperbaharui!');
    }
}
