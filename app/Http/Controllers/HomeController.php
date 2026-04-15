<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('home', compact('products'));
    }

    public function products(\Illuminate\Http\Request $request)
{
    $keyword = $request->keyword;

    $products = \App\Models\Product::where('name', 'like', "%$keyword%")->get();

    return view('products', compact('products'));
}

    public function detail($id) {
        $p = Product::find($id);
        return view('detail', compact('p'));
    }
    
}