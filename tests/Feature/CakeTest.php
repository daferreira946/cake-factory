<?php

namespace Tests\Feature;

use App\Models\Cake;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CakeTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_index_method()
    {
        Cake::factory()->count(30)->create();

        $response = $this->get('/cake');
        $content = $response->decodeResponseJson();

        $response->assertStatus(200);
        $this->assertCount(10, $content['data']);
        $this->assertArrayHasKey('links', $content);
        $this->assertArrayHasKey('meta', $content);
    }

    public function test_show_method()
    {
        Cake::factory()->count(4)->create();
        $cake = Cake::factory()->create();

        $response = $this->get("/cake/{$cake->id}");
        $content = $response->decodeResponseJson();

        $response->assertStatus(200);
        $this->assertEquals($cake->id, $content['data']['id']);
        $this->assertEquals($cake->name, $content['data']['name']);
        $this->assertEquals($cake->weight, $content['data']['weight']);
        $this->assertEquals($cake->value, $content['data']['value']);
        $this->assertEquals($cake->available_quantity, $content['data']['available_quantity']);
    }

    public function test_store_method()
    {
        Cake::factory()->count(4)->create();

        $expected = [
            'name' => 'red velvet',
            'weight' => 500,
            'value' => 60.00,
            'available_quantity' => 10
        ];

        $response = $this->post("/cake", $expected);
        $content = $response->decodeResponseJson();

        $response->assertStatus(201);
        $expected['value'] = $expected['value'] * 100;
        $this->assertDatabaseCount('cakes', 5);
        $this->assertDatabaseHas('cakes', $expected);
        $expected['value'] = $expected['value'] / 100;
        $this->assertEquals($expected['name'], $content['data']['name']);
        $this->assertEquals($expected['weight'], $content['data']['weight']);
        $this->assertEquals($expected['value'], $content['data']['value']);
        $this->assertEquals($expected['available_quantity'], $content['data']['available_quantity']);
    }

    public function test_update_method()
    {
        $cake = Cake::factory()->create();
        Cake::factory()->count(4)->create();

        $expected = [
            'name' => 'red velvet',
            'weight' => 500
        ];

        $response = $this->patch("/cake/{$cake->id}", $expected);

        $expected = array_merge($expected, ['id' => $cake->id]);

        $response->assertStatus(204);
        $this->assertDatabaseCount('cakes', 5);
        $this->assertDatabaseHas('cakes', $expected);
    }

    public function test_destroy_method()
    {
        $cake = Cake::factory()->create();
        Cake::factory()->count(4)->create();

        $response = $this->delete("/cake/{$cake->id}");

        $response->assertStatus(204);
        $this->assertDatabaseCount('cakes', 4);
        $this->assertDatabaseMissing('cakes', [
            'id' => $cake->id
        ]);
    }
}
