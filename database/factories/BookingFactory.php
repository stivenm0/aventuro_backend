<?php

namespace Database\Factories;

use App\Models\Package;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'user_id' => User::inRandomOrder()->pluck('id')->first(),
            'package_id' => Package::inRandomOrder()->pluck('id')->first(),
            'travel_date' => now()->addMonth(),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'email' => fake()->email(),
            'quantity' => fake()->numberBetween(1, 30),
            'total' => fake()->randomFloat(2, 1000, 1000)
        ];
    }
}
