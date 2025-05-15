@extends('layouts.app')
@section('title', 'Category Management')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12 justify-content-between d-flex">
                <h1 class="m-0 text-gradient">
                    <i class="fas fa-tags mr-2"></i> {{ __('Category Management') }}
                </h1>
                <a href="{{ route('admin.categories.create') }}" class="btn btn-primary btn-pill">
                    <i class="fas fa-plus"></i> New Category
                </a>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-glass">
                    <div class="card-header">
                        <h3 class="card-title">All Categories</h3>
                        <div class="card-tools">
                            <form action="{{ route('admin.categories.index') }}" method="GET">
                                <div class="input-group input-group-sm" style="width: 250px;">
                                    <input type="text" name="search" class="form-control" 
                                           placeholder="Search..." value="{{ request('search') }}">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary">
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
                                <thead class="bg-gradient-primary text-white">
                                    <tr>
                                        <th style="width: 5%">#</th>
                                        <th style="width: 25%">Category</th>
                                        <th style="width: 30%">Description</th>
                                        <th style="width: 20%">Image</th>
                                        <th style="width: 20%">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse($categories as $category)
                                    <tr>
                                        <td class="align-middle">{{ $loop->iteration }}</td>
                                        <td class="align-middle">
                                            <div class="d-flex align-items-center">
                                                <div class="symbol symbol-40 symbol-light mr-3 flex-shrink-0">
                                                    @if($category->image)
                                                    <img src="{{ asset('storage/' . $category->image) }}" 
                                                         class="h-40 rounded" 
                                                         style="width: 40px; height: 40px; object-fit: cover;"
                                                         alt="{{ $category->name }}">
                                                    @else
                                                        <span class="symbol-label bg-primary text-white font-weight-bold">
                                                            {{ substr($category->name, 0, 1) }}
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="text-truncate">
                                                    <div class="font-weight-bold text-truncate">{{ $category->name }}</div>
                                                    <div class="text-muted text-truncate">{{ $category->slug }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <div class="text-wrap description-cell">
                                                {{ $category->description ? Str::limit($category->description, 50) : 'No description' }}
                                            </div>
                                        </td>
                                        <td class="align-middle text-center">
                                            @if($category->image)
                                                <div class="d-inline-block" style="width: 80px;">
                                                    <a href="{{ asset('storage/' . $category->image) }}" data-toggle="lightbox">
                                                        <img src="{{ asset('storage/' . $category->image) }}" 
                                                             class="img-fluid rounded" 
                                                             style="max-width: 100%; height: auto; max-height: 60px;"
                                                             alt="{{ $category->name }}">
                                                    </a>
                                                </div>
                                            @else
                                                <span class="text-muted">No image</span>
                                            @endif
                                        </td>
                                        <td class="align-middle">
                                            <div class="btn-group">
                                                <a href="{{ route('admin.categories.edit', $category) }}" 
                                                   class="btn btn-sm btn-info btn-rounded" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <button class="btn btn-sm btn-danger btn-rounded delete-btn" 
                                                        title="Delete" data-id="{{ $category->id }}">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                                <form id="delete-form-{{ $category->id }}" 
                                                      action="{{ route('admin.categories.destroy', $category) }}" 
                                                      method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-4">
                                            <div class="empty-state">
                                                <i class="fas fa-tags fa-3x text-primary mb-3"></i>
                                                <h3>No Categories Found</h3>
                                                <p>Create your first category to get started</p>
                                                <a href="{{ route('admin.categories.create') }}" class="btn btn-primary mt-3">
                                                    <i class="fas fa-plus"></i> Add Category
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer clearfix">
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">
<style>
    .text-gradient {
        background: linear-gradient(to right, #4e54c8, #8f94fb);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        display: inline-block;
    }
    
    .card-glass {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
    }
    
    .bg-gradient-primary {
        background: linear-gradient(to right, #4e54c8, #8f94fb);
    }
    
    .btn-pill {
        border-radius: 50px;
        padding: 0.5rem 1.5rem;
    }
    
    .btn-rounded {
        border-radius: 50%;
        width: 35px;
        height: 35px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }
    
    .symbol {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 0.42rem;
    }
    
    .symbol-40 {
        width: 40px;
        height: 40px;
    }
    
    .symbol-label {
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        width: 100%;
        height: 100%;
        border-radius: 0.42rem;
    }
    
    .empty-state {
        padding: 2rem;
        text-align: center;
        color: #677788;
    }
    
    .img-thumbnail {
        transition: all 0.3s ease;
        border-radius: 0.42rem;
    }
    
    .img-thumbnail:hover {
        transform: scale(1.05);
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
    }
    
    /* New Styles */
    .table td {
        vertical-align: middle !important;
    }
    
    .text-truncate {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        max-width: 200px;
    }
    
    .description-cell {
        max-width: 300px;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
    }
    
    .flex-shrink-0 {
        flex-shrink: 0;
    }
    
    .h-40 {
        height: 40px;
    }
</style>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>
<script>
    $(function () {
        // Enable tooltips
        $('[data-toggle="tooltip"]').tooltip();
        
        // Lightbox for images
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox({
                alwaysShowClose: true
            });
        });
        
        // Delete confirmation
        $('.delete-btn').click(function() {
            var categoryId = $(this).data('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#4e54c8',
                cancelButtonColor: '#dc3545',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#delete-form-' + categoryId).submit();
                }
            });
        });
        
        // Show success message if exists
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
                timer: 3000,
                showConfirmButton: false,
                background: 'rgba(255, 255, 255, 0.9)',
                backdrop: 'rgba(78, 84, 200, 0.2)'
            });
        @endif
    });
</script>
@endsection