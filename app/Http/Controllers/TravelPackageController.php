<?php

namespace App\Http\Controllers;

use App\Models\TravelPackage;
use App\Models\Category;
use Illuminate\Http\Request;

class TravelPackageController extends Controller
{
    // عرض جميع الحزم السياحية
    public function index()
    {
        $packages = TravelPackage::with(['category', 'galleries', 'tourGuide'])
            ->filter(request(['category', 'type', 'search']))
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        $categories = Category::withCount('travelPackages')->get();

        return view('travel_packages.index', compact('packages', 'categories'));
    }

    // عرض الحزم المميزة
    public function featured()
    {
        $featured = TravelPackage::where('is_featured', true)
            ->with(['galleries', 'tourGuide'])
            ->take(8)
            ->get();

        return view('travel_packages.featured', compact('featured'));
    }

    // عرض تفاصيل الحزمة
    public function show(TravelPackage $travelPackage)
    {
        $related = TravelPackage::where('category_id', $travelPackage->category_id)
            ->where('id', '!=', $travelPackage->id)
            ->with(['galleries'])
            ->take(4)
            ->get();

        return view('travel_packages.show', [
            'package' => $travelPackage->load(['galleries', 'tourGuide', 'reviews.user']),
            'related' => $related
        ]);
    }
}