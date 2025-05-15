@extends('layouts.app')

@section('title', 'Edit Travel Package')

@section('content')
{{-- Content Header for the page title and back button --}}
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12 d-flex justify-content-between align-items-center"> {{-- Added align-items-center --}}
                <h1 class="m-0" style="font-size: 1.8rem; font-weight: 600;">{{ __('Edit Travel Package') }}</h1>
                {{-- Button styled by app.blade.php --}}
                <a href="{{ route('admin.travel_packages.index') }}" class="btn btn-primary px-4"> {{-- Added px-4 padding --}}
                    <i class="fa fa-arrow-left mr-2"></i> Back
                </a>
            </div>
        </div>
    </div>
</div>

{{-- Main content area --}}
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                {{-- Card for Current Galleries --}}
                <div class="card shadow-lg" style="border-radius: 0.75rem;">
                    {{-- Card Header --}}
                    <div class="card-header bg-white py-3" style="border-radius: 0.75rem 0.75rem 0 0; border-bottom: 1px solid rgba(0, 0, 0, 0.08);"> {{-- Applied styling from index --}}
                        <h3 class="card-title mb-0" style="font-size: 1.3rem; font-weight: 600;">Current Galleries</h3>
                    </div>
                    {{-- Card Body with Table --}}
                    <div class="card-body p-0"> {{-- p-0 to make table edges align with card --}}
                        <div class="table-responsive">
                            {{-- Gallery Table --}}
                            <table class="table table-hover mb-0"> {{-- mb-0 to remove margin below table --}}
                                <thead class="bg-light"> {{-- bg-light is fine, text color adjusted in custom CSS --}}
                                    <tr>
                                        <th style="width: 60px;">#</th> {{-- Adjusted width --}}
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th style="width: 120px;" class="text-center">Actions</th> {{-- Adjusted width and centered --}}
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse($travelPackage->galleries as $gallery)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $gallery->name }}</td>
                                        <td>
    <a href="{{ asset('storage/' . $gallery->image) }}" target="_blank">
        <img src="{{ asset('storage/' . $gallery->image) }}" 
             alt="{{ $gallery->name }}" 
             class="img-thumbnail"
             style="max-width: 150px; height: auto;">
    </a>
</td>                                 <td class="text-center">
                                             {{-- Action Buttons --}}
                                            <div class="btn-group">
                                                 {{-- Edit Gallery Button (assuming this route exists) --}}
                                                <a href="{{ route('admin.travel_packages.galleries.edit', [$travelPackage, $gallery]) }}"
                                                   class="btn btn-sm btn-outline-info" {{-- Used outline-info --}}
                                                   data-toggle="tooltip" title="Edit Gallery"> {{-- Using data-toggle --}}
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                {{-- Delete Gallery Form --}}
                                                <form action="{{ route('admin.travel_packages.galleries.destroy', [$travelPackage, $gallery]) }}"
                                                      method="post" class="d-inline delete-form"> {{-- Added classes --}}
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" {{-- Changed type to button --}}
                                                            class="btn btn-sm btn-outline-danger delete-btn" {{-- Added classes --}}
                                                            data-toggle="tooltip" title="Delete Gallery"> {{-- Using data-toggle --}}
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-4 text-muted">No galleries found for this package.</td> {{-- Styled empty message --}}
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                {{-- Card for Add New Gallery --}}
                <div class="card shadow-lg mt-4" style="border-radius: 0.75rem;"> {{-- Added mt-4 margin and border-radius --}}
                    {{-- Card Header --}}
                    <div class="card-header bg-white py-3" style="border-radius: 0.75rem 0.75rem 0 0; border-bottom: 1px solid rgba(0, 0, 0, 0.08);"> {{-- Applied styling --}}
                        <h3 class="card-title mb-0" style="font-size: 1.3rem; font-weight: 600;">Add New Gallery Image</h3> {{-- Updated title --}}
                    </div>
                    {{-- Card Body with Form --}}
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.travel_packages.galleries.store', $travelPackage) }}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Gallery Name</label>
                                         {{-- Form control styled by app.blade.php and custom styles --}}
                                        <input type="text"
                                               class="form-control @error('name') is-invalid @enderror"
                                               name="name"
                                               value="{{ old('name') }}"
                                               placeholder="Enter gallery image name"> {{-- Added placeholder --}}
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <div class="custom-file rounded" style="overflow: hidden;"> {{-- Added rounded style --}}
                                             {{-- Custom file input styled by custom CSS --}}
                                            <input type="file"
                                                   class="custom-file-input @error('image') is-invalid @enderror"
                                                   name="image"
                                                   id="gallery_image"> {{-- Changed ID for clarity --}}
                                            <label class="custom-file-label" for="gallery_image">Choose image file</label> {{-- Updated label text and for attribute --}}
                                            @error('image')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Submit Button --}}
                            <div class="row mt-3">
                                <div class="col-12">
                                     {{-- Button styled by app.blade.php --}}
                                    <button type="submit" class="btn btn-success px-4"> {{-- Added px-4 --}}
                                         <i class="fas fa-plus mr-2"></i> Add Gallery Image
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- Card for Edit Package Details --}}
                <div class="card shadow-lg mt-4" style="border-radius: 0.75rem;"> {{-- Added mt-4 margin and border-radius --}}
                    {{-- Card Header --}}
                    <div class="card-header bg-white py-3" style="border-radius: 0.75rem 0.75rem 0 0; border-bottom: 1px solid rgba(0, 0, 0, 0.08);"> {{-- Applied styling --}}
                        <h3 class="card-title mb-0" style="font-size: 1.3rem; font-weight: 600;">Edit Package Details</h3>
                    </div>
                    {{-- Card Body with Form --}}
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.travel_packages.update', $travelPackage) }}"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            {{-- Package Details Fields --}}
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="title">Package Title</label>
                                         {{-- Form control styled by app.blade.php and custom styles --}}
                                        <input type="text"
                                               class="form-control @error('title') is-invalid @enderror"
                                               name="title"
                                               value="{{ old('title', $travelPackage->title) }}"
                                               placeholder="Enter package title"> {{-- Added placeholder --}}
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Description</label>
                                         {{-- CKEditor textarea --}}
                                        <textarea class="form-control @error('description') is-invalid @enderror"
                                                  name="description"
                                                  id="description"
                                                  rows="5"
                                                  placeholder="Enter package description">{{ old('description', $travelPackage->description) }}</textarea> {{-- Added placeholder --}}
                                        @error('description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                     {{-- Additional fields (Type, Location, Price) --}}
                                     <div class="row">
                                         <div class="col-md-4">
                                             <div class="form-group">
                                                 <label for="type">Type</label>
                                                 <input type="text" class="form-control @error('type') is-invalid @enderror" name="type" value="{{ old('type', $travelPackage->type) }}" placeholder="e.g., Religious, Adventure">
                                                 @error('type') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                             </div>
                                         </div>
                                         <div class="col-md-4">
                                              <div class="form-group">
                                                  <label for="location">Location</label>
                                                  <input type="text" class="form-control @error('location') is-invalid @enderror" name="location" value="{{ old('location', $travelPackage->location) }}" placeholder="e.g., Petra, Wadi Rum">
                                                  @error('location') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                              </div>
                                         </div>
                                         <div class="col-md-4">
                                              <div class="form-group">
                                                  <label for="price">Price ($)</label>
                                                  <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price', $travelPackage->price) }}" placeholder="e.g., 500">
                                                  @error('price') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                              </div>
                                         </div>
                                     </div>

                                      {{-- Duration, Category, Tour Guide Fields --}}
                                      <div class="row">
                                          <div class="col-md-4">
                                              <div class="form-group">
                                                  <label for="duration_days">Duration (Days)</label>
                                                  <input type="number" class="form-control @error('duration_days') is-invalid @enderror" name="duration_days" value="{{ old('duration_days', $travelPackage->duration_days) }}" placeholder="e.g., 3">
                                                  @error('duration_days') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                              </div>
                                          </div>
                                          <div class="col-md-4">
                                               <div class="form-group">
                                                   <label for="category_id">Category</label>
                                                   <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                                       <option value="">Select Category</option>
                                                       @foreach($categories as $category)
                                                           <option value="{{ $category->id }}" {{ old('category_id', $travelPackage->category_id) == $category->id ? 'selected' : '' }}>
                                                               {{ $category->name }}
                                                           </option>
                                                       @endforeach
                                                   </select>
                                                   @error('category_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                               </div>
                                          </div>
                                           <div class="col-md-4">
                                               <div class="form-group">
                                                   <label for="tour_guide_id">Tour Guide (Optional)</label>
                                                   <select name="tour_guide_id" id="tour_guide_id" class="form-control @error('tour_guide_id') is-invalid @enderror">
                                                       <option value="">Select Tour Guide</option>
                                                       @foreach($guides as $guide)
                                                           <option value="{{ $guide->id }}" {{ old('tour_guide_id', $travelPackage->tour_guide_id) == $guide->id ? 'selected' : '' }}>
                                                               {{ $guide->name }}
                                                           </option>
                                                       @endforeach
                                                   </select>
                                                   @error('tour_guide_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                               </div>
                                          </div>
                                      </div>


                                    {{-- Itinerary, Included, Excluded Fields (using CKEditor) --}}
                                    <div class="form-group">
                                         <label for="itinerary">Itinerary (Optional)</label>
                                         <textarea class="form-control ckeditor @error('itinerary') is-invalid @enderror" name="itinerary" id="itinerary" rows="3" placeholder="Enter daily itinerary">{{ old('itinerary', $travelPackage->itinerary) }}</textarea>
                                         @error('itinerary') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                     </div>
                                     <div class="form-group">
                                         <label for="included">Included (Optional)</label>
                                         <textarea class="form-control ckeditor @error('included') is-invalid @enderror" name="included" id="included" rows="3" placeholder="List what is included in the package">{{ old('included', $travelPackage->included) }}</textarea>
                                         @error('included') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                     </div>
                                      <div class="form-group">
                                         <label for="excluded">Excluded (Optional)</label>
                                         <textarea class="form-control ckeditor @error('excluded') is-invalid @enderror" name="excluded" id="excluded" rows="3" placeholder="List what is excluded from the package">{{ old('excluded', $travelPackage->excluded) }}</textarea>
                                         @error('excluded') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                     </div>


                                </div> {{-- End col-md-8 --}}

                                {{-- Featured Image Section --}}
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Current Featured Image</label>
                                        <div class="mb-3">
                                            {{-- Display current featured image --}}
                                            @if($travelPackage->featured_image)
                                                <div class="current-image-container" style="background-image: url('{{ asset('storage/' . $travelPackage->featured_image) }}')">
                                                     <div class="image-overlay"></div> {{-- Optional overlay --}}
                                                </div>
                                            @else
                                                 {{-- Placeholder if no featured image --}}
                                                <div class="no-image-placeholder d-flex align-items-center justify-content-center">
                                                    <i class="fas fa-image fa-3x text-muted"></i>
                                                    <span class="ml-3 text-muted">No Featured Image</span>
                                                </div>
                                            @endif
                                        </div>
                                        {{-- Input for changing featured image --}}
                                        <label for="featured_image">Change Featured Image</label>
                                        <div class="custom-file rounded" style="overflow: hidden;"> {{-- Added rounded style --}}
                                            <input type="file"
                                                   class="custom-file-input @error('featured_image') is-invalid @enderror"
                                                   name="featured_image"
                                                   id="featured_image"> {{-- Added ID --}}
                                            <label class="custom-file-label" for="featured_image">Choose new image</label> {{-- Updated label text --}}
                                            @error('featured_image')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div> {{-- End col-md-4 --}}
                            </div> {{-- End row --}}

                            {{-- Update Button --}}
                            <div class="row mt-4"> {{-- Added mt-4 margin --}}
                                <div class="col-12">
                                    {{-- Button styled by app.blade.php --}}
                                    <button type="submit" class="btn btn-primary btn-lg px-5"> {{-- Added px-5 padding --}}
                                        <i class="fas fa-save mr-2"></i> Update Package
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div> {{-- End card-body --}}
                </div> {{-- End card --}}

            </div> {{-- End col-lg-12 --}}
        </div> {{-- End row --}}
    </div> {{-- End container-fluid --}}
</div> {{-- End content --}}

{{-- Bootstrap 4 Confirmation Modal (same as index page) --}}
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

@section('styles')
{{-- Add specific styles for the edit page --}}
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

    /* Custom CKEditor styling */
    .ck-editor__editable_inline {
        min-height: 200px;
        border-radius: 0.5rem; /* Match theme border radius */
        padding: 1rem;
        box-shadow: none !important; /* Remove CKEditor default shadow */
        border: 1px solid #ced4da; /* Default Bootstrap border */
        transition: border-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }
     .ck-editor__editable_inline:focus {
         border-color: var(--primary); /* Primary color on focus */
         box-shadow: 0 0 0 0.2rem rgba(var(--primary-rgb), 0.25); /* Bootstrap-like focus shadow */
     }
     /* Style for invalid CKEditor */
     .form-group .is-invalid + .ck-editor .ck.ck-editor__main > .ck-editor__editable {
         border-color: var(--danger) !important;
     }


    /* Custom File Input Label */
    .custom-file-label::after {
        content: "Browse"; /* Keep "Browse" text */
    }
     .custom-file {
         border-radius: 0.5rem; /* Match theme border radius */
     }
    .custom-file-label {
         border-radius: 0.5rem; /* Match theme border radius */
         transition: border-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }
     .custom-file-input:focus ~ .custom-file-label {
         border-color: var(--primary); /* Primary color on focus */
         box-shadow: 0 0 0 0.2rem rgba(var(--primary-rgb), 0.25); /* Bootstrap-like focus shadow */
     }
     /* Style for invalid custom file input */
     .custom-file-input.is-invalid ~ .custom-file-label {
          border-color: var(--danger) !important;
     }


    /* Gallery Image Thumbnail */
    .img-thumbnail.gallery-img {
        max-width: 80px; /* Slightly smaller thumbnail */
        max-height: 80px; /* Maintain aspect ratio */
        object-fit: cover;
        border-radius: 0.5rem; /* Rounded corners for thumbnails */
        padding: 0.25rem; /* Adjust padding */
        border: 1px solid rgba(0,0,0,0.1); /* Subtle border */
        transition: transform 0.2s ease;
    }
     .img-thumbnail.gallery-img:hover {
         transform: scale(1.05); /* Slight scale on hover */
     }


    /* Table Styling (Consistent with index page) */
    .table thead th {
        border-bottom: 1px solid rgba(0, 0, 0, 0.08);
        font-weight: 600;
        color: var(--dark);
        padding: 1rem 1.25rem;
    }

    .table tbody tr td {
         padding: 1rem 1.25rem;
         vertical-align: middle;
         border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }
     /* Last row no bottom border */
     .table tbody tr:last-child td {
         border-bottom: none;
     }

    /* Table Hover Effect */
    .table-hover tbody tr:hover {
        background-color: var(--light);
         box-shadow: 0 2px 10px rgba(0,0,0,0.03); /* Lighter shadow than cards */
    }

    /* Current Featured Image Container */
     .current-image-container {
         height: 200px; /* Fixed height */
         background-size: cover;
         background-position: center;
         position: relative;
         border-radius: 0.5rem; /* Rounded corners */
         overflow: hidden;
         margin-bottom: 1rem;
         border: 1px solid rgba(0,0,0,0.1); /* Subtle border */
         box-shadow: 0 2px 8px rgba(0,0,0,0.08);
     }

     /* No Image Placeholder for Featured Image */
    .no-image-placeholder {
         height: 200px;
         background: #e9ecef; /* Light gray background */
         color: rgba(0,0,0,0.4); /* Darker muted text */
         border-radius: 0.5rem;
         flex-direction: column; /* Stack icon and text */
         justify-content: center;
         align-items: center;
         margin-bottom: 1rem;
         border: 1px solid rgba(0,0,0,0.1);
         box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }
     .no-image-placeholder span {
         margin-top: 0.5rem;
         font-size: 0.9rem;
     }


    /* Action Buttons Styling (within table) */
    .table .btn-group .btn-sm {
        padding: 0.3rem 0.6rem; /* Adjust padding for table buttons */
        font-size: 0.8rem; /* Adjust font size */
        border-radius: 0.5rem; /* Rounded corners */
        transition: all 0.2s ease-in-out;
    }
    .table .btn-group .btn-sm:hover {
         transform: translateY(-1px); /* Slight lift */
         box-shadow: 0 2px 6px rgba(0,0,0,0.1); /* Subtle shadow */
    }

     /* Specific Outline Button Colors hover (within table) */
     /* Ensure these match the layout's outline button hover styles */
      .table .btn-outline-info:hover {
          background-color: var(--info) !important;
          color: var(--white) !important;
          border-color: var(--info) !important;
     }
      .table .btn-outline-danger:hover {
         background-color: var(--danger) !important;
         color: var(--white) !important;
         border-color: var(--danger) !important;
     }


    /* Form Control Styling */
     .form-control {
          border-radius: 0.5rem; /* Match theme border radius */
          transition: border-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
     }
     .form-control:focus {
          border-color: var(--primary); /* Primary color on focus */
          box-shadow: 0 0 0 0.2rem rgba(74,108,247,0.25); /* Bootstrap-like focus shadow */
     }
     /* Style for invalid form control */
     .form-control.is-invalid {
          border-color: var(--danger) !important;
     }


    /* Button Styling (Inherited from layout, ensure size/padding) */
    .btn {
         font-weight: 500; /* Semi-bold */
         transition: all 0.3s ease-in-out;
    }
    .btn-primary {
         background-color: var(--primary) !important;
         border-color: var(--primary) !important;
         border-radius: 0.75rem; /* Match layout primary button radius */
    }
    .btn-success {
         background-color: var(--success) !important;
         border-color: var(--success) !important;
         border-radius: 0.75rem; /* Consistent radius */
    }
     .btn-primary:hover, .btn-success:hover {
          transform: translateY(-2px);
          box-shadow: 0 5px 15px rgba(0,0,0,0.1);
     }


    /* Responsive adjustments */
     @media (max-width: 768px) {
         .content-header h1 {
             font-size: 1.5rem !important;
         }
         .card-header h3 {
              font-size: 1.2rem !important;
         }
          .img-thumbnail.gallery-img {
              max-width: 60px;
              max-height: 60px;
          }
          .table .btn-group .btn-sm {
              padding: 0.2rem 0.4rem;
              font-size: 0.7rem;
          }
          .btn-lg {
              padding: 0.5rem 1.5rem !important; /* Adjust large button padding */
              font-size: 1rem !important;
          }
     }


</style>
@endsection

@section('scripts')
{{-- CKEditor script is already here, ensure it's loading correctly --}}
<script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
<script>
    // Initialize CKEditor for description and other fields
    document.addEventListener('DOMContentLoaded', function() {
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
         // Initialize CKEditor for other optional textareas with class 'ckeditor'
        document.querySelectorAll('.ckeditor').forEach(textarea => {
             ClassicEditor
                 .create(textarea)
                 .catch(error => {
                     console.error(error);
                 });
        });


        // Update custom file input label
        document.querySelectorAll('.custom-file-input').forEach(input => {
            input.addEventListener('change', function(e) {
                const fileName = e.target.files[0]?.name || 'Choose file';
                const label = e.target.nextElementSibling;
                label.textContent = fileName;
            });
        });

        // Initialize tooltips (Bootstrap 4)
        $('[data-toggle="tooltip"]').tooltip();

        // Confirmation modal handling (Bootstrap 4) for gallery delete buttons
        let formToSubmit = null;
        $('#confirmationModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
             // Find the closest form to the button
            formToSubmit = button.closest('form');
        });

        $('#confirmAction').on('click', function () {
            if (formToSubmit) {
                formToSubmit.submit();
            }
            $('#confirmationModal').modal('hide');
        });

         // Attach click listener to gallery delete buttons to trigger modal
        $('.gallery-img-delete-btn').on('click', function(e) {
            e.preventDefault(); // Prevent default form submission
            // The modal 'show.bs.modal' event listener will handle setting formToSubmit
            $('#confirmationModal').modal('show');
        });

        // Note: Package archive/delete in index view uses a separate modal trigger.
        // If you want a confirmation modal for the "Update Package" button,
        // you would need to add similar logic targeting that button's form.
    });
</script>
@endsection