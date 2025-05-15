@extends('layouts.app')

@section('title', 'Create Travel Package')

@section('content')
{{-- Content Header for the page title and back button --}}
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12 d-flex justify-content-between align-items-center"> {{-- Added align-items-center --}}
                <h1 class="m-0" style="font-size: 1.8rem; font-weight: 600;">{{ __('Create Travel Package') }}</h1>
                {{-- Button styled by app.blade.php and custom styles --}}
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
                {{-- Card with shadow, border radius, and padding --}}
                <div class="card shadow-lg" style="border-radius: 0.75rem;">
                    {{-- Card Body with Form --}}
                    <div class="card-body p-4"> {{-- Adjusted padding --}}
                        <form method="post" action="{{ route('admin.travel_packages.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                {{-- Left Column for main details --}}
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="title">Package Title</label>
                                         {{-- Form control styled by app.blade.php and custom styles --}}
                                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                                                name="title" value="{{ old('title') }}" required
                                                placeholder="Enter package title"> {{-- Added placeholder --}}
                                        @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Description</label>
                                         {{-- CKEditor textarea --}}
                                        <textarea class="form-control ckeditor @error('description') is-invalid @enderror"
                                                    name="description" id="description" rows="5"
                                                    placeholder="Enter package description">{{ old('description') }}</textarea> {{-- Added placeholder --}}
                                        @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>

                                     {{-- Row for Type and Location --}}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="type">Tour Type</label>
                                                 {{-- Form control styled by app.blade.php and custom styles --}}
                                                <input type="text" class="form-control @error('type') is-invalid @enderror"
                                                        name="type" value="{{ old('type') }}" required
                                                        placeholder="e.g., Religious, Adventure"> {{-- Added placeholder --}}
                                                @error('type')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="location">Location</label>
                                                 {{-- Form control styled by app.blade.php and custom styles --}}
                                                <input type="text" class="form-control @error('location') is-invalid @enderror"
                                                        name="location" value="{{ old('location') }}" required
                                                        placeholder="e.g., Petra, Wadi Rum"> {{-- Added placeholder --}}
                                                @error('location')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                    </div> {{-- End row --}}

                                </div> {{-- End col-md-8 --}}

                                {{-- Right Column for image and other details --}}
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="featured_image">Featured Image</label>
                                         {{-- Custom file input styled by custom CSS --}}
                                        <div class="custom-file rounded" style="overflow: hidden;"> {{-- Added rounded style --}}
                                            <input type="file" class="custom-file-input @error('featured_image') is-invalid @enderror"
                                                    name="featured_image" id="featured_image" required>
                                            <label class="custom-file-label" for="featured_image">Choose featured image</label> {{-- Updated label text --}}
                                            @error('featured_image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="category_id">Category</label>
                                         {{-- Select styled by app.blade.php and custom styles --}}
                                        <select class="form-control @error('category_id') is-invalid @enderror"
                                                name="category_id" required>
                                             <option value="">Select Category</option> {{-- Added default option --}}
                                            @foreach($categories as $category)
                                                 {{-- Maintain old value if validation fails --}}
                                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="tour_guide_id">Tour Guide (Optional)</label>
                                         {{-- Select styled by app.blade.php and custom styles --}}
                                        <select class="form-control @error('tour_guide_id') is-invalid @enderror"
                                                name="tour_guide_id">
                                             <option value="">Select Tour Guide</option> {{-- Added default option --}}
                                            @foreach($guides as $guide)
                                                 {{-- Maintain old value if validation fails --}}
                                                <option value="{{ $guide->id }}" {{ old('tour_guide_id') == $guide->id ? 'selected' : '' }}>
                                                    {{ $guide->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('tour_guide_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="price">Price ($)</label>
                                         {{-- Form control styled by app.blade.php and custom styles --}}
                                        <input type="number" class="form-control @error('price') is-invalid @enderror"
                                                name="price" value="{{ old('price') }}" min="0" required
                                                placeholder="e.g., 500"> {{-- Added placeholder --}}
                                        @error('price')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="duration_days">Duration (Days)</label>
                                         {{-- Form control styled by app.blade.php and custom styles --}}
                                        <input type="number" class="form-control @error('duration_days') is-invalid @enderror"
                                                name="duration_days" value="{{ old('duration_days') }}" min="1" required
                                                placeholder="e.g., 3"> {{-- Added placeholder --}}
                                        @error('duration_days')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div> {{-- End col-md-4 --}}
                            </div> {{-- End row --}}

                             {{-- Full Width Fields (Itinerary, Included, Excluded) --}}
                             <div class="row mt-4"> {{-- Added mt-4 margin --}}
                                 <div class="col-md-12">
                                     <div class="form-group">
                                         <label for="itinerary">Itinerary (Optional)</label>
                                          {{-- CKEditor textarea --}}
                                         <textarea class="form-control ckeditor @error('itinerary') is-invalid @enderror"
                                                   name="itinerary" id="itinerary" rows="3"
                                                   placeholder="Enter daily itinerary">{{ old('itinerary') }}</textarea>
                                         @error('itinerary')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                     </div>

                                     <div class="form-group">
                                         <label for="included">What's Included (Optional)</label>
                                          {{-- CKEditor textarea --}}
                                         <textarea class="form-control ckeditor @error('included') is-invalid @enderror"
                                                   name="included" id="included" rows="3"
                                                   placeholder="List what is included in the package">{{ old('included') }}</textarea>
                                         @error('included')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                     </div>

                                     <div class="form-group">
                                         <label for="excluded">What's Excluded (Optional)</label>
                                          {{-- CKEditor textarea --}}
                                         <textarea class="form-control ckeditor @error('excluded') is-invalid @enderror"
                                                   name="excluded" id="excluded" rows="3"
                                                   placeholder="List what is excluded from the package">{{ old('excluded') }}</textarea>
                                         @error('excluded')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                     </div>
                                 </div> {{-- End col-md-12 --}}
                             </div> {{-- End row --}}


                            {{-- Submit Button --}}
                            <div class="row mt-4"> {{-- Added mt-4 margin --}}
                                <div class="col-12">
                                     {{-- Button styled by app.blade.php --}}
                                    <button type="submit" class="btn btn-success btn-lg px-5"> {{-- Added px-5 padding --}}
                                        <i class="fas fa-save mr-2"></i> Create Package
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
@endsection

@section('styles')
{{-- Add specific styles for the create page --}}
<style>
    /* Inherit variables from app.blade.php */
    :root {
        --primary: #4a6cf7;
        --danger: #ef4444;
    }

     /* Custom CKEditor styling (consistent with edit page) */
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


    /* Custom File Input Label (consistent with edit page) */
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


    /* Form Control Styling (consistent with edit page) */
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
         background-color: var(--success) !important; /* Use success variable */
         border-color: var(--success) !important; /* Use success variable */
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
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize CKEditor for all textareas with the class 'ckeditor'
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
    });
</script>
@endsection