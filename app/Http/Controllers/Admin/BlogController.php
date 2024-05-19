<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\BlogRequest;

class BlogController extends Controller
{
    
    public function index()
    {
        $blogs = Blog::with('category')->paginate(5);

        return view('admin.blogs.index', compact('blogs'));
    }

    
    public function create()
    {
        $categories = Category::get(['name', 'id']);

        return view('admin.blogs.create', compact('categories'));
    }

    
    public function store(BlogRequest $request)
    {
        if($request->validated()) {
            $image = $request->file('image')->store(
                'blog/images', 'public'
            );
            $slug = Str::slug($request->title, '-');

            Blog::create($request->except('image') + ['slug' => $slug, 'image' => $image]);
        }

        return redirect()->route('admin.blogs.index')->with([
            'message' => 'Success Created !',
            'alert-type' => 'success'
        ]);
    }

   
    public function show(string $id)
    {
        //
    }

    public function edit(Blog $blog)
    {
        $categories = Category::get(['name','id']);

        return view('admin.blogs.edit', compact('blog','categories'));
    }

   
    public function update(BlogRequest $request, Blog $blog)
    {
        if($request->validated()) {
            $slug = Str::slug($request->title, '-');
            if($request->image) {
                File::delete('storage/'. $blog->image);
                $image = $request->file('image')->store(
                    'blog/images', 'public'
                );
                $blog->update($request->except('image') + ['slug' => $slug, 'image' => $image]);
            }else {
                $blog->update($request->validated() + ['slug' => $slug]);
            }
        }

        return redirect()->route('admin.blogs.index')->with([
            'message' => 'Success Updated !',
            'alert-type' => 'info'
        ]);
    }

    
    public function destroy(Blog $blog)
    {
        File::delete('storage/'. $blog->image);
        $blog->delete();

        return redirect()->back()->with([
            'message' => 'Success Deleted !',
            'alert-type' => 'danger'
        ]);
    }
}
