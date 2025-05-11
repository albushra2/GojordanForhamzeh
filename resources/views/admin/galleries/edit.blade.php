{{-- @extends('layouts.app')
@section('title', 'Edit Gallery Image')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 justify-content-between d-flex">
                    <h1 class="m-0 text-gradient">
                        <i class="fas fa-edit mr-2"></i> Edit Image
                    </h1>
                    <a href="{{ route('admin.travel_packages.galleries.create', $travelPackage->id)  }}" class="btn btn-primary btn-pill">
                        <i class="fas fa-arrow-left"></i> Back
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
                    <div class="card card-glass">
                        <div class="card-header">
                            <h3 class="card-title">Image Details</h3>
                        </div>
                        <form method="post" action="{{ route('admin.travel_packages.galleries.update', [$travelPackage->id, $gallery->id]) }}" enctype="multipart/form-data">                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Image Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                           name="name" id="name" value="{{ old('name', $gallery->name) }}" 
                                           placeholder="Enter image name">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="image">Replace Image</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input @error('image') is-invalid @enderror" 
                                               name="image" id="image">
                                        <label class="custom-file-label" for="image">Choose new image</label>
                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <small class="form-text text-muted">Leave empty to keep current image (max 2MB)</small>
                                    
                                    <div class="mt-3">
                                        <p>Current Image:</p>
                                        <a href="{{ Storage::url($gallery->image) }}" data-toggle="lightbox">
                                            <img src="{{ Storage::url($gallery->image) }}" class="img-thumbnail" width="200" alt="Current image">
                                        </a>
                                    </div>
                                </div>
                                
                                <div class="image-preview mb-3" id="imagePreview" style="display: none;">
                                    <p>New Image Preview:</p>
                                    <img id="previewImage" src="#" alt="Image Preview" 
                                         class="img-thumbnail" width="200">
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary btn-pill">
                                    <i class="fas fa-save mr-1"></i> Update
                                </button>
                            </div>
                        </form>
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
        background: linear-gradient(to right, #667eea, #764ba2);
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
    
    .btn-pill {
        border-radius: 50px;
        padding: 0.5rem 1.5rem;
    }
    
    .custom-file-label::after {
        content: "Browse";
        background: #667eea;
        color: white;
        border-left: 1px solid #667eea;
    }
    
    .img-thumbnail {
        border-radius: 8px;
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        transition: all 0.3s ease;
    }
    
    .img-thumbnail:hover {
        transform: scale(1.02);
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    }
</style>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>
<script>
    $(document).ready(function() {
        // Image preview
        $('#image').change(function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    $('#previewImage').attr('src', e.target.result);
                    $('#imagePreview').show();
                }
                
                reader.readAsDataURL(file);
            }
        });
        
        // Show filename when file is selected
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
        
        // Lightbox for current image
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox({
                alwaysShowClose: true
            });
        });
    });
</script>
@endsection --}}