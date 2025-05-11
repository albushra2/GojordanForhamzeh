{{-- @extends('layouts.app')
@section('title', 'Add Gallery Images')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12 justify-content-between d-flex">
                <h1 class="m-0 text-gradient">
                    <i class="fas fa-images mr-2"></i> Add Images to {{ $travelPackage->title }}
                </h1>
                <a href="{{ route('admin.travel_packages.edit', $travelPackage->id) }}" 
                   class="btn btn-primary btn-pill">
                    <i class="fas fa-arrow-left"></i> Back to Package
                </a>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="card card-glass">
                    <div class="card-header">
                        <h3 class="card-title">Upload Images</h3>
                    </div>
                    <form id="galleryForm" method="POST" 
                          action="{{ route('admin.travel_packages.galleries.store', $travelPackage) }}" 
                          enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <div class="dropzone" id="imageDropzone">
                                    <div class="dz-message">
                                        <i class="fas fa-cloud-upload-alt fa-3x mb-3"></i>
                                        <h5>Drag & drop images here or click to browse</h5>
                                        <span class="text-muted">(Maximum 10 images, 2MB each)</span>
                                    </div>
                                </div>
                                <input type="file" name="images[]" id="images" multiple 
                                       style="display: none;" accept="image/*">
                                <div id="imagePreviews" class="row mt-3"></div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary btn-pill" id="submitBtn">
                                <i class="fas fa-upload mr-1"></i> Upload Images
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card card-glass">
                    <div class="card-header">
                        <h3 class="card-title">Existing Images</h3>
                    </div>
                    <div class="card-body">
                        @if($galleries->isEmpty())
                            <div class="empty-state">
                                <i class="fas fa-image fa-3x mb-3"></i>
                                <p>No images uploaded yet</p>
                            </div>
                        @else
                            <div class="row">
                                @foreach($galleries as $gallery)
                                <div class="col-6 mb-3">
                                    <div class="gallery-thumbnail">
                                        <img src="{{ Storage::url($gallery->image) }}" 
                                             class="img-fluid rounded" 
                                             alt="{{ $gallery->name }}">
                                        <div class="thumbnail-actions">
                                            <a href="{{ route('admin.travel_packages.galleries.edit', [$travelPackage, $gallery]) }}"
                                               class="btn btn-sm btn-info" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.travel_packages.galleries.destroy', [$travelPackage, $gallery]) }}" 
                                                  method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css">
<style>
    .text-gradient {
        background: linear-gradient(to right, #667eea, #764ba2);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
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
    
    .dropzone {
        border: 2px dashed #667eea;
        border-radius: 10px;
        padding: 2rem;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
        background: rgba(102, 126, 234, 0.05);
    }
    
    .dropzone:hover {
        background: rgba(102, 126, 234, 0.1);
    }
    
    .dz-message i {
        color: #667eea;
    }
    
    .gallery-thumbnail {
        position: relative;
        overflow: hidden;
        border-radius: 8px;
        height: 120px;
    }
    
    .gallery-thumbnail img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }
    
    .gallery-thumbnail:hover img {
        transform: scale(1.05);
    }
    
    .thumbnail-actions {
        position: absolute;
        bottom: -50px;
        left: 0;
        right: 0;
        background: rgba(0, 0, 0, 0.7);
        padding: 5px;
        display: flex;
        justify-content: center;
        gap: 5px;
        transition: bottom 0.3s ease;
    }
    
    .gallery-thumbnail:hover .thumbnail-actions {
        bottom: 0;
    }
    
    .empty-state {
        text-align: center;
        padding: 20px;
        color: #6c757d;
    }
    
    .preview-container {
        position: relative;
        margin-bottom: 15px;
    }
    
    .preview-image {
        border-radius: 8px;
        height: 120px;
        width: 100%;
        object-fit: cover;
    }
    
    .remove-preview {
        position: absolute;
        top: 5px;
        right: 5px;
        background: rgba(255, 0, 0, 0.7);
        color: white;
        border: none;
        border-radius: 50%;
        width: 25px;
        height: 25px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>
<script>
    $(document).ready(function() {
        // Initialize Dropzone
        Dropzone.autoDiscover = false;
        const dropzone = new Dropzone("#imageDropzone", {
            url: "#",
            autoProcessQueue: false,
            uploadMultiple: true,
            parallelUploads: 10,
            maxFiles: 10,
            maxFilesize: 2,
            acceptedFiles: "image/*",
            addRemoveLinks: false,
            dictDefaultMessage: "",
            init: function() {
                this.on("addedfile", function(file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const preview = `
                            <div class="col-md-4 preview-container">
                                <img src="${e.target.result}" class="preview-image">
                                <button type="button" class="remove-preview" data-file-name="${file.name}">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        `;
                        $('#imagePreviews').append(preview);
                    };
                    reader.readAsDataURL(file);
                });
            }
        });

        // Handle remove preview button
        $(document).on('click', '.remove-preview', function() {
            const fileName = $(this).data('file-name');
            const files = dropzone.getAcceptedFiles();
            
            // Remove file from Dropzone
            files.forEach(file => {
                if (file.name === fileName) {
                    dropzone.removeFile(file);
                }
            });
            
            // Remove preview
            $(this).parent().remove();
        });

        // Form submission
        $('#galleryForm').submit(function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const files = dropzone.getAcceptedFiles();
            
            if (files.length === 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'No Images',
                    text: 'Please select at least one image to upload',
                });
                return;
            }
            
            // Append files to form data
            files.forEach((file, index) => {
                formData.append(`images[${index}]`, file);
            });
            
            // Show loading state
            $('#submitBtn').prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Uploading...');
            
            // Submit form via AJAX
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: response.success,
                        timer: 3000,
                        showConfirmButton: false
                    }).then(() => {
                        window.location.href = "{{ route('admin.travel_packages.edit', $travelPackage->id) }}";
                    });
                },
                error: function(xhr) {
                    $('#submitBtn').prop('disabled', false).html('<i class="fas fa-upload mr-1"></i> Upload Images');
                    
                    let errorMessage = xhr.responseJSON.message || 'An error occurred during upload';
                    if (xhr.responseJSON.errors) {
                        errorMessage = Object.values(xhr.responseJSON.errors).join('<br>');
                    }
                    
                    Swal.fire({
                        icon: 'error',
                        title: 'Upload Failed',
                        html: errorMessage,
                    });
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
                showConfirmButton: false
            });
        @endif
    });
</script>
@endsection --}}