<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ItemCategory as Category;
use App\Cart;

class Item extends Model
{
    protected $guarded = [];

    public function category() {
    	return $this->belongsTo(Category::class);
    }

    public function cart() {
    	return $this->hasOne(Cart::class);
    }
}
