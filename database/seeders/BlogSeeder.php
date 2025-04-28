<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Blog;
use App\Models\Category;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Fetch the categories to associate blogs with
        $technologyCategory = Category::where('slug', 'technology')->first();
        $lifestyleCategory = Category::where('slug', 'lifestyle')->first();
        $healthCategory = Category::where('slug', 'health')->first();

        // Create blogs
        Blog::create([
            'title' => 'The Future of Artificial Intelligence',
            'slug' => 'future-of-ai',
            'excerpt' => 'A glimpse into how AI will shape the future of technology.',
            'image' => 'images/future-of-ai.jpg',
            'description' => 'Artificial intelligence is rapidly advancing and will play a crucial role in shaping our future. In this post, we explore how AI will influence various industries and the future of humanity.',
            'category_id' => $technologyCategory->id, // Assigning the Technology category
        ]);

        Blog::create([
            'title' => 'How to Achieve a Healthy Work-Life Balance',
            'slug' => 'healthy-work-life-balance',
            'excerpt' => 'Tips on managing your work and personal life for a better mental health.',
            'image' => 'images/work-life-balance.jpg',
            'description' => 'In today\'s fast-paced world, achieving a healthy work-life balance is essential for mental and physical well-being. Here are some practical tips for managing your work and personal life.',
            'category_id' => $lifestyleCategory->id, // Assigning the Lifestyle category
        ]);

        Blog::create([
            'title' => '10 Tips for Maintaining a Healthy Diet',
            'slug' => 'healthy-diet-tips',
            'excerpt' => 'Simple tips to help you maintain a balanced and healthy diet.',
            'image' => 'images/healthy-diet.jpg',
            'description' => 'Maintaining a healthy diet is key to living a long and healthy life. These tips will help you make smarter food choices and maintain a balanced diet.',
            'category_id' => $healthCategory->id, // Assigning the Health category
        ]);
    }
}
