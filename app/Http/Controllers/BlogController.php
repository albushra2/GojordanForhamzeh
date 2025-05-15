<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
//test
//new update from github
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\BlogRequest;
use App\Http\Requests\BlogUpdateRequest;
class BlogController extends Controller
{
    // عرض جميع المدونات
    public function index()
    {
        $blogs = Blog::with(['category', 'user'])
            ->published()
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        $categories = Category::withCount('blogs')->get();

        return view('blogs.index', compact('blogs', 'categories'));
    }

    // عرض مدونة محددة
    public function show(Blog $blog)
    {
        $blog->increment('reads');
        
        return view('blogs.show', [
            'blog' => $blog->load(['category', 'user', 'comments']),
            'related' => Blog::where('category_id', $blog->category_id)
                ->where('id', '!=', $blog->id)
                ->take(3)
                ->get()
        ]);
    }
}