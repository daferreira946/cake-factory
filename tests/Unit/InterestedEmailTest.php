<?php

namespace Tests\Unit;

use App\Models\InterestedEmail;
use PHPUnit\Framework\TestCase;

class InterestedEmailTest extends TestCase
{
    public function test_create_model()
    {
        $interestedEmail = new InterestedEmail(
            [
                'email' => 'red velvet',
            ]
        );

        $this->assertInstanceOf(InterestedEmail::class, $interestedEmail);
    }

    public function test_factory_model()
    {
        $interestedEmail = InterestedEmail::factory()->make();

        $this->assertInstanceOf(InterestedEmail::class, $interestedEmail);
    }
}
