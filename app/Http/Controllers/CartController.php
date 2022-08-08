<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class CartController extends Controller
{
    public function addProductToCart($productId)
    {
        $product = Product::findOrFail($productId);

        $productAlreadyInTheCart = Cart::where('product_id', $productId)->get();

        if (!$productAlreadyInTheCart->isEmpty()) {
            $cartId = $productAlreadyInTheCart[0]->id;

            $cart = Cart::findOrFail($cartId);
            $cart->product_quantity++;
            $cart->price_total =  $cart->product_quantity * $product->price;
            $cart->save();

            return redirect()->route('getBookkeeping');
        }

        Cart::create([
            'product_quantity' => 1,
            'price_total' => $product->price,
            'product_id' => $product->id,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('getBookkeeping');
    }

    public function itemReduction($cartContentId)
    {
        $cartContent = Cart::findOrFail($cartContentId);

        $productId = $cartContent->product_id;
        $product = Product::findOrFail($productId);

        if ($cartContent->product_quantity > 1) {
            $cartContent->product_quantity--;
            $cartContent->price_total = $cartContent->product_quantity * $product->price;
            $cartContent->save();
        } else {
            $cartContent->delete();
        }

        return redirect()->route('getBookkeeping');
    }

    public function itemAddition($cartContentId)
    {
        $cartContent = Cart::findOrFail($cartContentId);

        $productId = $cartContent->product_id;
        $product = Product::findOrFail($productId);

        if ($cartContent->product_quantity < $product->stock) {
            $cartContent->product_quantity++;
            $cartContent->price_total = $cartContent->product_quantity * $product->price;
            $cartContent->save();
        } else {
            return redirect()->route('getBookkeeping')->with('message', 'Stock maksimal');
        }

        return redirect()->route('getBookkeeping');
    }

    public function clearItems()
    {
        Cart::truncate();

        return redirect()->back();
    }
}
