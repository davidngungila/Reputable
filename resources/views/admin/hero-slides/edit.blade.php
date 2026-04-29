@extends('layouts.admin')

@section('title', 'Edit Hero Slide')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Edit Hero Slide</h1>
        <div>
            <a href="{{ route('admin.hero-slides.index') }}" class="btn btn-outline-primary">
                <i class="fas fa-arrow-left me-2"></i>Back to Slides
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Slide Information</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.hero-slides.update', $slide->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                           id="title" name="title" value="{{ old('title', $slide->title) }}" required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="position" class="form-label">Position <span class="text-danger">*</span></label>
                                    <select class="form-select @error('position') is-invalid @enderror" 
                                            id="position" name="position" required>
                                        <option value="">Select Position</option>
                                        @foreach($positions as $position)
                                        <option value="{{ $position }}" {{ old('position', $slide->position) == $position ? 'selected' : '' }}>
                                            {{ ucfirst($position) }} Page
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('position')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="subtitle" class="form-label">Subtitle</label>
                            <textarea class="form-control @error('subtitle') is-invalid @enderror" 
                                      id="subtitle" name="subtitle" rows="2">{{ old('subtitle', $slide->subtitle) }}</textarea>
                            @error('subtitle')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image_url" class="form-label">Image URL <span class="text-danger">*</span></label>
                            <input type="url" class="form-control @error('image_url') is-invalid @enderror" 
                                   id="image_url" name="image_url" value="{{ old('image_url', $slide->image_url) }}" required>
                            @error('image_url')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Enter the full URL to the hero image (Cloudinary URL recommended)</small>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="button_text" class="form-label">Button Text</label>
                                    <input type="text" class="form-control @error('button_text') is-invalid @enderror" 
                                           id="button_text" name="button_text" value="{{ old('button_text', $slide->button_text) }}">
                                    @error('button_text')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="button_url" class="form-label">Button URL</label>
                                    <input type="url" class="form-control @error('button_url') is-invalid @enderror" 
                                           id="button_url" name="button_url" value="{{ old('button_url', $slide->button_url) }}">
                                    @error('button_url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="sort_order" class="form-label">Sort Order</label>
                                    <input type="number" class="form-control @error('sort_order') is-invalid @enderror" 
                                           id="sort_order" name="sort_order" value="{{ old('sort_order', $slide->sort_order) }}" min="0">
                                    @error('sort_order')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">Lower numbers appear first</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-check form-switch mt-4">
                                        <input class="form-check-input @error('is_active') is-invalid @enderror" 
                                               type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $slide->is_active) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_active">
                                            Active
                                        </label>
                                        @error('is_active')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.hero-slides.index') }}" class="btn btn-secondary">
                                Cancel
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Update Slide
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Current Preview</h5>
                </div>
                <div class="card-body">
                    <div id="slide-preview" class="border rounded p-3" style="min-height: 200px; background: url('{{ $slide->image_url }}') center/cover;">
                        <div class="d-flex flex-column justify-content-center align-items-center h-100 text-center text-white" style="background: rgba(0,0,0,0.5);">
                            <h4 id="preview-title" class="mb-2">{{ $slide->title }}</h4>
                            <p id="preview-subtitle" class="mb-3">{{ $slide->subtitle ?: 'Slide subtitle appears here' }}</p>
                            @if($slide->button_text)
                            <button id="preview-button" class="btn btn-primary">{{ $slide->button_text }}</button>
                            @else
                            <button id="preview-button" class="btn btn-primary" style="display: none;">Button Text</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header">
                    <h5 class="mb-0">Slide Details</h5>
                </div>
                <div class="card-body">
                    <table class="table table-sm">
                        <tr>
                            <td><strong>ID:</strong></td>
                            <td>{{ $slide->id }}</td>
                        </tr>
                        <tr>
                            <td><strong>Position:</strong></td>
                            <td>{{ ucfirst($slide->position) }}</td>
                        </tr>
                        <tr>
                            <td><strong>Status:</strong></td>
                            <td>
                                <span class="badge {{ $slide->is_active ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $slide->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Created:</strong></td>
                            <td>{{ $slide->created_at->format('M d, Y') }}</td>
                        </tr>
                        <tr>
                            <td><strong>Updated:</strong></td>
                            <td>{{ $slide->updated_at->format('M d, Y') }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header">
                    <h5 class="mb-0">Guidelines</h5>
                </div>
                <div class="card-body">
                    <ul class="small text-muted">
                        <li>• Use high-quality images (minimum 1920x1080)</li>
                        <li>• Keep titles concise and impactful</li>
                        <li>• Subtitles should complement the title</li>
                        <li>• Button text should be action-oriented</li>
                        <li>• Use Cloudinary URLs for best performance</li>
                        <li>• Test slides on different screen sizes</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Live preview functionality
document.getElementById('title').addEventListener('input', function(e) {
    const preview = document.getElementById('preview-title');
    preview.textContent = e.target.value || 'Slide Title';
});

document.getElementById('subtitle').addEventListener('input', function(e) {
    const preview = document.getElementById('preview-subtitle');
    preview.textContent = e.target.value || 'Slide subtitle appears here';
});

document.getElementById('image_url').addEventListener('input', function(e) {
    const preview = document.getElementById('slide-preview');
    if (e.target.value) {
        preview.style.backgroundImage = `url('${e.target.value}')`;
    } else {
        preview.style.backgroundImage = `url('{{ $slide->image_url }}')`;
    }
});

document.getElementById('button_text').addEventListener('input', function(e) {
    const preview = document.getElementById('preview-button');
    if (e.target.value) {
        preview.textContent = e.target.value;
        preview.style.display = 'inline-block';
    } else {
        preview.style.display = 'none';
    }
});
</script>
@endsection
