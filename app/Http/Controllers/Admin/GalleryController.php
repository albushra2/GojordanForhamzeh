<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TravelPackage;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class GalleryController extends Controller
{
    public function index(TravelPackage $travelPackage)
    {
        $galleries = $travelPackage->galleries()->withTrashed()->get();
        return view('admin.galleries.index', compact('travelPackage', 'galleries'));
    }

    public function create(TravelPackage $travelPackage)
    {
        return view('admin.galleries.create', compact('travelPackage'));
    }

    public function store(Request $request, TravelPackage $travelPackage)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $imagePath = $request->file('image')->store('galleries', 'public');
        $travelPackage->galleries()->create([
            'name' => $request->name,
            'image' => $imagePath
        ]);

        return redirect()->route('admin.galleries.index', $travelPackage)
            ->with('success', 'Image added successfully!');
    }

    public function destroy(TravelPackage $travelPackage, Gallery $gallery)
{
    if ($gallery->trashed()) {
        $gallery->forceDelete();
        Storage::disk('public')->delete($gallery->image);
    } else {
        $gallery->delete();
    }

    return back()->with('success', $gallery->trashed() ? 'Image archived!' : 'Image permanently deleted!');
}

public function restore(TravelPackage $travelPackage, Gallery $gallery)
{
    $gallery->restore();
    return back()->with('success', 'Image restored!');
}
}