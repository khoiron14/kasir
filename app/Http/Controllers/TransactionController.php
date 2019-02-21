<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\Cart;

class TransactionController extends Controller
{
    public function store()
    {
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

    	Cart::whereNotNull('id')->delete();

    	return redirect()->back();
    }
}
