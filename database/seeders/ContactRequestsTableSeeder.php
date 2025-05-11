<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\ContactRequest;

class ContactRequestsTableSeeder extends Seeder
{
    public function run()
    {
        $contactRequests = [
            [
                'name' => 'Ahmed Al-Faouri',
                'email' => 'ahmed@example.com',
                'phone' => '0791234567',
                'subject' => 'Inquiry about a travel package',
                'message' => 'I would like to know more about the cultural tourism package in Amman.',
                'status' => 'unread',
                'response' => null,
                'user_id' => null, // If the user is not registered in the system
            ],
            [
                'name' => 'Mariam Khaled',
                'email' => 'mariam@example.com',
                'phone' => '0799876543',
                'subject' => 'Booking issue',
                'message' => 'I encountered an issue confirming my booking, please help.',
                'status' => 'read',
                'response' => 'Your booking has been successfully confirmed. Thank you for contacting us.',
                'user_id' => 2, // If the user exists in the system
            ],
            [
                'name' => 'Razan Ali',
                'email' => 'razan@example.com',
                'phone' => '0793456789',
                'subject' => 'Request to modify booking',
                'message' => 'I would like to reschedule my booking. Please contact me.',
                'status' => 'replied',
                'response' => 'Your booking dates have been modified as requested.',
                'user_id' => 3, // If the user exists in the system
            ],
        ];
        

        foreach ($contactRequests as $contactRequest) {
            ContactRequest::create($contactRequest);
        }
    }
}
