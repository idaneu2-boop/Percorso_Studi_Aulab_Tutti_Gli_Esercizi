<?php

namespace Database\Factories;

use App\Models\Announcement;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Announcement>
 */
class AnnouncementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'reporter_name' => fake()->name(),
            'reporter_email' => fake()->safeEmail(),
            'title' => fake()->sentence(6),
            'category' => fake()->randomElement(['Gameplay', 'Mappa', 'Veicoli', 'Personaggi', 'Online']),
            'location' => fake()->randomElement(['Vice Beach', 'Port Gellhorn', 'Downtown Vice City', 'Leonida Keys']),
            'credibility' => fake()->numberBetween(1, 5),
            'is_spoiler' => fake()->boolean(30),
            'body' => fake()->paragraphs(3, true),
            'image_path' => null,
        ];
    }
}
