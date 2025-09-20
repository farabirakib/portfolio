@extends('backend.layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Skills Management</h2>
        <a href="{{ route('admin.skills.create') }}" class="btn btn-success">+ Add Skill</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Icon</th>
                <th>Color</th>
                <th>Percent</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($skills as $skill)
            <tr>
                <td>{{ $skill->name }}</td>
                <td><i class="fab {{ $skill->icon }}"></i></td>
                <td><span class="badge bg-{{ $skill->color }}">{{ $skill->color }}</span></td>
                <td>{{ $skill->percent }}%</td>
                <td>
                    <a href="{{ route('admin.skills.edit', $skill) }}" class="btn btn-warning btn-sm">Edit</a>
                    <button class="btn btn-danger btn-sm delete-btn" data-id="{{ $skill->id }}" data-url="{{ route('admin.skills.destroy', $skill->id) }}">
                        <i class="bi bi-trash"></i> Delete
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
