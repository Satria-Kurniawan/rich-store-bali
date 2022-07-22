<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class BookkeepingController extends Controller
{
    public function getBookkeeping()
    {
        $products = Product::all();
        $cartContents = Cart::with('product')->get();

        return view('admin.pembukuan', [
            'products' => $products,
            'cartContents' => $cartContents
        ]);
    }
}
