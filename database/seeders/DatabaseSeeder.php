<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Diary;
use App\Models\Review;
use App\Models\TourGuide;
use App\Models\TravelPackage;
use App\Models\Booking;
use App\Models\Gallery;
use App\Models\ContactRequest;
use App\Models\Category;
use App\Models\Blog;
use App\Models\DiaryImage;


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
            UsersTableSeeder::class,   
            CategoryTableSeeder::class,        // Adding CategorySeeder
            BlogsTableSeeder::class, 
            TourGuidesTableSeeder::class,           // Adding BlogSeeder
            TravelPackagesTableSeeder::class,   // Adding TravelPackageSeeder
            BookingsTableSeeder::class,         // Adding BookingSeeder
                    // Adding GallerySeeder
            DiariesTableSeeder::class,           // Adding DiarySeeder
            ReviewsTableSeeder::class,          // Adding ReviewSeeder
            DiaryImagesTableSeeder::class,      // Adding DiaryImageSeeder
            ContactRequestsTableSeeder::class, 
            GalleriesTableSeeder::class, // Adding ContactRequestSeeder
                  // Adding TourGuideSeeder
        ]);
    }
}
