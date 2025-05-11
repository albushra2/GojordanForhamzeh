@extends('layouts.frontend')

@section('title', $blog->title)

@section('content')
    <div class="container py-5">
        <article class="blog-post">
            <!-- عنوان المدونة -->
            <h1 class="blog-post-title mb-4">{{ $blog->title }}</h1>

            <!-- معلومات المدونة -->
            <div class="blog-meta mb-4">
                <p class="text-muted">
                    <i class="fas fa-folder me-1"></i> {{ $blog->category->name ?? 'Uncategorized' }} |
                    <i class="fas fa-user me-1"></i> {{ $blog->user->name ?? 'Unknown Author' }} |
                    <i class="fas fa-calendar-alt me-1"></i> {{ $blog->created_at->format('M d, Y') }}
                    @if($blog->updated_at->gt($blog->created_at))
                        | <i class="fas fa-clock me-1"></i> Updated: {{ $blog->updated_at->format('M d, Y') }}
                    @endif
                </p>
            </div>

            <!-- صورة المدونة -->
            @if ($blog->image)
                <div class="blog-image mb-4">
                    <img src="{{ asset('storage/' . $blog->image) }}" class="img-fluid rounded" alt="{{ $blog->title }}">
                </div>
            @endif

            <!-- محتوى المدونة -->
            <div class="blog-body mb-5">
                {!! $blog->body !!}
            </div>
        </article>

        <hr class="my-5">

        <!-- قسم التعليقات -->
        <div class="comments-section mt-5">
            <h3 class="mb-4">
                <i class="fas fa-comments me-2"></i> 
                Comments ({{ $blog->comments->count() }})
            </h3>

            <!-- قائمة التعليقات -->
            <div class="comments-list">
                @forelse ($blog->comments as $comment)
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($comment->user->name ?? 'A') }}&background=random" 
                                         class="rounded-circle" 
                                         width="50" 
                                         alt="User Avatar">
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="mt-0">
                                        {{ $comment->user->name ?? 'Anonymous' }}
                                        <small class="text-muted ms-2">{{ $comment->created_at->diffForHumans() }}</small>
                                    </h5>
                                    <p class="mb-0">{{ $comment->body }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-info">
                        No comments yet. Be the first to comment!
                    </div>
                @endforelse
            </div>

            <!-- نموذج إضافة تعليق جديد -->
            @auth('travel_user')  <!-- استخدم الحارس الصحيح هنا -->
            <div class="card mt-4">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="fas fa-comment me-2"></i>
                        Leave a Comment
                    </h5>
                    <form action="{{ route('comments.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                        <div class="form-group mb-3">
                            <textarea name="body" class="form-control" rows="3"
                                      placeholder="Write your comment here..." required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-paper-plane me-1"></i> Post Comment
                        </button>
                    </form>
                </div>
            </div>
        @else
            <div class="alert alert-warning mt-4">
                Please <a href="{{ route('login') }}" class="alert-link">login</a> to leave a comment.
            </div>
        @endauth
        </div>

        <hr class="my-5">

        <!-- المدونات ذات الصلة -->
        @if ($related->count() > 0)
            <div class="related-posts mt-5">
                <h3 class="mb-4">
                    <i class="fas fa-book-reader me-2"></i>
                    Related Posts
                </h3>
                <div class="row">
                    @foreach ($related as $relatedBlog)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                @if ($relatedBlog->image)
                                    <img src="{{ asset('storage/' . $relatedBlog->image) }}" 
                                         class="card-img-top" 
                                         alt="{{ $relatedBlog->title }}">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="{{ route('blogs.show', $relatedBlog) }}">{{ $relatedBlog->title }}</a>
                                    </h5>
                                    <p class="card-text text-muted small">
                                        <i class="fas fa-calendar-alt me-1"></i> 
                                        {{ $relatedBlog->created_at->format('M d, Y') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection

@push('styles')
    <style>
        .blog-post {
            max-width: 800px;
            margin: 0 auto;
        }
        .blog-post-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #333;
        }
        .blog-body img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin: 1rem 0;
        }
        .blog-body p {
            font-size: 1.1rem;
            line-height: 1.8;
            margin-bottom: 1.5rem;
        }
        .comments-list {
            max-height: 500px;
            overflow-y: auto;
            padding-right: 10px;
        }
        .comments-list::-webkit-scrollbar {
            width: 5px;
        }
        .comments-list::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        .comments-list::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 10px;
        }
    </style>
@endpush

@push('scripts')
    <script>
        // يمكنك إضافة أي سكريبتات مطلوبة هنا
        document.addEventListener('DOMContentLoaded', function() {
            // تنعيم الصور داخل محتوى المدونة
            document.querySelectorAll('.blog-body img').forEach(img => {
                img.classList.add('img-fluid');
                img.classList.add('shadow-sm');
            });
        });
    </script>
@endpush