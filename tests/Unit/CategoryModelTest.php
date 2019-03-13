<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\ItemCategory as Category;

class CategoryModelTest extends TestCase
{
	use DatabaseTransactions;

    /**
     * A basic unit test example.
	 * @test
     * @return void
     */
    public function category_insert()
    {
    	$category = Category::create(['name' => 'Micin']);

        $this->assertEquals('Micin', $category->name);
    }
}
