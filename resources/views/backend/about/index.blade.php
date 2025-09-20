@extends('backend.layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="m-0">All About Entries</h2>
        <a href="{{ route('admin.about.create') }}" class="btn btn-success">
            + Create About
        </a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th> {{-- Row number column --}}
                <th>Description</th>
                <th>Image</th>
                <th>CV Link</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($abouts as $about)
            <tr>
                <td>{{ $loop->iteration }}</td> {{-- Auto-incrementing row number --}}
                <td>{{ Str::limit($about->description, 100) }}</td>
                <td>
                    @if($about->image)
                    <img src="{{ asset($about->image) }}" width="80" height="80" style="object-fit: cover;">
                    @else
                    N/A
                    @endif
                </td>
                <td>
                    @if($about->cv_link)
                    <a href="{{ $about->cv_link }}" target="_blank">CV</a>
                    @else
                    N/A
                    @endif
                </td>
                <td>{{ $about->created_at->format('d M Y') }}</td>
                <td>
                    <a href="{{ route('admin.about.edit', $about->id) }}" class="btn btn-sm btn-warning">Edit</a>
                
                    <button class="btn btn-danger btn-sm delete-btn" data-id="{{ $about->id }}" data-name="About"
                        data-url="{{ route('admin.about.destroy', $about->id) }}">
                        <i class="bi bi-trash"></i> Delete
                    </button>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6">No about info found.</td>
            </tr> {{-- Updated colspan to match new column count --}}
            @endforelse
        </tbody>
    </table>
</div>
@endsection