<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $base = $this->faker->randomFloat(2, 100, 1000);
        $igv = $base * 0.18;
        $total = $base + $igv;

        return [
            'serie' => $this->faker->randomElement(['F001', 'B001']),
            'base' => $base,
            'igv' => $igv,
            'total' => $total,
            'user_id' => User::all()->random()->id,
            // 'date' => $this->faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s'), // no es necesario formatear la fecha o lo guardará como un string
            'date' => $this->faker->dateTimeBetween('-1 year', 'now'), // se debe convertir en el modelo Invoice usando $casts
        ];
    }
}
