<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Diary;

class DiariesTableSeeder extends Seeder
{
    public function run()
    {
        $diaries = [
            [
                'title' => 'Trip to the Dead Sea',
                'content' => 'My trip to the Dead Sea was absolutely amazing. I enjoyed swimming in the salty water and relaxing on the beach. The atmosphere was peaceful and relaxing.',
                'user_id' => 1, // Make sure ID=1 exists in the users table
                'travel_package_id' => 1, // Make sure ID=1 exists in the travel_packages table
                'booking_id' => 1, // Make sure ID=1 exists in the bookings table
            ],
            [
                'title' => 'Exploring Petra',
                'content' => 'Petra was stunning! The magnificent architecture and breathtaking landscapes made this trip unforgettable. Our tour guide was excellent.',
                'user_id' => 2, // Make sure ID=2 exists in the users table
                'travel_package_id' => 2, // Make sure ID=2 exists in the travel_packages table
                'booking_id' => 2, // Make sure ID=2 exists in the bookings table
            ],
            [
                'title' => 'Adventure in Wadi Rum',
                'content' => 'The adventure in Wadi Rum was incredibly exciting! I rode camels and traveled across the desert. An experience not to be missed!',
                'user_id' => 3, // Make sure ID=3 exists in the users table
                'travel_package_id' => 3, // Make sure ID=3 exists in the travel_packages table
                'booking_id' => 3, // Make sure ID=3 exists in the bookings table
            ],
        ];
        
        foreach ($diaries as $diary) {
            Diary::create($diary);
        }
    }
}
