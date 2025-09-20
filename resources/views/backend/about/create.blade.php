@extends('backend.layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Add About Info</h2>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.about.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="5" required>{{ old('description') }}</textarea>
            @error('description')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <div class="mb-3">
            <label>Image (optional)</label>
            <input type="file" name="image" class="form-control">
            @error('image')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <div class="mb-3">
            <label>Upload CV (PDF)</label>
            <input type="file" name="cv_link" class="form-control" accept="application/pdf">
            @error('cv_link')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection