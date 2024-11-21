<?php

namespace Database\Factories\Kesiswaan;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kesiswaan\Prestasi>
 */
class PrestasiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name, // Menghasilkan nama acak
            'tingkat' => $this->faker->word, // Menghasilkan kata acak untuk tingkat (misalnya: Nasional, Provinsi)
            'juara' => $this->faker->randomElement(['1', '2', '3']), // Menghasilkan angka acak 1, 2, atau 3
            'penyelenggara' => $this->faker->company, // Menghasilkan nama perusahaan atau penyelenggara
        ];
    }
}
