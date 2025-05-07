@extends('layouts.app')

@section('title', 'Manage Travel Packages')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-lg">
                <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
                    <h3 class="mb-0">Travel Packages</h3>
                    <a href="{{ route('admin.travel_packages.create') }}" class="btn btn-light">
                        <i class="fas fa-plus-circle"></i> Create New Package
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th>#</th>
                                    <th>Featured Image</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Duration</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($packages as $package)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ Storage::url($package->featured_image) }}" 
                                             alt="{{ $package->title }}" 
                                             class="img-thumbnail" 
                                             style="width: 100px; height: 60px; object-fit: cover;">
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <strong>{{ $package->title }}</strong>
                                            <small class="text-muted">{{ $package->location }}</small>
                                        </div>
                                    </td>
                                    <td>{{ $package->category->name }}</td>
                                    <td>${{ number_format($package->price) }}</td>
                                    <td>{{ $package->duration_days }} days</td>
                                    <td>
                                        <span class="badge {{ $package->deleted_at ? 'bg-danger' : 'bg-success' }}">
                                            {{ $package->deleted_at ? 'Archived' : 'Active' }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('admin.travel_packages.edit', $package) }}" 
                                               class="btn btn-sm btn-primary" 
                                               title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            
                                            @if($package->deleted_at)
                                                <form action="{{ route('admin.travel_packages.restore', $package) }}" 
                                                      method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" 
                                                            class="btn btn-sm btn-success"
                                                            title="Restore">
                                                        <i class="fas fa-trash-restore"></i>
                                                    </button>
                                                </form>
                                            @else
                                                <form action="{{ route('admin.travel_packages.destroy', $package) }}" 
                                                      method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                            class="btn btn-sm btn-danger"
                                                            title="Archive">
                                                        <i class="fas fa-archive"></i>
                                                    </button>
                                                </form>
                                            @endif
                                           
                                            <a href="{{ route('admin.galleries.index', ['travel_package' => $package]) }}" 
                                               class="btn btn-sm btn-info"
                                               title="Manage Gallery">
                                                <i class="fas fa-images"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center py-4">
                                        <div class="empty-state">
                                            <i class="fas fa-suitcase fa-3x text-muted"></i>
                                            <h4 class="mt-3">No packages found!</h4>
                                            <p class="text-muted">Start by creating your first travel package</p>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="d-flex justify-content-end mt-4">
                        {{ $packages->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .card {
        border-radius: 15px;
        overflow: hidden;
    }
    
    .table thead th {
        border-bottom: 2px solid #dee2e6;
    }
    
    .img-thumbnail {
        transition: transform 0.3s ease;
    }
    
    .img-thumbnail:hover {
        transform: scale(1.1);
    }
    
    .empty-state {
        opacity: 0.7;
        transition: opacity 0.3s ease;
    }
    
    .empty-state:hover {
        opacity: 1;
    }
    
    .btn-sm {
        min-width: 38px;
    }
</style>
@endsection