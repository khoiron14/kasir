<?php

namespace Transaction;

use Illuminate\Database\Eloquent\Model;
use Transaction\User;
use Transaction\TransactionDetail as Detail;

class Transaction extends Model
{
    protected $guarded = [];

    public function user() {
    	return $this->belongsTo(User::class);
    }

    public function details() {
    	return $this->hasMany(Detail::class);
    }
}
