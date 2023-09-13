<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
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
        $title = fake()->sentence();
        return [
            'title' => $title,
            'author_id' => User::all()->random()->id,
            'category_id' => Category::all()->random()->id,
            'seo_title' => fake()->sentence(),
            'excerpt' => fake()->paragraph(1),
            'body' => fake()->paragraph(10),
            'image' => fake()->imageUrl(),
            'slug' => fake()->slug($title),     
            // 'meta_description' => fake()->realText(100),
            // 'meta_keywords' => fake()->realText(10),
            'status' => $status,
            'featured' => fake()->boolean(),
            'created_at' =>  now(),
        ];
    }
}
