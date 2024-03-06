<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Category;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CategoryTest extends TestCase
{
    use DatabaseTransactions;

    public function test_create_category()
    {
        $category = Category::factory()->create();
        $this->assertDatabaseHas('categories', $category->toArray());
    }

    public function test_get_all_categories()
    {
        Category::factory()->create();
        $response = $this->json('get', 'api/get-categories');
        $response->assertStatus(200);
    }
}
