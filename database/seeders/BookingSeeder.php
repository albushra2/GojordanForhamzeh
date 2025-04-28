<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Booking;
use App\Models\TravelPackage;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Fetch some travel packages to associate bookings with
        $adventurePackage = TravelPackage::where('slug', 'adventure-package')->first();
        $luxuryPackage = TravelPackage::where('slug', 'luxury-package')->first();
        $beachPackage = TravelPackage::where('slug', 'beach-package')->first();

        // Create bookings
        Booking::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'number_phone' => '1234567890',
            'date' => '2025-06-15',
            'travel_package_id' => $adventurePackage->id, // Assigning the Adventure package
        ]);

        Booking::create([
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'number_phone' => '0987654321',
            'date' => '2025-07-10',
            'travel_package_id' => $luxuryPackage->id, // Assigning the Luxury package
        ]);

        Booking::create([
            'name' => 'Bob Brown',
            'email' => 'bob@example.com',
            'number_phone' => '1122334455',
            'date' => '2025-08-20',
            'travel_package_id' => $beachPackage->id, // Assigning the Beach package
        ]);
    }
}
