<?php

namespace Database\Factories\Profil;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profil\Waka>
 */
class WakaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name,
             'jabatan' => implode(' ', $this->faker->words(rand(1, 8))),
             'photo' => ""
        ];
    }
}
