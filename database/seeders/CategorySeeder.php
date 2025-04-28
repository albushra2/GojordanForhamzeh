<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create categories
        Category::create([
            'name' => 'Technology',
            'slug' => 'technology',
        ]);

        Category::create([
            'name' => 'Lifestyle',
            'slug' => 'lifestyle',
        ]);

        Category::create([
            'name' => 'Education',
            'slug' => 'education',
        ]);

        Category::create([
            'name' => 'Health',
            'slug' => 'health',
        ]);

        Category::create([
            'name' => 'Business',
            'slug' => 'business',
        ]);
    }
}
