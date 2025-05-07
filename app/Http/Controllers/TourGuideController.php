<?php

namespace App\Http\Controllers;

use App\Models\TourGuide;
use Illuminate\Http\Request;

class TourGuideController extends Controller
{
    // عرض جميع المرشدين
    public function index()
    {
        $guides = TourGuide::withCount('reviews')
            ->orderBy('rating', 'desc')
            ->paginate(12);

        return view('tour-guides.index', compact('guides'));
    }

    // عرض الملف الشخصي للمرشد
    public function show(TourGuide $tourGuide)
    {
        return view('tour-guides.show', [
            'guide' => $tourGuide->load(['reviews.user', 'travelPackages'])
        ]);
    }
}