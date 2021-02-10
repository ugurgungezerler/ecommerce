<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use DatabaseMigrations, WithFaker;


    public function testListProducts()
    {
        Product::factory(4)->create();

        $response = $this->get('/api/products');

        $response->assertStatus(200)->assertJsonFragment(['total' => 4]);
    }

    public function testShowProduct()
    {
        Product::factory(4)->create();

        $response = $this->get('/api/products/1');

        $response->assertStatus(200)->assertJsonFragment(['id' => 1]);
    }

    public function testUpdateProduct()
    {
        Product::factory(4)->create();

        $response = $this->patch('/api/products/1',
            [
                'name' => 'Updated Product',
                'description' => $this->faker->sentence(4),
                'price' => '10.99',
                'image' => $this->faker->imageUrl(500, 500),
            ]);

        $response->assertStatus(200)
            ->assertJsonFragment([
                'id' => 1,
                'name' => 'Updated Product'
            ]);
    }

    public function testDestroyProduct()
    {
        Product::factory(4)->create();

        $response = $this->delete('/api/products/1');

        $response->assertStatus(200);
    }
}
