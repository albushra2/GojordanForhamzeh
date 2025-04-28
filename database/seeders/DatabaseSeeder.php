<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Call the seeders to populate the database
        $this->call([
            AdminSeeder::class,
            CategorySeeder::class,  // Adding CategorySeeder
            BlogSeeder::class,      // Adding BlogSeeder
            TravelPackageSeeder::class, // Adding TravelPackageSeeder
            BookingSeeder::class,   // Adding BookingSeeder
            GallerySeeder::class,  
            UserSeeder::class, // Adding GallerySeeder
        ]);
    }
}
