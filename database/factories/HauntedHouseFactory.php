<?php

namespace Database\Factories;

use App\Models\HauntedHouse;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<HauntedHouse>
 */
class HauntedHouseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'Villa '.$this->faker->lastName(),
            'location' => $this->faker->city().', '.$this->faker->country(),
            'price_per_night' => $this->faker->randomFloat(2, 90, 700),
            'description' => $this->faker->sentence(18),
            'image_url' => null,
            'is_recommended' => false,
        ];
    }

    public function recommended(): static
    {
        return $this->state(fn (array $attributes): array => [
            'is_recommended' => true,
        ]);
    }
}
