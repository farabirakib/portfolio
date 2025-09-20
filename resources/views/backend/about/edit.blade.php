@extends('backend.layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Edit About Info</h2>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.about.update', $about->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="5"
                required>{{ old('description', $about->description) }}</textarea>
            @error('description')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <div class="mb-3">
            <label>Current Image</label><br>
            @if($about->image)
            <img src="{{ asset($about->image) }}" width="100" class="mb-2">
            @else
            <p>No image uploaded.</p>
            @endif
        </div>

        <div class="mb-3">
            <label>Change Image (optional)</label>
            <input type="file" name="image" class="form-control">
            @error('image')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <div class="mb-3">
            <label>Upload New CV (PDF)</label>
            <input type="file" name="cv_link" class="form-control" accept="application/pdf">
            @error('cv_link')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        {{-- Show existing CV download link if exists --}}
        @if($about->cv_link)
        <div class="mb-3">
            <label>Current CV:</label><br>
            <a href="{{ asset($about->cv_link) }}" class="btn btn-sm btn-success" target="_blank" download>Download
                Current CV</a>
        </div>
        @endif

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection