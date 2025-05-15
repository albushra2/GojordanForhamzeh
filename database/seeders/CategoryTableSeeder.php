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
                'image' => 'categories/ajlon.jpeg',
            ],
            [
                'name' => 'Cultural Tourism',
                'description' => 'Exploring cultural heritage, festivals, and traditional music.',
                'image' => 'categories/Amman.jpeg',
            ],
            [
                'name' => 'Historical Tourism',
                'description' => 'Visiting archaeological sites such as Petra and Jerash.',
                'image' => 'categories/ Aqaba.jpeg',
            ],
            [
                'name' => 'Adventure Tourism',
                'description' => 'Activities such as camping, climbing, camel riding, and hiking trails.',
                'image' => 'categories/adventure.jpeg',
            ],
            [
                'name' => 'Medical Tourism',
                'description' => 'Visiting the Dead Sea and hot springs for relaxation and therapy purposes.',
                'image' => 'categories/medical.jpeg',
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
