<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    // إضافة تقييم
    public function store(Request $request)
    {
        $validated = $request->validate([
            'content' => 'required|string|max:1000',
            'rating' => 'required|integer|between:1,5',
            'reviewable_id' => 'required',
            'reviewable_type' => 'required|in:travel_packages,tour_guides'
        ]);

        $review = auth()->user()->reviews()->create($validated);

        // تحديث التقييم العام
        $reviewable = $review->reviewable;
        $reviewable->updateRating();

        return back()->with('success', 'شكراً لتقييمك!');
    }
}