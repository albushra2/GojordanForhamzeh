<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\TravelPackage;

class TravelPackagesTableSeeder extends Seeder
{
    public function run()
{
    $packages = [
        [
            'title' => 'Trip to Petra',
            'type' => 'Historical',
            'location' => 'Petra, Ma\'an',
            'price' => 50,
            'duration_days' => 1,
            'description' => 'Enjoy visiting the Rose City of Petra, one of the Seven Wonders of the World.',
            'itinerary' => 'Morning arrival - Walking tour in the Siq - Visit the Treasury - Lunch - Return.',
            'included' => 'Transportation, entrance tickets, lunch, tour guide.',
            'excluded' => 'Personal expenses.',
            'featured_image' => 'travel-packages/wadi-rum.jpeg',
            'category_id' => 3,
            'tour_guide_id' => 2,
        ],
        [
            'title' => 'Adventure in Wadi Rum',
            'type' => 'Adventure',
            'location' => 'Wadi Rum, Aqaba',
            'price' => 70,
            'duration_days' => 2,
            'description' => 'A magical experience in the Wadi Rum desert with camping under the stars.',
            'itinerary' => '4x4 jeep tour - Camping - Stargazing - Breakfast and return.',
            'included' => 'Transportation, dinner and breakfast, tour guide, camping.',
            'excluded' => 'Camel riding (optional).',
            'featured_image' => 'travel-packages/wadi-rum.jpeg',
            'category_id' => 4,
            'tour_guide_id' => 3,
        ],
        [
            'title' => 'Religious Tour to Al-Maghtas',
            'type' => 'Religious',
            'location' => 'Al-Maghtas, Dead Sea',
            'price' => 30,
            'duration_days' => 1,
            'description' => 'Visit the baptism site of Jesus Christ and explore important religious landmarks.',
            'itinerary' => 'Arrival - Site tour - Visit churches - Lunch - Return.',
            'included' => 'Transportation, entrance tickets, tour guide.',
            'excluded' => 'Private meals.',
            'featured_image' => 'travel-packages/al-maghtas.jpeg',
            'category_id' => 1,
            'tour_guide_id' => 1,
        ],
    ];

    foreach ($packages as $package) {
        TravelPackage::create([
            'title' => $package['title'],
            'slug' => Str::slug($package['title']),
            'type' => $package['type'],
            'location' => $package['location'],
            'price' => $package['price'],
            'duration_days' => $package['duration_days'],
            'description' => $package['description'],
            'itinerary' => $package['itinerary'],
            'included' => $package['included'],
            'excluded' => $package['excluded'],
            'featured_image' => $package['featured_image'], // Add this line
            'category_id' => $package['category_id'],
            'tour_guide_id' => $package['tour_guide_id'],
            'average_rating' => 0,
            'reviews_count' => 0,
        ]);
    }
}
}
