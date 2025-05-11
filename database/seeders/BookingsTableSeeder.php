<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Booking;
use Carbon\Carbon;

class BookingsTableSeeder extends Seeder
{
    public function run()
    {
        $bookings = [
            [
                'user_id' => 1, // Make sure ID=1 exists in the users table
                'travel_package_id' => 1, // Make sure ID=1 exists in the travel_packages table
                'phone' => '0791234567',
                'start_date' => Carbon::create('2025', '06', '01'),
                'end_date' => Carbon::create('2025', '06', '05'),
                'total_guests' => 2,
                'children_count' => 1,
                'special_requests' => 'Provide a baby bed',
                'terms_agreed' => true,
                'group_type' => 'family',
                'status' => 'confirmed',
                'is_reviewed' => false,
            ],
            [
                'user_id' => 2, // Make sure ID=2 exists in the users table
                'travel_package_id' => 2, // Make sure ID=2 exists in the travel_packages table
                'phone' => '0799876543',
                'start_date' => Carbon::create('2025', '07', '15'),
                'end_date' => Carbon::create('2025', '07', '20'),
                'total_guests' => 4,
                'children_count' => 2,
                'special_requests' => 'Child seats',
                'terms_agreed' => true,
                'group_type' => 'family',
                'status' => 'pending',
                'is_reviewed' => false,
            ],
            [
                'user_id' => 3, // Make sure ID=3 exists in the users table
                'travel_package_id' => 3, // Make sure ID=3 exists in the travel_packages table
                'phone' => '0793456789',
                'start_date' => Carbon::create('2025', '08', '10'),
                'end_date' => Carbon::create('2025', '08', '12'),
                'total_guests' => 1,
                'children_count' => 0,
                'special_requests' => 'None',
                'terms_agreed' => true,
                'group_type' => 'individual',
                'status' => 'cancelled',
                'is_reviewed' => false,
            ],
        ];
        
        foreach ($bookings as $booking) {
            Booking::create($booking);
        }
    }
}
