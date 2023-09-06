<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = fake()->randomElement($array = ['published', 'draft', 'pending']);
        return [
            'title' => fake()->sentence(),
            'author_id' => fake()->randomDigit(),
            'category_id' => fake()->randomDigit(),
            'seo_title' => fake()->sentence(),
            'excerpt' => fake()->paragraph(1),
            'body' => fake()->paragraph(10),
            'image' => fake()->imageUrl(),
            'slug' => fake()->realtext(100),     
            'meta_description' => fake()->realText(100),
            'meta_keywords' => fake()->realText(10),
            'status' => $status,
            'featured' => fake()->boolean(),
            'created_at' =>  now(),
        ];
    }
}
