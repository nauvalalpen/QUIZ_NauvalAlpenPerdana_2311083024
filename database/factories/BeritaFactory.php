<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BeritaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(6),
            'content' => fake()->paragraphs(3, true),
            'photo' => 'photos/sample.jpg',
            'author' => fake()->name(),
            'user_id' => User::factory(),
        ];
    }
}
