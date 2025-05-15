<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Blog;
use App\Models\TravelPackage;
use App\Models\User;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

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
        $activities = collect();

        // الحجوزات الجديدة
        $bookings = Booking::with(['user', 'travelPackage'])
            ->latest()
            ->limit(5)
            ->get()
            ->map(function ($booking) {
                return [
                    'type' => 'booking',
                    'title' => 'New Booking: ' . $booking->travelPackage->title,
                    'description' => 'By ' . $booking->user->name . ' • ' . $booking->total_guests . ' guests',
                    'time' => $booking->created_at,
                    'icon' => 'fa-calendar-check',
                    'color' => 'primary'
                ];
            });

        // المستخدمين الجدد
        $users = User::where('is_admin', false)
            ->latest()
            ->limit(5)
            ->get()
            ->map(function ($user) {
                return [
                    'type' => 'user',
                    'title' => 'New User Registered',
                    'description' => $user->name . ' • ' . $user->email,
                    'time' => $user->created_at,
                    'icon' => 'fa-user-plus',
                    'color' => 'success'
                ];
            });

        // المدونات الجديدة
        $blogs = Blog::with('user')
            ->latest()
            ->limit(5)
            ->get()
            ->map(function ($blog) {
                return [
                    'type' => 'blog',
                    'title' => 'New Blog: ' . $blog->title,
                    'description' => 'By ' . $blog->user->name,
                    'time' => $blog->created_at,
                    'icon' => 'fa-blog',
                    'color' => 'info'
                ];
            });

        // التقييمات الجديدة
        $reviews = Review::with(['user', 'reviewable'])
            ->latest()
            ->limit(5)
            ->get()
            ->map(function ($review) {
                $type = match (get_class($review->reviewable)) {
                    'App\Models\TravelPackage' => 'Package',
                    'App\Models\TourGuide' => 'Guide',
                    default => 'Item'
                };

                return [
                    'type' => 'review',
                    'title' => 'New Review (' . $review->rating . '/5)',
                    'description' => 'For ' . $type . ': ' . $review->reviewable->title,
                    'time' => $review->created_at,
                    'icon' => 'fa-star',
                    'color' => 'warning'
                ];
            });

        // دمج جميع النشاطات وترتيبها
        return $activities->merge($bookings)
            ->merge($users)
            ->merge($blogs)
            ->merge($reviews)
            ->sortByDesc('time')
            ->take(10)
            ->values()
            ->map(function ($item) {
                $item['time'] = Carbon::parse($item['time'])->diffForHumans();
                return $item;
            });
    }
}