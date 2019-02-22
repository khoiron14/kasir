<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ItemCategory as Category;
use App\Cart;
use App\Transaction;
use App\TransactionDetail;

class Item extends Model
{
    protected $guarded = [];

    public function category() {
    	return $this->belongsTo(Category::class, 'item_category_id');
    }

    public function cart() {
    	return $this->hasOne(Cart::class);
    }

    public function transactions() {
    	return $this->hasManyThrough(Transaction::class, TransactionDetail::class);
    }
}
