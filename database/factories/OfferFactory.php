<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Offer>
 */
class OfferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $startDate = now();
        $endDate = now()->addMonth();

        // Generar fecha de inicio dentro del rango
        $fechaInicio = fake()->dateTimeBetween($startDate, $endDate);

        // Generar fecha de fin posterior a la fecha de inicio
        $fechaFin = fake()->dateTimeBetween($fechaInicio, $fechaInicio->format('Y-m-d H:i:s').' +10 days');

        return [
            'discount' => random_int(5, 80),
            'start_date' => $fechaInicio,
            'end_date' => $fechaFin,
        ];
    }
}
