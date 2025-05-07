@extends('layouts.app')
@section('title', 'Blog Management')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 justify-content-between d-flex">
                    <h1 class="m-0 text-dark">{{ __('Blog Management') }}</h1>
                    <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> New Blog
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Blog Posts</h3>
                            <div class="card-tools">
                                <form action="{{ route('admin.blogs.index') }}" method="GET">
                                    <div class="input-group input-group-sm" style="width: 250px;">
                                        <input type="text" name="search" class="form-control float-right" 
                                               placeholder="Search..." value="{{ request('search') }}">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead class="bg-gradient-indigo">
                                        <tr>
                                            <th style="width: 5%">#</th>
                                            <th style="width: 25%">Title</th>
                                            <th style="width: 15%">Image</th>
                                            <th style="width: 20%">Excerpt</th>
                                            <th style="width: 15%">Category</th>
                                            <th style="width: 10%">Author</th>
                                            <th style="width: 10%">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($blogs as $blog)
                                        <tr>
                                            <td>{{ $loop->iteration + ($blogs->perPage() * ($blogs->currentPage() - 1)) }}</td>
                                            <td>
                                                <a href="#" data-toggle="tooltip" title="{{ $blog->title }}">
                                                    {{ Str::limit($blog->title, 40) }}
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ Storage::url($blog->image) }}" data-toggle="lightbox">
                                                    <img src="{{ Storage::url($blog->image) }}" 
                                                         class="img-thumbnail" width="80" alt="{{ $blog->title }}">
                                                </a>
                                            </td>
                                            <td>{{ Str::limit($blog->excerpt, 60) }}</td>
                                            <td>
                                                <span class="badge badge-info">
                                                    {{ $blog->category->name }}
                                                </span>
                                            </td>
                                            <td>{{ $blog->user->name }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('admin.blogs.edit', [$blog]) }}" 
                                                       class="btn btn-sm btn-info" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form id="delete-form-{{ $blog->id }}" 
      action="{{ route('admin.blogs.destroy', [$blog]) }}" 
      method="post">
    @csrf 
    @method('delete')
    <button type="button" 
            class="btn btn-sm btn-danger delete-btn" 
            title="Delete"
            data-id="{{ $blog->id }}">
        <i class="fas fa-trash"></i>
    </button>
</form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">No blogs found.</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer clearfix">
                            {{ $blogs->withQueryString()->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<style>
    .card-primary.card-outline {
        border-top: 3px solid #6610f2;
    }
    .bg-gradient-indigo {
        background: linear-gradient(to right, #6610f2, #6f42c1);
        color: white;
    }
    .img-thumbnail {
        transition: transform 0.3s ease;
    }
    .img-thumbnail:hover {
        transform: scale(1.05);
    }
    .badge {
        font-size: 0.85rem;
        font-weight: 500;
    }
</style>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(function () {
        // Enable tooltips
        $('[data-toggle="tooltip"]').tooltip();
        
        // Enable lightbox for images
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox({
                alwaysShowClose: true
            });
        });
    });
    // SweetAlert for delete confirmation
$(document).ready(function() {
    $('.delete-btn').click(function(e) {
        e.preventDefault();
        var blogId = $(this).data('id');
        
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit the form
                $('#delete-form-' + blogId).submit();
            }
        });
    });
    
    // Show success message if it exists in session
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session('success') }}',
            timer: 3000,
            showConfirmButton: false
        });
    @endif
});
</script>
@endsection