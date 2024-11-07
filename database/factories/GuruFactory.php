<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Guru>
 */
class GuruFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'nama' => $this->faker->name,               // Menggunakan faker untuk menghasilkan nama
            'tugas' => $this->faker->sentence,          // Menghasilkan kalimat untuk tugas
            'photo' => $this->faker->imageUrl(640, 480, 'people', true), // Menghasilkan URL gambar palsu
        ];
    }
}
