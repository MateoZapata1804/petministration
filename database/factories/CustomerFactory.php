<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'documento_id' => strval(rand(100,1000)),
            'nombre1' => fake()->name(),
            'nombre2' => fake()->name(),
            'apellido1' => fake()->lastName(),
            'apellido2' => fake()->lastName(),
            'celular' => fake()->phoneNumber(),
            'email' => fake()->email()
        ];
    }
}
