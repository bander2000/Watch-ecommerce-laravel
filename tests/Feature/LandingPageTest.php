<?php

namespace Tests\Feature;

use App\Models\product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LandingPageTest extends TestCase
{
   
    use RefreshDatabase;

    public function landing_page_loads_correctly()
    {
        //Act
        $response = $this->get('/');


        //Assert
        $response->assertStatus(200);
        $response->assertSee('Smart Watches');
    }

    public function featured_product_is_visible()
    {
        // Arrange
        $featuredProduct = product::factory()->create([
            'featured' => true,
            'name' => 'Watch 1',
            'price' => 149999,
        ]);

        // Act
        $response = $this->get('/');

        // Assert
        $response->assertSee($featuredProduct->name);
        $response->assertSee('$1499.99');
    }

}
