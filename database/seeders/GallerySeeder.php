<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gallery;
use App\Models\TravelPackage;

class GallerySeeder extends Seeder
{
    public function run()
    {
        $adventurePackage = TravelPackage::where('slug', 'adventure-package')->first();
        $luxuryPackage = TravelPackage::where('slug', 'luxury-package')->first();
        $beachPackage = TravelPackage::where('slug', 'beach-package')->first();

        Gallery::create([
            'name' => 'Adventure Gallery 1',
            'images' => 'images/AlSalt.jpeg', // صورة واحدة فقط
            'travel_package_id' => $adventurePackage->id,
        ]);

        Gallery::create([
            'name' => 'Luxury Resort Gallery',
            'images' => 'images/AlSalt.jpeg',
            'travel_package_id' => $luxuryPackage->id,
        ]);

        Gallery::create([
            'name' => 'Beach Vacation Gallery',
            'images' => 'images/AlSalt.jpeg',
            'travel_package_id' => $beachPackage->id,
        ]);
    }
}
