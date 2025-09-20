@extends('backend.layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="m-0">All Projects</h2>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-success">
            + Create Project
        </a>
    </div>

    <table class="table table-bordered align-middle">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Image</th>
                <th>Short Description</th>
                <th>Link</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($projects as $project)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $project->title }}</td>
                <td>
                    @if($project->image)
                    <img src="{{ asset($project->image) }}" style="width: 80px; height: 80px; object-fit: cover;">
                    @else
                    N/A
                    @endif
                </td>
                <td style="max-width: 300px;">{{ \Illuminate\Support\Str::limit($project->short_description, 100) }}
                </td>
                <td>
                    @if($project->project_link)
                    <a href="{{ $project->project_link }}" target="_blank">Visit</a>
                    @else
                    N/A
                    @endif
                </td>
                <td>{{ $project->created_at->format('d M Y') }}</td>
                <td>
                    <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    
                    <button class="btn btn-danger btn-sm delete-btn" data-id="{{ $project->id }}" data-name="Project"
                        data-url="{{ route('admin.projects.destroy', $project->id) }}">
                        <i class="bi bi-trash"></i> Delete
                    </button>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7">No projects found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    @endsection