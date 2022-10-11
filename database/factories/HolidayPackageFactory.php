<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HolidayPackage>
 */
class HolidayPackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'destination' => fake()->city(),
            'amount_per_day' => fake()->numberBetween(10, 50),
            'expires_on' => fake()->date()
        ];
    }
}
