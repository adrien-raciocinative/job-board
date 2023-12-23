<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobApplication>
 */
class JobApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Full_Name' => fake()->name(),
            'expected_salary' => fake()->numberBetween(4_000, 170_000),
            'Years_of_Experience' => fake()->numberBetween(0, 30),
            'Email_address' => fake()->unique()->safeEmail(),
            'Phone_number' => fake()->phoneNumber(),
            'Resume' => fake()->url(),
        ];
    }
}
