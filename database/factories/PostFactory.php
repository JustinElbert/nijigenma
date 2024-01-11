<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
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
            'title' => $this->faker->sentence(mt_rand(2, 8)),
            'slug' => $this->faker->slug(),
            'excerpt' => $this->faker->paragraph(mt_rand(1,2)),
            'body' => $this->faker->paragraph(mt_rand(2,5)),
            'src' => $this->faker->imageUrl(), // Image Dummy Faker
            // 'src' => "https://source.unsplash.com/1200x800/?japan", //unsplash API
            // 'src' => "assets/nijigenmaLogo.png", // Img Source dari asset
            'user_id' => mt_rand(1, 3),
            'category_id' => mt_rand(1, 3)
        ];
    }
}
