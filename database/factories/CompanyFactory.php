<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            "logo" => "logos\P0huf9Cn4ajS5Oz5QN9IzMyAJCY3nvmYpHhEbhfL.webp",
            'email' => fake()->unique()->safeEmail(),
            'website' => "https://www." . fake()->word() . ".com",
        ];
    }
}
