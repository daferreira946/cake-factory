<?php

namespace Tests\Feature;

use App\Models\Cake;
use App\Models\InterestedEmail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class InterestedEmailTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_index_method()
    {
        InterestedEmail::factory()
            ->count(30)
            ->for(
                Cake::factory()->create()
            )
            ->create();

        $response = $this->get('/interested-emails');
        $content = $response->decodeResponseJson();

        $response->assertStatus(200);
        $this->assertCount(20, $content['data']);
        $this->assertArrayHasKey('links', $content);
        $this->assertArrayHasKey('meta', $content);
    }

    public function test_show_method()
    {
        InterestedEmail::factory()
            ->count(9)
            ->for(
                Cake::factory()->create()
            )
            ->create();

        $cake = Cake::factory()->create();
        $insterestedEmail = InterestedEmail::factory()
            ->for($cake)
            ->create();

        $response = $this->get("/interested-emails/{$insterestedEmail->id}");
        $content = $response->decodeResponseJson();

        $this->assertEquals($insterestedEmail->id, $content['data']['id']);
        $this->assertEquals($insterestedEmail->email, $content['data']['email']);

        $this->assertEquals($cake->id, $content['data']['cake']['id']);
        $this->assertEquals($cake->name, $content['data']['cake']['name']);
        $this->assertEquals($cake->weight, $content['data']['cake']['weight']);
        $this->assertEquals($cake->value, $content['data']['cake']['value']);
        $this->assertEquals($cake->available_quantity, $content['data']['cake']['available_quantity']);
    }

    public function test_store_method()
    {
        InterestedEmail::factory()
            ->count(9)
            ->for(
                Cake::factory()->create()
            )
            ->create();

        $cake = Cake::factory()->create();

        $expected = [
            'email' => 'test@test.com',
            'cake_id' => $cake->id
        ];

        $response = $this->post("/interested-emails", $expected);
        $content = $response->decodeResponseJson();

        $response->assertStatus(201);
        $this->assertDatabaseCount('interested_emails', 10);
        $this->assertDatabaseHas('interested_emails', $expected);
        $this->assertEquals($expected['email'], $content['data']['email']);

        $this->assertEquals($cake->id, $content['data']['cake']['id']);
        $this->assertEquals($cake->name, $content['data']['cake']['name']);
        $this->assertEquals($cake->weight, $content['data']['cake']['weight']);
        $this->assertEquals($cake->value, $content['data']['cake']['value']);
        $this->assertEquals($cake->available_quantity, $content['data']['cake']['available_quantity']);
    }

    public function test_store_method_withou_cake()
    {
        InterestedEmail::factory()
            ->count(9)
            ->for(
                Cake::factory()->create()
            )
            ->create();

        $expected = [
            'email' => 'test@test.com',
            'cake_id' => 5900
        ];

        $response = $this->post("/interested-emails", $expected);
        try {
            $response->decodeResponseJson();
        } catch (ValidationException $exception) {
            $message = $exception->getMessage();
        }

        $response->assertStatus(302);
        $this->assertStringContainsString('cake', $message);
        $this->assertDatabaseCount('interested_emails', 9);
    }

    public function test_store_batch_method()
    {
        InterestedEmail::factory()
            ->count(6)
            ->for(
                Cake::factory()->create()
            )
            ->create();

        $cake = Cake::factory()->create();

        $expected = [
            'cake_id' => $cake->id,
            'emails' => [
                ['email' => 'test@test.com'],
                ['email' => 'test1@test.com'],
                ['email' => 'test2@test.com'],
                ['email' => 'test3@test.com'],
            ]
        ];

        $response = $this->post("/interested-emails/batch", $expected);

        $response->assertStatus(201);
        $this->assertDatabaseCount('interested_emails', 10);
        $this->assertDatabaseHas(
            'interested_emails',
            [
                'cake_id' => $expected['cake_id'],
                'email' => $expected['emails'][0]['email']
            ]
        );
        $this->assertDatabaseHas(
            'interested_emails',
            [
                'cake_id' => $expected['cake_id'],
                'email' => $expected['emails'][1]['email']
            ]
        );
        $this->assertDatabaseHas(
            'interested_emails',
            [
                'cake_id' => $expected['cake_id'],
                'email' => $expected['emails'][2]['email']
            ]
        );
        $this->assertDatabaseHas(
            'interested_emails',
            [
                'cake_id' => $expected['cake_id'],
                'email' => $expected['emails'][3]['email']
            ]
        );
    }

    public function test_update_method()
    {
        InterestedEmail::factory()
            ->count(9)
            ->for(
                Cake::factory()->create()
            )
            ->create();

        $cake = Cake::factory()->create();
        $cake2 = Cake::factory()->create();
        $insterestedEmail = InterestedEmail::factory()
            ->for($cake)
            ->create();

        $expected = [
            'email' => 'email@teste.com',
            'cake_id' => $cake2->id
        ];

        $response = $this->put("/interested-emails/{$insterestedEmail->id}", $expected);

        $response->assertStatus(204);
        $this->assertDatabaseCount('interested_emails', 10);
        $this->assertDatabaseHas('interested_emails', $expected);
    }

    public function test_update_method_without_cake()
    {
        InterestedEmail::factory()
            ->count(9)
            ->for(
                Cake::factory()->create()
            )
            ->create();

        $cake = Cake::factory()->create();
        $insterestedEmail = InterestedEmail::factory()
            ->for($cake)
            ->create();

        $expected = [
            'email' => 'email@teste.com',
            'cake_id' => 58
        ];

        $response = $this->put("/interested-emails/{$insterestedEmail->id}", $expected);

        try {
            $response->decodeResponseJson();
        } catch (ValidationException $exception) {
            $message = $exception->getMessage();
        }

        $response->assertStatus(302);
        $this->assertStringContainsString('cake', $message);
        $this->assertDatabaseCount('interested_emails', 10);
    }

    public function test_destroy_method()
    {
        $insterestedEmail = InterestedEmail::factory()
            ->for(
                Cake::factory()->create()
            )
            ->create();

        $response = $this->delete("/interested-emails/{$insterestedEmail->id}");

        $response->assertStatus(204);
        $this->assertDatabaseCount('interested_emails', 0);
        $this->assertDatabaseMissing('interested_emails', $insterestedEmail->toArray());
    }
}
