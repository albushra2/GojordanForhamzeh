<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TravelPackage;

class TravelPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create a few example travel packages
        TravelPackage::create([
            'type' => 'Adventure',
            'slug' => 'adventure-package',
            'location' => 'Mountains of Nepal',
            'price' => 1500,
            'description' => 'A thrilling adventure package exploring the stunning mountains of Nepal. Includes trekking and camping.',
        ]);

        TravelPackage::create([
            'type' => 'Luxury',
            'slug' => 'luxury-package',
            'location' => 'Maldives',
            'price' => 5000,
            'description' => 'A luxurious stay at a 5-star resort in the Maldives, including private villas, fine dining, and exclusive excursions.',
        ]);

        TravelPackage::create([
            'type' => 'Beach',
            'slug' => 'beach-package',
            'location' => 'Bora Bora',
            'price' => 3500,
            'description' => 'Relax on the beautiful beaches of Bora Bora with a full-package holiday experience including water sports and beachside relaxation.',
        ]);

        TravelPackage::create([
            'type' => 'Cultural',
            'slug' => 'cultural-package',
            'location' => 'Kyoto, Japan',
            'price' => 2500,
            'description' => 'Immerse yourself in the rich culture of Japan with a tour through historic Kyoto, including visits to temples and traditional tea ceremonies.',
        ]);

        TravelPackage::create([
            'type' => 'Romantic',
            'slug' => 'romantic-package',
            'location' => 'Paris, France',
            'price' => 4000,
            'description' => 'Experience the romance of Paris with a guided tour of the city’s iconic landmarks, candlelit dinners, and romantic river cruises.',
        ]);
    }
}
