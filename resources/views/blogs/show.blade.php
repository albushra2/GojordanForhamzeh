@extends('layouts.frontend')

@section('title', $blog->title)

@section('content')

    <div class="container">
        <article>
            <h1>{{ $blog->title }}</h1>

            {{-- Display category, author, and date --}}
            <p class="text-muted">
                Category: {{ $blog->category->name ?? 'Uncategorized' }} |
                By: {{ $blog->user->name ?? 'Unknown Author' }} |
                Published on: {{ $blog->created_at->format('M d, Y') }}
            </p>

            {{-- Assuming your Blog model has an image --}}
            {{-- @if ($blog->image)
                <img src="{{ asset('storage/' . $blog->image) }}" class="img-fluid mb-4" alt="{{ $blog->title }}">
            @endif --}}

            {{-- Display the full blog body --}}
            <div class="blog-body">
                {!! $blog->body !!} {{-- Use {!! !!} if body contains HTML --}}
            </div>
        </article>

        <hr>

        {{-- Comments Section (assuming you have a 'comments' relationship on the Blog model) --}}
        <div class="comments-section mt-5">
            <h3>Comments ({{ $blog->comments->count() }})</h3>

            {{-- Display existing comments --}}
            @forelse ($blog->comments as $comment)
                <div class="media mb-3">
                    {{-- Display commenter's avatar or initial --}}
                    {{-- <img src="..." class="mr-3 rounded-circle" alt="Commenter Avatar" width="50"> --}}
                    <div class="media-body">
                        <h6 class="mt-0">{{ $comment->user->name ?? 'Anonymous' }} <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small></h6>
                        <p>{{ $comment->body }}</p>
                    </div>
                </div>
            @empty
                <p>No comments yet. Be the first to comment!</p>
            @endforelse

            {{-- Add a form for new comments if users can comment --}}
            {{-- @auth
                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title">Leave a Comment</h5>
                        <form action="{{ route('comments.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                            <div class="form-group">
                                <textarea name="body" class="form-control" rows="3" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Post Comment</button>
                        </form>
                    </div>
                </div>
            @else
                <p class="mt-4">Please <a href="{{ route('login') }}">login</a> to leave a comment.</p>
            @endauth --}}

        </div>

        <hr>

        {{-- Related Blog Posts Section --}}
        @if ($related->count() > 0)
            <div class="related-posts mt-5">
                <h3>Related Posts</h3>
                <ul>
                    @foreach ($related as $relatedBlog)
                        <li><a href="{{ route('blogs.show', $relatedBlog) }}">{{ $relatedBlog->title }}</a></li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection