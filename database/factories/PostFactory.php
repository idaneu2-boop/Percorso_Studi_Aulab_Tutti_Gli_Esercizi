<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title' => fake()->sentence(5),
            'excerpt' => fake()->paragraph(),
            'body' => fake()->paragraphs(3, true),
            'source_url' => fake()->optional()->url(),
            'published_at' => fake()->dateTimeBetween('-2 months', 'now'),
        ];
    }
}
