<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Note>
 */
class noteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {


        return [
            'title' => fake()->text(32),
            'summary' => fake()->text(64),
            'content' => fake()->text(200),
            'author' => random_int(1, 10)
        ];
    }
}
