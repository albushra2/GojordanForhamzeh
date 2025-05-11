<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\TourGuide;

class TourGuidesTableSeeder extends Seeder
{
    public function run()
    {
        $guides = [
            [
                'id' => 1,
                'name' => 'Mohammad Al-Zoubi',
                'email' => 'mohammad@example.com',
                'password' => Hash::make('password123'),
                'phone' => '0791234567',
                'specialization' => 'Religious Tourism',
                'bio' => 'Tour guide specialized in religious sites such as Al-Maghtas and Mount Nebo.',
                'languages' => 'Arabic, English',
                'rating' => 4.8,
                'reviews_count' => 120,
                'avatar' => 'guides/mohammad.jpg',
            ],
            [
                'id' => 2,
                'name' => 'Layla Al-Nimr',
                'email' => 'layla@example.com',
                'password' => Hash::make('password123'),
                'phone' => '0786543210',
                'specialization' => 'Historical Tourism',
                'bio' => 'Guided groups in Petra and Jerash for over 5 years.',
                'languages' => 'Arabic, English, French',
                'rating' => 4.9,
                'reviews_count' => 85,
                'avatar' => 'guides/layla.jpg',
            ],
            [
                'id' => 3,
                'name' => 'Khaled Omar',
                'email' => 'khaled@example.com',
                'password' => Hash::make('password123'),
                'phone' => '0779998888',
                'specialization' => 'Adventure Tourism',
                'bio' => 'Expert in organizing camping and hiking trips in Wadi Rum.',
                'languages' => 'Arabic, English',
                'rating' => 4.7,
                'reviews_count' => 60,
                'avatar' => 'guides/khaled.jpg',
            ],
        ];
        

        foreach ($guides as $guide) {
            TourGuide::create($guide);
        }
    }
}
