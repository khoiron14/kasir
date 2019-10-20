<?php

namespace Transaction;

use Illuminate\Database\Eloquent\Model;
use Transaction\Item;

class ItemCategory extends Model
{
    protected $guarded = [];

    public function items() {
    	return $this->hasMany(Item::class);
    }
}
