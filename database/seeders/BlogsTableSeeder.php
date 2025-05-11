<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Blog;

class BlogsTableSeeder extends Seeder
{
    public function run()
    {
        $blogs = [
            [
                'title' => 'Top Tourist Destinations in Jordan',
                'slug' => Str::slug('Top Tourist Destinations in Jordan'),
                'excerpt' => 'Discover the top tourist attractions in Jordan from the Dead Sea to Petra.',
                'image' => 'app/public/images/ajlon.jpeg',
                'description' => 'Jordan is a unique tourist destination that combines history, culture, and adventure.',
                'reads' => 120,
                'category_id' => 1, // Make sure ID=1 exists in the categories table (e.g., Cultural Tourism)
                'user_id' => 1, // Make sure ID=1 exists in the users table (e.g., first writer)
            ],
            [
                'title' => 'Journey to Petra',
                'slug' => Str::slug('Journey to Petra'),
                'excerpt' => 'Petra is one of the Seven Wonders of the World. Learn about its top landmarks and places to visit.',
                'image' => 'blogs/petra-journey.jpg',
                'description' => 'Petra is a historical city located in southern Jordan and is considered one of the Seven Wonders of the World.',
                'reads' => 85,
                'category_id' => 2, // Make sure ID=2 exists in the categories table (e.g., Historical Tourism)
                'user_id' => 2, // Make sure ID=2 exists in the users table
            ],
            [
                'title' => 'Adventure in Wadi Rum',
                'slug' => Str::slug('Adventure in Wadi Rum'),
                'excerpt' => 'Explore the adventures of Wadi Rum, the land of history and thrill.',
                'image' => 'blogs/wadi-rum-adventure.jpg',
                'description' => 'Wadi Rum is a place where tourists can explore stunning desert landscapes and camp in the heart of the desert.',
                'reads' => 60,
                'category_id' => 3, // Make sure ID=3 exists in the categories table (e.g., Adventure Tourism)
                'user_id' => 3, // Make sure ID=3 exists in the users table
            ],
        ];
        

        foreach ($blogs as $blog) {
            Blog::create($blog);
        }
    }
}
