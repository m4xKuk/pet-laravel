<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
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
            'title' => $this->faker->words(rand(1, 5), true),
            'description' => $this->faker->sentence(2),
            'preview_image' => fake()->imageUrl(),
            'main_image' => fake()->imageUrl(),
            'author_id' => User::get()->random()->id,
        ];
    }
}
