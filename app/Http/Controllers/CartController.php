<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        return view('cart.index');
    }

    public function store(Request $request){

        $duplicates = \Cart::search(function($cartItem, $rowId) use ($request){
            return $cartItem->id === $request->id;
        });

        if($duplicates->isNotEmpty()){
            return redirect('/cart')->with('success', 'Item is already in your cart!');
        }

        \Cart::add($request->id, $request->name, 1, $request->price)->associate('App\Product');
        session()->flash('success', 'Item was added to your cart!');
        return redirect('/cart');
    }

    public function destroy($id){
        \Cart::remove($id);
        return back()->with('success', 'Item has been removed!');
    }

    public function saveForLater($id){
        $item = \Cart::get($id);
        \Cart::remove($id);
        \Cart::instance('saveForLater')->add($item->id, $item->name, 1, $item->price)->associate('App\Product');
        return redirect('/cart')->with('success', 'Item has been Saved For Later');
    }
}
