<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fermentacion>
 */
class FermentacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cantidadEntrada' => $this->faker->numberBetween(0, 100),
            'cantidadLevadura' => $this->faker->numberBetween(0, 100),
            'temperatura' => $this->faker->randomFloat(2, 0, 100),
        ];
    }
}
