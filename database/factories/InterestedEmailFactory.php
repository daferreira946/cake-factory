<?php

namespace Database\Factories;

use App\Models\InterestedEmail;
use Faker\Generator;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class InterestedEmailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'email' => $this->faker->email()
        ];
    }

    protected function withFaker(): Generator
    {
        return \Faker\Factory::create('en');
    }
}
