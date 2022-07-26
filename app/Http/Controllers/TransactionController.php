<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function generateTransaction()
    {
        $cartContents = Cart::with('product')->get();

        DB::table('products as p')
            ->join('carts as c', 'p.id', '=', 'c.product_id')
            ->update(['p.stock' =>  DB::raw("p.stock - c.product_quantity")]);

        foreach ($cartContents as $item) {
            Transaction::create([
                'product_quantity' => $item->product_quantity,
                'price_total' => $item->price_total,
                'product_id' => $item->product_id,
                'user_id' => $item->user_id
            ]);
        }

        Cart::truncate();

        return redirect()->route('getTransactions');
    }

    public function getTransactions()
    {
        $transaction = Transaction::with('product', 'user')->get();

        return view('admin.transaction', ['transactions' => $transaction]);
    }

    public function filterTransactions(Request $request)
    {
        $inputDate = $request->input('date');

        if (!$inputDate) {
            $transaction = Transaction::with('product', 'user')->get();
            return view('admin.transaction', ['transactions' => $transaction]);
        }

        $transaction = Transaction::with('product', 'user')->whereDate('created_at', '=', $inputDate)->get();

        return view('admin.transaction', ['transactions' => $transaction]);
    }
}
