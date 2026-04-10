<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('home', compact('products'));
    }

    public function products() {
        $products = Product::all();
        return view('products', compact('products'));
    }

    public function detail($id) {
        $p = Product::find($id);
        return view('detail', compact('p'));
    }
}