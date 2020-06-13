<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FindResturantTest extends TestCase
{    
    /** @test */
    public function find_with_correct_data()
    {
        $response = $this->json('GET', '/', [
            'meal_name' => 'Shawarma',
            'latitude' => '24.807443',
            'longitude' => '46.762537'
        ]);

        $response->assertOk();
        $response->assertSee('Shawerma House');
        $response->assertViewHas('resturnats');
    }

    /** @test */
    public function find_with_wrong_data()
    {
        $response = $this->json('GET', '/', [
            'meal_name' => '',
            'latitude' => '24.807443',
            'longitude' => '46.762537'
        ]);

        $response->assertSee('No result');
    }
}
