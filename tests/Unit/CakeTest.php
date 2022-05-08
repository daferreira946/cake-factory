<?php

namespace Tests\Unit;

use App\Models\Cake;
use PHPUnit\Framework\TestCase;

class CakeTest extends TestCase
{

    public function test_create_model()
    {
        $cake = new Cake(
            [
                'name' => 'red velvet',
                'weight' => 200.5,
                'value' => 60.00,
                'available_quantity' => 10
            ]
        );

        $this->assertInstanceOf(Cake::class, $cake);
    }

    public function test_factory_model()
    {
        $cake = Cake::factory()->make();

        $this->assertInstanceOf(Cake::class, $cake);
    }
}
