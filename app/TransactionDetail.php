<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Transaction;

class TransactionDetail extends Model
{
    protected $guarded = [];

    public function transaction() {
    	return $this->belongsTo(Transaction::class);
    }
}
