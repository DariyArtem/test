<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "title" => $this->faker->sentence(rand(1, 3), true),
            "img_path" => 'img/book.jpg',
            "category_id" => $this->faker->numberBetween(1, 12),
            "description" => $this->faker->text(rand(155, 250)),
            "price" => $this->faker->randomFloat(1, 3, 30),
            "author" => $this->faker->name(),
        ];
    }
}
