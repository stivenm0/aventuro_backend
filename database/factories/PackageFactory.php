<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Package>
 */
class PackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $images = [
            '1.jpg',
            '2.jpg',
            '3.jpg',
            '4.jpg',
            '5.jpg',
            '6.jpg',
            '7.jpg',
            '8.jpg',
            '9.jpg',
        ];

        return [
            'category_id'=> Category::inRandomOrder()->pluck('id')->first(),
            'title' => fake()->sentence(2),
            'description' => fake()->paragraph(),
            'slug' => fake()->unique()->slug(),
            'image' => $images[random_int(0,8)],
            'price' => fake()->randomFloat(2, 2000, 20000),
            'destination' => fake()->country(). ' ' .fake()->city(),
            'duration' => fake()->numberBetween(1, 30),
        ];
    }
}
