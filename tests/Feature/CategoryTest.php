<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use DatabaseMigrations;

    public function testListCategories()
    {
        Category::factory(4)->create();

        $response = $this->get('/api/category');

        $response->assertStatus(200)->assertJsonFragment(['total' => 4]);
    }

    public function testShowCategory()
    {
        Category::factory(4)->create();

        $response = $this->get('/api/category/1');

        $response->assertStatus(200)->assertJsonFragment(['id' => 1]);
    }

    public function testUpdateCategory()
    {
        Category::factory(4)->create();

        $response = $this->patch('/api/category/1', ['name' => 'Updated Product']);

        $response->assertStatus(200)
            ->assertJsonFragment([
                'id' => 1,
                'name' => 'Updated Product'
            ]);
    }

    public function testDestroyCategory()
    {
        Category::factory(4)->create();

        $response = $this->delete('/api/category/1');

        $response->assertStatus(200);
    }
}
