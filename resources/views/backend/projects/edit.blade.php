@extends('backend.layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Project</h2>
    <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Project Title</label>
            <input type="text" name="title" class="form-control" value="{{ $project->title }}" required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Project Image</label>
            @if($project->image)
                <img src="{{ asset($project->image) }}" width="100" class="mb-2 d-block">
            @endif
            <input type="file" name="image" class="form-control">
        </div>

        <div class="mb-3">
            <label for="short_description" class="form-label">Short Description</label>
            <textarea name="short_description" class="form-control" rows="4" required>{{ $project->short_description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="project_link" class="form-label">Project Link</label>
            <input type="url" name="project_link" class="form-control" value="{{ $project->project_link }}">
        </div>

        <button type="submit" class="btn btn-primary">Update Project</button>
    </form>
</div>
@endsection
