<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class HomeController extends Controller
{
    /*
    public function __construct()
    {
        $this->middleware('auth');
    }
    */
    public function index()
    {
        $products = Product::inRandomOrder()->take(8)->get();
        return view('home')->with('products', $products);

    }
}
