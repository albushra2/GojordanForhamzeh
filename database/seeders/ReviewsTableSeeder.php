<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;

class ReviewsTableSeeder extends Seeder
{
    public function run()
    {
        $reviews = [
            [
                'content' => 'It was a wonderful experience! The tour guide was very professional and gave us valuable information about the tourist attractions.',
                'rating' => 5,
                'user_id' => 1, // Make sure ID=1 exists in the users table
                'booking_id' => 1, // Make sure ID=1 exists in the bookings table
                'reviewable_type' => 'App\Models\TourGuide', // Review for a tour guide
                'reviewable_id' => 1, // Make sure ID=1 exists in the tour_guides table
            ],
            [
                'content' => 'The trip was good, but it would have been better if more time was allocated to some activities.',
                'rating' => 4,
                'user_id' => 2, // Make sure ID=2 exists in the users table
                'booking_id' => 2, // Make sure ID=2 exists in the bookings table
                'reviewable_type' => 'App\Models\TravelPackage', // Review for a travel package
                'reviewable_id' => 2, // Make sure ID=2 exists in the travel_packages table
            ],
            [
                'content' => 'The Wadi Rum trip was amazing! The scenery was breathtaking, but I wish the trip was longer.',
                'rating' => 4,
                'user_id' => 3, // Make sure ID=3 exists in the users table
                'booking_id' => 3, // Make sure ID=3 exists in the bookings table
                'reviewable_type' => 'App\Models\TourGuide', // Review for a tour guide
                'reviewable_id' => 2, // Make sure ID=2 exists in the tour_guides table
            ],
        ];
    
        foreach ($reviews as $review) {
            \App\Models\Review::create($review);
        }
    }
    
    
}
