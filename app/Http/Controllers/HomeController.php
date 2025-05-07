<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\TravelPackage;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Models\TourGuide;

class HomeController extends Controller
{
    public function index()
    {
        try {
            // Get featured travel packages with caching
            $travelPackages = Cache::remember('featured_travel_packages', 3600, function () {
                return TravelPackage::with(['galleries', 'category', 'tourGuide'])
                    ->where('is_featured', true)
                    ->orderByDesc('created_at')
                    ->take(8)
                    ->get();
            });

            // Get latest blogs with categories and authors
            $blogs = Cache::remember('latest_blogs', 3600, function () {
                return Blog::with(['category', 'user'])
                    ->published() // Assuming you have a published scope
                    ->orderByDesc('created_at')
                    ->take(3)
                    ->get();
            });

            // Get popular categories
            $categories = Cache::remember('popular_categories', 3600, function () {
                return Category::withCount('travelPackages')
                    ->orderByDesc('travel_packages_count')
                    ->take(6)
                    ->get();
            });

            // Get top-rated tour guides
            $tourGuides = Cache::remember('top_guides', 3600, function () {
                return TourGuide::with(['reviews', 'travelPackages'])
                    ->orderByDesc('rating')
                    ->take(4)
                    ->get();
            });

            return view('homepage', compact(
                'travelPackages',
                'blogs',
                'categories',
                'tourGuides'
            ));

        } catch (\Exception $e) {
            // Log the error and show a friendly message
            \Log::error('Homepage loading error: ' . $e->getMessage());
            return view('errors.friendly', [
                'message' => 'We are currently experiencing some technical difficulties. Please try again later.'
            ]);
        }
    }
}