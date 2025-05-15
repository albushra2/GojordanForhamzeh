<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TravelPackage;
use App\Models\Category;
use App\Models\TourGuide;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class TravelPackageController extends Controller
{
    public function index()
    {
        $packages = TravelPackage::with(['category', 'tourGuide','galleries'])
                        ->withCount(['galleries'])
                        ->latest()
                        ->paginate(10);
        
        return view('admin.travel_packages.index', compact('packages'));
    }

    public function create()
    {
        $categories = Category::all();
        $guides = TourGuide::all();
        return view('admin.travel_packages.create', compact('categories', 'guides'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'tour_guide_id' => 'nullable|exists:tour_guides,id',
            'type' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'duration_days' => 'required|integer|min:1',
            'description' => 'required|string',
            'itinerary' => 'nullable|string',
            'included' => 'nullable|string',
            'excluded' => 'nullable|string',
            'featured_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->file('featured_image')->store('travel-packages', 'public');

        TravelPackage::create([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']),
            'category_id' => $validated['category_id'],
            'tour_guide_id' => $validated['tour_guide_id'],
            'type' => $validated['type'],
            'location' => $validated['location'],
            'price' => $validated['price'],
            'duration_days' => $validated['duration_days'],
            'description' => $validated['description'],
            'itinerary' => $validated['itinerary'],
            'included' => $validated['included'],
            'excluded' => $validated['excluded'],
            'featured_image' => $imagePath,
        ]);

        return redirect()->route('admin.travel_packages.index')->with('success', 'Travel package created successfully!');
    }

    public function edit(TravelPackage $travelPackage)
{
    $categories = Category::all();
    $guides = TourGuide::all();
    $travelPackage->load(['category', 'tourGuide']);
    return view('admin.travel_packages.edit', compact('travelPackage', 'categories', 'guides'));
}

    public function update(Request $request, TravelPackage $travelPackage)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'tour_guide_id' => 'nullable|exists:tour_guides,id',
            'type' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'duration_days' => 'required|integer|min:1',
            'description' => 'required|string',
            'itinerary' => 'nullable|string',
            'included' => 'nullable|string',
            'excluded' => 'nullable|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('featured_image')) {
            // Delete old image
            if ($travelPackage->featured_image) {
                Storage::disk('public')->delete($travelPackage->featured_image);
            }
            
            // Store new image
            $imagePath = $request->file('featured_image')->store('travel-packages', 'public');

            $validated['featured_image'] = $imagePath;
        }

    $travelPackage->update($validated); 

        return redirect()->route('admin.travel_packages.index')->with('success', 'Travel package updated successfully!');
    }

    public function destroy(TravelPackage $travelPackage)
    {
        $travelPackage->delete();
        return redirect()->route('admin.travel_packages.index')->with('success', 'Travel package archived successfully!');
    }
    public function restore($id)
{
    $package = TravelPackage::withTrashed()->findOrFail($id);
    $package->restore();
    
    return back()->with('success', 'Package restored successfully!');
}
}