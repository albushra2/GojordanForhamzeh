<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Category;

class CategoryTableSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'name' => 'Religious Tourism',
                'description' => 'Visiting religious sites such as the Baptism Site and Mount Nebo.',
                'image' => 'categories/religious.jpg',
            ],
            [
                'name' => 'Cultural Tourism',
                'description' => 'Exploring cultural heritage, festivals, and traditional music.',
                'image' => 'categories/cultural.jpg',
            ],
            [
                'name' => 'Historical Tourism',
                'description' => 'Visiting archaeological sites such as Petra and Jerash.',
                'image' => 'categories/historical.jpg',
            ],
            [
                'name' => 'Adventure Tourism',
                'description' => 'Activities such as camping, climbing, camel riding, and hiking trails.',
                'image' => 'categories/adventure.jpg',
            ],
            [
                'name' => 'Medical Tourism',
                'description' => 'Visiting the Dead Sea and hot springs for relaxation and therapy purposes.',
                'image' => 'categories/medical.jpg',
            ],
        ];
        
        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'slug' => Str::slug($category['name'], '-'),
                'description' => $category['description'],
                'image' => $category['image'],
            ]);
        }
    }
}
