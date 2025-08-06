<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trips>
 */
class TripsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'title' =>fake()->sentence(5),
           'country' =>fake()->word(),
           'description' =>fake()->paragraph(),
           'flight' =>fake()->word(),
           'hotel' =>fake()->sentence(3),
           'duration' =>fake()->numberBetween(1,7),
           'price' =>fake()->numberBetween(300,600),
           'image' =>fake()->imageUrl()
        ];
    }
}
