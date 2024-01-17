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
            'body' => $this->faker->paragraph(mt_rand(2,5)),
            'src' => "assets/postdefault.png", // Image Dummy Faker
            'price' => 100000,
            'user_id' => mt_rand(1, 3),
            'category_id' => mt_rand(1, 3)
        ];
    }
}
// 'src' => "https://source.unsplash.com/1200x800/?japan", //unsplash API
// 'src' => "assets/nijigenmaLogo.png", // Img Source dari asset