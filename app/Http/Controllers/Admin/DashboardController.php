<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Blog;
use App\Models\TravelPackage;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'bookings' => Booking::count(),
            'travel_packages' => TravelPackage::count(),
            'blogs' => Blog::count(),
            'users' => User::where('is_admin', false)->count(),
            'recent_bookings' => Booking::with('travelPackage', 'user')
                                    ->latest()
                                    ->take(5)
                                    ->get(),
                                    'recent_activity' => $this->getRecentActivity()
        ];

        return view('admin.dashboard', compact('stats'));
    }
    
    private function getRecentActivity()
{
    return [
        [
            'type' => 'booking',
            'title' => 'New Booking',
            'description' => 'Jordan Explorer package booked by John Doe',
            'time' => '2 hours ago'
        ],
        [
            'type' => 'user',
            'title' => 'New User',
            'description' => 'Sarah Johnson registered as new user',
            'time' => '5 hours ago'
        ],
        [
            'type' => 'blog',
            'title' => 'Blog Published',
            'description' => 'New post "Top 10 Petra Secrets" published',
            'time' => '1 day ago'
        ],
        [
            'type' => 'booking',
            'title' => 'Booking Cancelled',
            'description' => 'Dead Sea package cancelled by Michael Brown',
            'time' => '2 days ago'
        ]
    ];
}

    
}