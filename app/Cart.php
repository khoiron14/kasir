<?php

namespace Transaction;

use Illuminate\Database\Eloquent\Model;
use Transaction\Item;

class Cart extends Model
{
    protected $guarded = [];

    public function item() {
    	return $this->belongsTo(Item::class);
    }
}
