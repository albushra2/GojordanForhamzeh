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
        // التحقق من البيانات
        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:blogs,title',
            'category_id' => 'required|exists:categories,id',
            'excerpt' => 'required|string|max:500',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120', // زيادة الحجم إلى 5 ميغابايت
        ]);
    
        // تحميل الصورة
        $image = $request->file('image');
        
        // تحسين الصورة قبل حفظها
        $imagePath = $image->store('blogs', 'public');
        $img = Image::make(storage_path('app/public/' . $imagePath));
    
        // تغيير حجم الصورة (اختياري)
        $img->resize(1200, 1200, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();  // تجنب زيادة حجم الصورة
        });
    
        // حفظ الصورة المحسنة
        $img->save(storage_path('app/public/' . $imagePath));
    
        // تخزين المدونة
        Blog::create([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']),
            'category_id' => $validated['category_id'],
            'excerpt' => $validated['excerpt'],
            'description' => $validated['description'],
            'image' => $imagePath,  // حفظ مسار الصورة
            'user_id' => auth()->id(),
        ]);
    
        return redirect()->route('admin.blogs.index')
               ->with('success', 'Blog created successfully!');
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            Storage::disk('public')->delete($blog->image);
            // Upload new image
            $imagePath = $request->file('image')->store('blogs', 'public');
            $blog->image = $imagePath;
        }

        $blog->update([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']),
            'category_id' => $validated['category_id'],
            'excerpt' => $validated['excerpt'],
            'description' => $validated['description'],
        ]);

        return redirect()->route('admin.blogs.index')
               ->with('success', 'Blog updated successfully!');
    }

    public function destroy(Blog $blog)
    {
          // Delete associated image
    Storage::disk('public')->delete($blog->image);
    // Delete blog post
    $blog->delete();
    
    return redirect()->route('admin.blogs.index')
           ->with('success', 'Blog deleted successfully!');
    }
    
}