<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Item;

class ItemCategory extends Model
{
    protected $guarded = [];

    public function items() {
    	return $this->hasMany(Item::class);
    }
}
