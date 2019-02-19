<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ItemCategory as Category;

class Item extends Model
{
    protected $guarded = [];

    public function category() {
    	return $this->belongsTo(Category::class);
    }
}
