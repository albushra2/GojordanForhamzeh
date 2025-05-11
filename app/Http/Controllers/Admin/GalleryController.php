<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\TravelPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

// class GalleryController extends Controller
// {
//     public function index()
//     {
//         $travelPackages = TravelPackage::withCount('galleries')->get();
//         return view('admin.galleries.index', compact('travelPackages' ));
//     }

//     public function create(TravelPackage $travelPackage)
//     {
//         return view('admin.galleries.create', [
//             'travelPackage' => $travelPackage,
//             'galleries' => $travelPackage->galleries
//         ]);
//     }
    
    
    

//     public function store(Request $request, TravelPackage $travelPackage)
//     {
//         $request->validate([
//             'images' => 'required|array|min:1',
//             'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
//         ]);

//         $uploadedImages = [];
        
//         foreach ($request->file('images') as $image) {
//             $path = $image->store('galleries', 'public');
//             $name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            
//             $gallery = Gallery::create([
//                 'travel_package_id' => $travelPackage->id,
//                 'image' => $path,
//                 'name' => Str::limit($name, 100)
//             ]);
            
//             $uploadedImages[] = $gallery;
//         }

//         return redirect()
//             ->route('admin.travel_packages.edit', $travelPackage->id)
//             ->with('success', count($uploadedImages) . ' images uploaded successfully!');
//     }

//     public function edit(TravelPackage $travelPackage, Gallery $gallery)
// {
//     return view('admin.galleries.edit', compact('travelPackage', 'gallery'));
// }

//     public function update(Request $request, TravelPackage $travelPackage, Gallery $gallery)
//     {
//         $request->validate([
//             'name' => 'required|string|max:255',
//             'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
//         ]);

//         if ($request->hasFile('image')) {
//             Storage::disk('public')->delete($gallery->image);
//             $gallery->image = $request->file('image')->store('galleries', 'public');
//         }

//         $gallery->name = $request->name;
//         $gallery->save();

//         return redirect()
//             ->route('admin.travel_packages.edit', $travelPackage->id)
//             ->with('success', 'Image updated successfully!');
//     }

//     public function destroy(TravelPackage $travelPackage, Gallery $gallery)
//     {
//         Storage::disk('public')->delete($gallery->image);
//         $gallery->delete();

//         return back()
//             ->with('success', 'Image deleted successfully!')
//             ->with('deleted_id', $gallery->id); 
//     }

// }