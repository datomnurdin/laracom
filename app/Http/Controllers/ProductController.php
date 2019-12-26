<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product::inRandomOrder()->take(12)->get();
        return view('product.index')->with('products', $products);
    }

    public function show($id){
        $product = Product::where('slug', $id)->firstOrFail();
        return view('product.show')->with('product', $product);
    }
}
