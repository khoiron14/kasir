<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $items = Item::doesntHave('cart')->where('stock', '>', 0)->get()->sortBy('name');
        $itemCarts = Item::has('cart')->get()->sortByDesc('cart.created_at');

        return view('home', compact(['items', 'itemCarts']));
    }
}
