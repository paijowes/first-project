<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nip' => rand(1,99999999),
            'nama' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'alamat' => '',
            'notelp' => rand(1,999999999999),
            'JenisKelamin' => 'M'
        ];
    }
}
