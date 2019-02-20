<?php

namespace App\Http\Controllers;

use App\Cart;

class CartController extends Controller
{
    public function store()
    {
    	if (request()->item_id) {
    		Cart::create(request()->all());
    	}

    	return redirect()->back();
    }
}
