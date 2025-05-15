<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::with(['category', 'user'])
                    ->latest()
                    ->paginate(10);
                    
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.blogs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:blogs,title',
            'category_id' => 'required|exists:categories,id',
            'excerpt' => 'required|string|max:500',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        // Store image
        $imagePath = $request->file('image')->store('blogs', 'public');

        Blog::create([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']),
            'category_id' => $validated['category_id'],
            'excerpt' => $validated['excerpt'],
            'description' => $validated['description'],
            'image' => $imagePath,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('admin.blogs.index')
               ->with('success', 'Blog post created successfully!');
    }

    public function edit(Blog $blog)
    {
        $categories = Category::all();
        return view('admin.blogs.edit', compact('blog', 'categories'));
    }

    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:blogs,title,'.$blog->id,
            'category_id' => 'required|exists:categories,id',
            'excerpt' => 'required|string|max:500',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        $updateData = [
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']),
            'category_id' => $validated['category_id'],
            'excerpt' => $validated['excerpt'],
            'description' => $validated['description'],
        ];

        if ($request->hasFile('image')) {
            // Delete old image
            Storage::disk('public')->delete($blog->image);
            // Store new image
            $updateData['image'] = $request->file('image')->store('blogs', 'public');
        }

        $blog->update($updateData);

        return redirect()->route('admin.blogs.index')
               ->with('success', 'Blog post updated successfully!');
    }

    public function destroy(Blog $blog)
    {
        Storage::disk('public')->delete($blog->image);
        $blog->delete();
        
        return redirect()->route('admin.blogs.index')
               ->with('success', 'Blog post deleted successfully!');
    }
}