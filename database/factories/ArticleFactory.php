<?php

namespace Database\Factories;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'slug' => Str::slug($this->faker->unique()->word),
            'title' => $this->faker->sentence,
            'writer_id' => $this->faker->numberBetween(1,2),
            'text_content' => $this->faker->paragraph,
            'image' => $this->faker->imageUrl(),
        ];
    }

}
