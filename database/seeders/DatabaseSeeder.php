<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => 'password',
            'role' => 'admin    '
        ]);

        \App\Models\User::create([
            'name' => 'user',
            'email' => 'user@mail.com',
            'password' => 'password',
            'role' => 'user'
        ]);

        Category::create([
            'name' => 'Category 1'
        ]);
        Category::create([
            'name' => 'Category 2'
        ]);
        Category::create([
            'name' => 'Category 3'
        ]);
        Category::create([
            'name' => 'Category 4'
        ]);
        Category::create([
            'name' => 'Category 5'
        ]);
        Category::create([
            'name' => 'Category 6'
        ]);

        Blog::factory(5)->create();
        
        
    }
}
