@extends('layouts.app')

@section('title', 'User Management')

@section('styles')
<style>
    /* Enhanced User Management Styles */
    .content-header {
        background: linear-gradient(135deg, #4a6cf7 0%, #667eea 100%);
        padding: 1.5rem 0;
    }

    .content-header h1 {
        font-size: 2rem;
        font-weight: 700;
        letter-spacing: -0.5px;
    }

    .card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
        overflow: hidden;
    }

    .card-header {
        background: #ffffff;
        padding: 1.5rem;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }

    .input-group {
        max-width: 400px;
    }

    .table {
        margin-bottom: 0;
    }

    .table thead th {
        font-weight: 600;
        color: #2c3e50;
        border-bottom: 2px solid #f0f2f5;
        padding: 1.25rem 1.5rem;
    }

    .table tbody td {
        padding: 1.25rem 1.5rem;
        vertical-align: middle;
        border-bottom: 1px solid #f8f9fa;
    }

    .table-hover tbody tr:hover {
        background-color: #f8faff;
    }

    .user-avatar {
        width: 45px;
        height: 45px;
        border: 2px solid #e0e7ff;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
    }

    .badge {
        font-weight: 500;
        padding: 0.5em 0.8em;
        border-radius: 8px;
        font-size: 0.85em;
    }

    .action-buttons .btn {
        padding: 0.5rem 0.9rem;
        border-radius: 8px;
        transition: all 0.2s ease;
    }

    .action-buttons .btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
    }

    .pagination .page-item .page-link {
        border-radius: 8px;
        margin: 0 3px;
        border: 1px solid #dee2e6;
    }

    @media (max-width: 768px) {
        .table-responsive {
            border-radius: 12px;
            border: 1px solid #f0f2f5;
        }

        .table thead th {
            font-size: 0.9rem;
        }

        .table tbody td {
            font-size: 0.9rem;
            padding: 1rem;
        }

        .user-avatar {
            width: 35px;
            height: 35px;
        }
    }
</style>
@endsection

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 d-flex align-items-center">
                <h1 class="m-0 text-white"><i class="fas fa-users-cog mr-2"></i>User Management</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('admin.users.create') }}" class="btn btn-light">
                    <i class="fas fa-plus-circle mr-1"></i>Add New Administrator
                </a>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="input-group input-group-lg">
                            <input type="text" class="form-control border-right-0" placeholder="Search users...">
                            <div class="input-group-append">
                                <button class="btn btn-primary">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="bg-light">
                            <tr>
                                <th>User</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Last Login</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ $user->avatar ? asset('storage/'.$user->avatar) : asset('images/default-avatar.png') }}"
                                             class="user-avatar rounded-circle mr-3">
                                        <div>
                                            <div class="font-weight-bold">{{ $user->name }}</div>
                                            <small class="text-muted">{{ $user->email }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge {{ $user->is_admin ? 'badge-primary' : 'badge-secondary' }}">
                                        {{ $user->is_admin ? 'Admin' : 'User' }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge {{ is_null($user->deleted_at) ? 'badge-success' : 'badge-danger' }}">
                                        {{ is_null($user->deleted_at) ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>{{ $user->last_login_at ? $user->last_login_at->diffForHumans() : 'Never' }}</td>
                                <td class="text-center action-buttons">
                                    <div class="btn-group">
                                        <a href="{{ route('admin.users.edit', $user) }}"
                                           class="btn btn-sm btn-outline-primary"
                                           data-toggle="tooltip" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        @if($user->trashed())
                                        <form action="{{ route('admin.users.restore', $user) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-outline-success"
                                                    data-toggle="tooltip" title="Restore">
                                                <i class="fas fa-trash-restore"></i>
                                            </button>
                                        </form>
                                        @else
                                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                                    data-toggle="tooltip" title="Delete"
                                                    onclick="return confirm('Are you sure you want to delete this user?');">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card-footer bg-white">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="text-muted">
                        Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} entries
                    </div>
                    <nav>
                        {{ $users->links('vendor.pagination.bootstrap-4') }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function(){
    // Tooltip initialization
    $('[data-toggle="tooltip"]').tooltip();
});
</script>
@endsection