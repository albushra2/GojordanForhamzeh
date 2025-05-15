@extends('layouts.app')

@section('title', 'Manage Travel Packages')

@section('content')
{{-- No content header here as the card header serves this purpose effectively --}}

<div class="container-fluid px-4"> {{-- Using AdminLTE/Bootstrap container and padding --}}
    <div class="row">
        <div class="col-12">
            {{-- Card with shadow, border radius, and overflow hidden --}}
            <div class="card shadow-lg border-0 overflow-hidden" style="border-radius: 0.75rem;">
                {{-- Card Header with Gradient Background and Flex alignment --}}
                <div class="card-header d-flex justify-content-between align-items-center bg-gradient-primary text-white py-3" style="border-radius: 0.75rem 0.75rem 0 0;">
                    <h3 class="mb-0" style="font-size: 1.8rem; font-weight: 600;">
                        <i class="fas fa-suitcase mr-2"></i> {{-- Using mr-2 for Bootstrap 4 spacing --}}
                        Travel Packages
                    </h3>
                     {{-- Button styled by app.blade.php and custom styles --}}
                    <a href="{{ route('admin.travel_packages.create') }}" class="btn btn-light rounded-pill px-4">
                        <i class="fas fa-plus-circle mr-2"></i>New Package
                    </a>
                </div>

                {{-- Card Body --}}
                <div class="card-body p-4"> {{-- Increased padding --}}
                    @if($packages->isEmpty())
                    <div class="text-center py-5">
                        <div class="empty-state animate__animated animate__fadeIn">
                            <i class="fas fa-suitcase fa-4x text-muted mb-4"></i>
                            <h3 class="h4">No Packages Found</h3>
                            <p class="text-muted">Start by creating your first travel package</p>
                             {{-- Button styled by app.blade.php --}}
                            <a href="{{ route('admin.travel_packages.create') }}" class="btn btn-primary mt-3 px-4">
                                <i class="fas fa-plus mr-2"></i>Create Package
                            </a>
                        </div>
                    </div>
                    @else
                    {{-- Grid for packages --}}
                    <div class="row g-4"> {{-- Using Bootstrap 5 g-4 for gap, ensure Bootstrap 5 grid is available or use custom spacing --}}
                        @foreach($packages as $package)
                         {{-- Column for each package card --}}
                        <div class="col-12 col-md-6 col-lg-4">
                             {{-- Package Card with hover effect and styling --}}
                            <div class="card h-100 shadow-sm border-0 hover-scale" style="border-radius: 1rem;">
                                {{-- Image container --}}
                                <div class="card-img-top position-relative overflow-hidden" style="border-radius: 1rem 1rem 0 0;">
                                    @if($package->featured_image)
                                    {{-- Display featured image --}}
                                    <div class="image-container" style="background-image: url('{{ asset('storage/' . $package->featured_image) }}')">
                                        <div class="image-overlay"></div>
                                    </div>
                                    @else
                                     {{-- Placeholder if no image --}}
                                    <div class="no-image d-flex align-items-center justify-content-center">
                                        <i class="fas fa-image fa-3x text-white-50"></i>
                                    </div>
                                    @endif
                                     {{-- Status badge --}}
                                    <div class="position-absolute top-0 right-0 m-3"> {{-- Using Bootstrap 4 positioning classes --}}
                                         {{-- Badge styled by custom CSS --}}
                                        <span class="badge bg-{{ $package->deleted_at ? 'danger' : 'success' }} rounded-pill px-3 py-2">
                                            <i class="fas fa-{{ $package->deleted_at ? 'archive' : 'check-circle' }} mr-1"></i> {{-- Using mr-1 --}}
                                            {{ $package->deleted_at ? 'Archived' : 'Active' }}
                                        </span>
                                    </div>
                                </div>
                                {{-- Card Body --}}
                                <div class="card-body d-flex flex-column"> {{-- Use flex-column to push footer down --}}
                                    {{-- Package Title and Location --}}
                                    <h5 class="card-title mb-1">{{ $package->title }}</h5>
                                    <p class="text-muted small mb-2">
                                        <i class="fas fa-map-marker-alt mr-1"></i>{{ $package->location }}
                                    </p>

                                     {{-- Package Meta (Category, Gallery Count) --}}
                                    <div class="package-meta d-flex justify-content-between small mb-3">
                                        <div class="meta-item">
                                            <i class="fas fa-tag mr-1"></i>
                                            {{ $package->category->name }}
                                        </div>
                                        <div class="meta-item">
                                            <i class="fas fa-images mr-1"></i>
                                            {{ $package->galleries_count }} photos
                                        </div>
                                    </div>

                                     {{-- Price and Duration --}}
                                    <div class="price-duration d-flex justify-content-between align-items-center mt-auto mb-3"> {{-- mt-auto pushes this to bottom --}}
                                        <div class="text-primary font-weight-bold" style="font-size: 1.2rem;">
                                            ${{ number_format($package->price) }}
                                        </div>
                                        <div class="text-muted small">
                                            <i class="fas fa-clock mr-1"></i>
                                            {{ $package->duration_days }} days
                                        </div>
                                    </div>

                                     {{-- Action Buttons --}}
                                    <div class="action-buttons d-grid gap-2 d-flex justify-content-end"> {{-- Bootstrap 5 g-2 gap might need adjustment for B4 --}}
                                         {{-- Edit Button --}}
                                        <a href="{{ route('admin.travel_packages.edit', $package) }}"
                                           class="btn btn-sm btn-outline-primary rounded-circle" {{-- Changed to rounded-circle --}}
                                           title="Edit"
                                           data-toggle="tooltip"> {{-- Using data-toggle for Bootstrap 4 --}}
                                            <i class="fas fa-edit"></i>
                                        </a>

                                         {{-- Archive/Restore Button and Form --}}
                                        @if($package->deleted_at)
                                             {{-- Restore Form --}}
                                            <form action="{{ route('admin.travel_packages.restore', $package) }}" method="POST" class="d-inline"> {{-- Use d-inline to keep buttons on same line --}}
                                                @csrf @method('PATCH')
                                                <button type="submit"
                                                        class="btn btn-sm btn-outline-success rounded-circle" {{-- Changed to rounded-circle --}}
                                                        title="Restore"
                                                        data-toggle="tooltip"> {{-- Using data-toggle --}}
                                                    <i class="fas fa-trash-restore"></i>
                                                </button>
                                            </form>
                                        @else
                                             {{-- Archive Form --}}
                                            <form action="{{ route('admin.travel_packages.destroy', $package) }}" method="POST" class="d-inline delete-form"> {{-- Added delete-form class --}}
                                                @csrf @method('DELETE')
                                                <button type="button" {{-- Changed type to button to trigger modal --}}
                                                        class="btn btn-sm btn-outline-danger rounded-circle delete-btn" {{-- Added delete-btn class --}}
                                                        title="Archive"
                                                        data-toggle="tooltip"> {{-- Using data-toggle --}}
                                                    <i class="fas fa-archive"></i>
                                                </button>
                                            </form>
                                        @endif

                                         {{-- Gallery Button --}}
                                        <a href="{{ route('admin.travel_packages.galleries.index', $package) }}" {{-- Assuming this route exists --}}
                                           class="btn btn-sm btn-outline-info rounded-circle" {{-- Changed to rounded-circle --}}
                                           title="Gallery"
                                           data-toggle="tooltip"> {{-- Using data-toggle --}}
                                            <i class="fas fa-images"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    {{-- Pagination --}}
                    <div class="d-flex justify-content-center mt-4">
                         {{-- Using Bootstrap 4 pagination view --}}
                        {{ $packages->links('vendor.pagination.bootstrap-4') }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Bootstrap 4 Confirmation Modal --}}
<div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">Confirm Action</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to perform this action?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" id="confirmAction">Confirm</button>
      </div>
    </div>
  </div>
</div>
@endsection

{{-- Styles section remains the same as previously provided --}}
@section('styles')
<style>
    /* Inherit variables from app.blade.php */
    :root {
        --primary: #4a6cf7;
        --secondary: #667eea;
        --success: #10b981;
        --danger: #ef4444;
        --info: #3b82f6; /* Added info color variable */
        --dark: #2c3e50;
        --light: #f8f9fa;
        --white: #ffffff;
    }

    /* Enhanced Card Header Gradient */
    .card-header.bg-gradient-primary {
        background: linear-gradient(135deg, var(--primary), var(--secondary)) !important; /* Use theme variables */
        border-radius: 0.75rem 0.75rem 0 0;
        padding: 1.5rem 2rem !important; /* Adjusted padding */
    }

    /* New package button style refinement */
    .btn-light.rounded-pill {
        color: var(--primary) !important;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    .btn-light.rounded-pill:hover {
         transform: translateY(-2px);
         box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }


    /* Card Hover Effect */
    .hover-scale {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 1rem;
        overflow: hidden;
    }

    .hover-scale:hover {
        transform: translateY(-5px);
        box-shadow: 0 1rem 3rem rgba(0,0,0,.15) !important;
    }

    /* Image Container */
    .image-container {
        height: 200px;
        background-size: cover;
        background-position: center;
        position: relative;
    }

    .image-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(180deg, rgba(0,0,0,0) 50%, rgba(0,0,0,0.7) 100%); /* Slightly darker overlay */
    }

    /* No Image Placeholder */
    .no-image {
        height: 200px;
        background: var(--dark);
        color: rgba(255,255,255,0.5);
    }

    /* Package Meta Styling */
    .package-meta {
        color: var(--dark); /* Use dark variable */
        opacity: 0.8; /* Slightly less prominent */
        font-size: 0.95rem; /* Slightly larger */
    }

    .meta-item i {
        color: var(--primary); /* Use primary color for icons */
        margin-right: 0.5rem; /* Adjust spacing */
    }

    /* Price and Duration Styling */
    .price-duration {
        font-size: 1.1rem;
    }

    .price-duration .text-primary {
        font-weight: bold;
        font-size: 1.3rem; /* Emphasize price */
        color: var(--primary) !important; /* Ensure primary color */
    }

    .price-duration .text-muted {
        font-size: 0.95rem;
        color: rgba(44, 62, 80, 0.8) !important; /* Consistent muted text */
    }

     .price-duration .text-muted i {
         color: rgba(44, 62, 80, 0.6); /* Icon color for muted items */
     }

    /* Action Buttons Container */
    .action-buttons {
        gap: 0.75rem; /* Added gap */
    }

    /* Action Buttons Styling */
    .action-buttons .btn {
        width: 36px; /* Slightly smaller circle */
        height: 36px; /* Slightly smaller circle */
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s ease-in-out; /* Faster transition */
        border-radius: 50% !important; /* Ensure perfect circle */
    }

    .action-buttons .btn:hover {
        transform: translateY(-2px) scale(1.05); /* Lift and slight scale on hover */
        box-shadow: 0 4px 8px rgba(0,0,0,0.1); /* Subtle shadow */
    }

    /* Specific Outline Button Colors (if not handled by layout) */
    /* Ensure these match the layout's outline button hover styles */
     .btn-outline-primary:hover {
          background-color: var(--primary) !important;
          color: var(--white) !important;
          border-color: var(--primary) !important;
          box-shadow: 0 3px 10px rgba(74,108,247,0.3);
     }
     .btn-outline-success {
          color: var(--success) !important;
          border-color: var(--success) !important;
     }
     .btn-outline-success:hover {
          background-color: var(--success) !important;
          color: var(--white) !important;
          border-color: var(--success) !important;
          box-shadow: 0 3px 10px rgba(16, 185, 129, 0.3);
     }
     .btn-outline-danger {
         color: var(--danger) !important;
         border-color: var(--danger) !important;
     }
     .btn-outline-danger:hover {
         background-color: var(--danger) !important;
         color: var(--white) !important;
         border-color: var(--danger) !important;
         box-shadow: 0 3px 10px rgba(239, 68, 68, 0.3);
     }
     .btn-outline-info {
          color: var(--info) !important;
          border-color: var(--info) !important;
     }
      .btn-outline-info:hover {
          background-color: var(--info) !important;
          color: var(--white) !important;
          border-color: var(--info) !important;
          box-shadow: 0 3px 10px rgba(59, 130, 246, 0.3);
     }


    /* Status Badge Styling */
    .badge.rounded-pill {
        font-size: 0.75rem; /* Slightly smaller font */
        padding: 0.35em 0.9em; /* Adjusted padding */
        font-weight: 600;
    }
     .badge.bg-success { background-color: var(--success) !important; }
     .badge.bg-danger { background-color: var(--danger) !important; }


    /* Empty State Styling */
    .empty-state {
        opacity: 0.85; /* Slightly more visible */
        transition: opacity 0.3s ease;
    }

    .empty-state:hover {
        opacity: 1;
    }
     .empty-state .btn-primary {
         border-radius: 0.75rem; /* Match theme button radius */
     }

    /* Pagination Styling (for Bootstrap 4) */
    .pagination .page-item .page-link {
        border-radius: 0.5rem; /* Rounded corners */
        margin: 0 0.2rem; /* Space between links */
        border: 1px solid rgba(0,0,0,0.1); /* Subtle border */
        color: var(--dark); /* Dark text color */
        transition: all 0.3s ease;
        min-width: 36px; /* Ensure consistent size */
        text-align: center;
    }

    .pagination .page-item.active .page-link {
        background-color: var(--primary); /* Use primary color */
        border-color: var(--primary); /* Use primary color */
        color: var(--white); /* White text for active */
        box-shadow: 0 3px 10px rgba(74,108,247,0.3); /* Primary shadow */
    }

    .pagination .page-item .page-link:hover {
         background-color: var(--light); /* Light background on hover */
         color: var(--dark); /* Keep text dark */
         border-color: rgba(0,0,0,0.15);
         transform: translateY(-1px);
    }

    .pagination .page-item.disabled .page-link {
        color: rgba(44, 62, 80, 0.5) !important; /* Softer disabled text */
        border-color: rgba(0,0,0,0.08);
    }


    @media (max-width: 768px) {
        .card-header h3 {
             font-size: 1.5rem !important; /* Adjust header size on small screens */
        }
        .action-buttons {
            justify-content: center !important; /* Center buttons on small screens */
            margin-top: 1rem; /* Add space above buttons */
        }

        .action-buttons .btn {
             width: 32px; /* Smaller buttons on small screens */
             height: 32px;
             font-size: 0.8rem;
        }
        .card-body {
             padding: 1.5rem !important; /* Adjust padding on small screens */
        }
    }
</style>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('Travel Packages Index Script Loaded'); // Debug log

    // Initialize tooltips (Bootstrap 4)
    $('[data-toggle="tooltip"]').tooltip();
    console.log('Tooltips initialized'); // Debug log

    // Confirmation modal handling (Bootstrap 4)
    let formToSubmit = null;
    const confirmationModal = $('#confirmationModal'); // Get the modal element

    confirmationModal.on('show.bs.modal', function (event) {
        console.log('Modal is about to show'); // Debug log
        var button = $(event.relatedTarget); // Button that triggered the modal
        // Find the closest form to the button
        formToSubmit = button.closest('form');
        console.log('Form to submit:', formToSubmit); // Debug log

        // Optional: Update modal body text based on the action (e.g., Archive vs Delete)
        const actionTitle = button.attr('title') || 'action';
        confirmationModal.find('.modal-body').text('Are you sure you want to perform this ' + actionTitle.toLowerCase() + '?');
         // Optional: Change modal button color/text
         confirmationModal.find('#confirmAction').removeClass('btn-primary btn-danger').addClass('btn-danger').text(actionTitle);


    });

     confirmationModal.on('hidden.bs.modal', function () {
         formToSubmit = null; // Clear the form reference when modal is hidden
         console.log('Modal is hidden, formToSubmit cleared.'); // Debug log
     });


    $('#confirmAction').on('click', function () {
        console.log('Confirm button clicked'); // Debug log
        if (formToSubmit) {
            console.log('Submitting form:', formToSubmit); // Debug log
            formToSubmit.submit();
        } else {
            console.log('No form to submit.'); // Debug log
        }
        // Modal will be hidden automatically after submit or can be hidden here
        // confirmationModal.modal('hide'); // Hiding here might interrupt submission
    });

    // Attach click listener to delete buttons to trigger modal
    $('.delete-btn').on('click', function(e) {
        console.log('Delete button clicked'); // Debug log
        e.preventDefault(); // Prevent default form submission
        // The modal 'show.bs.modal' event listener handles setting formToSubmit
        confirmationModal.modal('show', $(this)); // Pass the clicked button to the modal
    });
     console.log('Delete button click listener attached.'); // Debug log
});
</script>
@endsection