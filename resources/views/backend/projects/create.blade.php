@extends('backend.layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Add New Project</h2>
    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Project Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Project Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <div class="mb-3">
            <label for="short_description" class="form-label">Short Description</label>
            <textarea name="short_description" class="form-control" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <label for="project_link" class="form-label">Project Link</label>
            <input type="url" name="project_link" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Save Project</button>
    </form>
</div>
@endsection
