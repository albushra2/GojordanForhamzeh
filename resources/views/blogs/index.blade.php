@extends('layouts.frontend')

@section('title', 'Travel Blog - Discover Jordan')

@section('content')

    <div class="container">
        <h1>Latest Blog Posts</h1>

        {{-- Optional: Display categories for filtering --}}
        <div class="mb-4">
            <h3>Categories</h3>
            <ul>
                @foreach($categories as $category)
                    <li>
                        {{ $category->name }} ({{ $category->blogs_count }})
                        {{-- Add a link to filter by category if you have implemented filtering --}}
                        {{-- <a href="{{ route('blogs.index', ['category' => $category->slug]) }}">{{ $category->name }}</a> ({{ $category->blogs_count }}) --}}
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="row">
            @forelse ($blogs as $blog)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        {{-- Assuming your Blog model has an image or thumbnail attribute --}}
                        {{-- @if ($blog->image)
                            <img src="{{ asset('storage/' . $blog->image) }}" class="card-img-top" alt="{{ $blog->title }}">
                        @endif --}}
                        <div class="card-body">
                            <h5 class="card-title">{{ $blog->title }}</h5>
                            {{-- Display category and author --}}
                            <p class="card-text">
                                <small class="text-muted">
                                    Category: {{ $blog->category->name ?? 'Uncategorized' }} |
                                    By: {{ $blog->user->name ?? 'Unknown Author' }} |
                                    Published on: {{ $blog->created_at->format('M d, Y') }}
                                </small>
                            </p>
                            {{-- Display a short excerpt --}}
                            <p class="card-text">{{ Str::limit($blog->body, 150) }}</p>
                            {{-- Link to the full blog post --}}
                            <a href="{{ route('blogs.show', $blog) }}" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p>No blog posts found.</p>
                </div>
            @endforelse
        </div>

        {{-- Pagination Links --}}
        <div class="d-flex justify-content-center">
            {{ $blogs->links() }}
        </div>
    </div>
@endsection