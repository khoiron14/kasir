<?php

namespace Transaction;

use Illuminate\Database\Eloquent\Model;
use Transaction\Transaction;
use Transaction\Item;

class TransactionDetail extends Model
{
    protected $guarded = [];

    public function transaction() {
    	return $this->belongsTo(Transaction::class);
    }

    public function item() {
    	return $this->belongsTo(Item::class);
    }
}
