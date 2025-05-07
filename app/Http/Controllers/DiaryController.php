<?php

namespace App\Http\Controllers;

use App\Models\Diary;
use Illuminate\Http\Request;

class DiaryController extends Controller
{
    // إنشاء يومية جديدة
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'travel_package_id' => 'nullable|exists:travel_packages,id',
            'images.*' => 'image|max:2048'
        ]);

        $diary = auth()->user()->diaries()->create($validated);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $diary->images()->create([
                    'image' => $image->store('diaries', 'public')
                ]);
            }
        }

        return redirect()->route('diaries.show', $diary);
    }

    // عرض اليومية
    public function show(Diary $diary)
    {
        $this->authorize('view', $diary);

        return view('diaries.show', [
            'diary' => $diary->load(['images', 'travelPackage', 'user'])
        ]);
    }
}