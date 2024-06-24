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
        return [
            'category_id'=> Category::inRandomOrder()->pluck('id')->first(),
            'title' => fake()->sentence(2),
            'description' => fake()->paragraph(),
            'slug' => fake()->unique()->slug(),
            'image' => fake()->imageUrl(640, 480, 'travel', true),
            'price' => fake()->randomFloat(2, 100, 10000),
            'destination' => fake()->country(). ' ' .fake()->city(),
            'duration' => fake()->numberBetween(1, 30),
        ];
    }
}
