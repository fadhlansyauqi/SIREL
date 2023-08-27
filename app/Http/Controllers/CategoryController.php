<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function index()
    {
        $categories = Category::all();
        return view('category', ['categories' => $categories]);
    }

    function add()
    {
        return view('category-add');    
    }

    function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:100',
        ]);

       $category = Category::create($request->all());
       return redirect('categories')->with('status', 'Kategori Berhasil Ditambahkan!');
    }

    function edit($slug)
    {
        $category = Category::where('slug', $slug)->first();
        return view('category-edit', ['category' => $category]);
    }

    function update(Request $request, $slug) 
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:100',
        ]); 
        
        $category = Category::where('slug', $slug)->first();
        $category->slug = null;
        $category->update($request->all());
        return redirect('categories')->with('status', 'Kategori Berhasil Diperbaharui!');
    }
}
