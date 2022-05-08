<?php

namespace Database\Factories;

use App\Models\Cake;
use Faker\Generator;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class CakeFactory extends Factory
{

    protected $model = Cake::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name('male'),
            'weight' => $this->faker->randomFloat(2, 50, 5000),
            'value' => $this->faker->randomFloat(2, 0, 20000),
            'available_quantity' => $this->faker->numberBetween(0, 100)
        ];
    }

    protected function withFaker(): Generator
    {
        return \Faker\Factory::create('en');
    }
}
