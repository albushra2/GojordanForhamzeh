@extends('layouts.app')
@section('title', isset($blog) ? 'Edit Blog' : 'Create Blog')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 d-flex justify-content-between">
                    <h1 class="m-0 text-dark">
                        {{ isset($blog) ? 'Edit Blog Post' : 'Create New Blog Post' }}
                    </h1>
                    <a href="{{ route('admin.blogs.index') }}" class="btn btn-primary">
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
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Blog Information</h3>
                        </div>
                        <form method="post" 
                              action="{{ isset($blog) ? route('admin.blogs.update', [$blog]) : route('admin.blogs.store') }}" 
                              enctype="multipart/form-data">
                            @csrf 
                            @if(isset($blog)) @method('put') @endif
                            
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                           name="title" id="title" 
                                           value="{{ old('title', $blog->title ?? '') }}" 
                                           placeholder="Enter blog title">
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="category_id">Category</label>
                                    <select class="form-control @error('category_id') is-invalid @enderror" 
                                            name="category_id" id="category_id">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ (old('category_id', $blog->category_id ?? '') == $category->id) ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="image">Featured Image</label>
                                    <div class="custom-file">
                                        <input type="file" 
                                               class="custom-file-input @error('image') is-invalid @enderror" 
                                               name="image" id="image"
                                               {{ !isset($blog) ? 'required' : '' }}>
                                        <label class="custom-file-label" for="image">
                                            Choose file (JPEG, PNG, JPG, GIF, WEBP)
                                        </label>
                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    @if(isset($blog) && $blog->image)
                                        <div class="mt-2">
                                            <img src="{{ Storage::url($blog->image) }}" 
                                                 class="img-thumbnail" width="150" alt="Current image">
                                            <small class="form-text text-muted">
                                                Current image. Upload a new one to replace it.
                                            </small>
                                        </div>
                                    @endif
                                </div>
                                
                                <div class="form-group">
                                    <label for="excerpt">Excerpt</label>
                                    <textarea class="form-control @error('excerpt') is-invalid @enderror" 
                                              name="excerpt" id="excerpt" 
                                              rows="3" placeholder="Short description">{{ old('excerpt', $blog->excerpt ?? '') }}</textarea>
                                    <small class="form-text text-muted">
                                        A short summary of your blog post (max 500 characters).
                                    </small>
                                    @error('excerpt')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="description">Content</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" 
                                              name="description" id="description" 
                                              rows="10">{{ old('description', $blog->description ?? '') }}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Save
                                </button>
                                <button type="reset" class="btn btn-secondary">
                                    <i class="fas fa-undo"></i> Reset
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
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .card-primary {
        border-top: 3px solid #6610f2;
    }
    .ck-editor__editable_inline {
        min-height: 300px;
        color: #495057;
    }
    .custom-file-label::after {
        content: "Browse";
    }
    .img-thumbnail {
        transition: all 0.3s ease;
    }
    .img-thumbnail:hover {
        transform: scale(1.03);
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    }
</style>
@endsection

@section('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        // Initialize CKEditor
        ClassicEditor
            .create(document.querySelector('#description'), {
                toolbar: {
                    items: [
                        'heading', '|',
                        'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|',
                        'blockQuote', 'insertTable', 'undo', 'redo', '|',
                        'codeBlock', 'imageUpload'
                    ]
                }
            })
            .catch(error => {
                console.error(error);
            });
            
        // Initialize Select2 for category select
        $('#category_id').select2({
            placeholder: "Select a category",
            allowClear: true
        });
        
        // Show filename when file is selected
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
    });
</script>
@endsection