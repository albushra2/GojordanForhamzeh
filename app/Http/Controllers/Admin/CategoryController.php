<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $category = new Category();
        $category->name = $validated['name'];
        $category->slug = Str::slug($validated['name']);
        $category->description = $validated['description'];

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('categories', 'public');
            $category->image = $imagePath;
        }

        $category->save();

        return redirect()->route('admin.categories.index')
               ->with('success', 'Category created successfully!');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,'.$category->id,
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $category->name = $validated['name'];
        $category->slug = Str::slug($validated['name']);
        $category->description = $validated['description'];

        if ($request->hasFile('image')) {
            // Delete old image
            if ($category->image) {
                Storage::disk('public')->delete($category->image);
            }
            // Store new image
            $imagePath = $request->file('image')->store('categories', 'public');
            $category->image = $imagePath;
        }

        $category->save();

        return redirect()->route('admin.categories.index')
               ->with('success', 'Category updated successfully!');
    }

    public function destroy(Category $category)
    {
        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }
        $category->delete();
        
        return redirect()->route('admin.categories.index')
               ->with('success', 'Category deleted successfully!');
    }
}