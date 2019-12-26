<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        //dd(session()->get('success'));
        return view('cart.index');
    }

    public function store(Request $request){
        \Cart::add($request->id, $request->name, 1, $request->price)->associate('App\Product');
        session()->flash('success', 'Item was added to your cart!');
        return redirect('/cart');
    }
}
