<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;

class CategoryController extends Controller
{
    
    public function index()
    {
        $categories = category::paginate(10);

        return view('admin.categories.index', compact('categories'));
    }
    
    public function create()
    {
        return view('admin.categories.create');
    }

    
    public function store(CategoryRequest $request)
    {
        if($request->validated()) {
            $slug = Str::slug($request->name, '-');
            category::create($request->validated() + ['slug' => $slug]);
        }

        return redirect()->route('admin.categories.index')->with([
            'message' => 'Success Created !',
            'alert-type' => 'success'
        ]);
    }

    
    public function show(string $id)
    {
        //
    }

    
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    
    public function update(CategoryRequest $request, Category $category)
    {
        if($request->validated()) {
            $slug = Str::slug($request->name, '-');
            $category->update($request->validated() + ['slug' => $slug]);
        }

        return redirect()->route('admin.categories.index')->with([
            'message' => 'Success Updated !',
            'alert-type' => 'info'
        ]);
    }
    
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->back()->with([
            'message' => 'Success Deleted !',
            'alert-type' => 'danger'
        ]);
    }
}
