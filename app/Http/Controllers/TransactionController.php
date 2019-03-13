<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Transaction;
use App\Cart;

class TransactionController extends Controller
{
    public function store()
    {
        DB::beginTransaction();

        try {
            auth()->user()
                ->transactions()
                ->create(request()->all())
                ->details()
                ->createMany(Cart::all()->map(function ($cart) { 
                    return [
                        'item_id' => $cart->item_id,
                        'quantity' => $cart->quantity,
                        'subtotal' => $cart->item->price * $cart->quantity
                    ];
                })->toArray());

            DB::table('carts')->delete();

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }
    	
    	return redirect()->route('transaction.show', Transaction::latest()->first());
    }

    public function index() 
    {
    	$transactions = Transaction::latest()->get();

    	return view('transaction.index', compact('transactions'));
    }

    public function show(Transaction $transaction) 
    {
    	return view('transaction.show', compact('transaction'));
    }
}
