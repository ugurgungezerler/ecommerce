<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    public function test_list_products()
    {
        $response = $this->get('/api/product');

        $response->assertStatus(200);
    }
}
