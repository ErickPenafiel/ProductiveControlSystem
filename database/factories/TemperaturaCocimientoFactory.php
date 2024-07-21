<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TemperaturaCocimiento>
 */
class TemperaturaCocimientoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'temperatura' => $this->faker->randomFloat(2, 0, 100),
            'cocimiento_id' => $this->faker->numberBetween(1, 10),
            'fecha' => $this->faker->date(),
            'hora' => $this->faker->time()
        ];
    }
}
