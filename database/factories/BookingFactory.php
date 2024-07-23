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

        $package =  Package::inRandomOrder()->first();
        $quantity = fake()->numberBetween(1, 30);

        $status = [
            'Pending',
            'Cancelled',
            'Payed',
        ];
        return [
            'user_id' => User::inRandomOrder()->pluck('id')->first(),
            'package_id' => $package->id,
            'travel_date' => now()->addMonth()->addDays(rand(1, 28)),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'status' => $status[rand(0,2)],
            'quantity' => $quantity,
            'total' => $package->price * $quantity
        ];
    }
}
