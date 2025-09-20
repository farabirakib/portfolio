@extends('backend.layouts.app')

@section('content')
<div class="container">
    <h2>Edit Skill</h2>
    <form id="editSkillForm" action="{{ route('admin.skills.update', $skill) }}" method="POST">
        @csrf 
        @method('PUT')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ $skill->name }}" required>
        </div>

        <div class="mb-3">
            <label>Icon (Select from FontAwesome)</label>
            <select name="icon" id="iconSelect" class="form-control">
                <option value="">-- Select Icon --</option>
                <option value="fa-html5" {{ $skill->icon == 'fa-html5' ? 'selected' : '' }}>HTML5</option>
                <option value="fa-css3-alt" {{ $skill->icon == 'fa-css3-alt' ? 'selected' : '' }}>CSS3</option>
                <option value="fa-js" {{ $skill->icon == 'fa-js' ? 'selected' : '' }}>JavaScript</option>
                <option value="fa-php" {{ $skill->icon == 'fa-php' ? 'selected' : '' }}>PHP</option>
                <option value="fa-laravel" {{ $skill->icon == 'fa-laravel' ? 'selected' : '' }}>Laravel</option>
                <option value="fa-database" {{ $skill->icon == 'fa-database' ? 'selected' : '' }}>MySQL</option>
                <option value="fa-bootstrap" {{ $skill->icon == 'fa-bootstrap' ? 'selected' : '' }}>Bootstrap</option>
            </select>

            <!-- Live Preview -->
            <div class="mt-3">
                <i id="iconPreview" class="fab {{ $skill->icon }} fa-2x text-primary"></i>
            </div>
        </div>

        <div class="mb-3">
            <label>Color (Bootstrap color class)</label>
            <select name="color" class="form-control">
                <option value="primary" {{ $skill->color == 'primary' ? 'selected' : '' }}>Primary</option>
                <option value="secondary" {{ $skill->color == 'secondary' ? 'selected' : '' }}>Secondary</option>
                <option value="success" {{ $skill->color == 'success' ? 'selected' : '' }}>Success</option>
                <option value="danger" {{ $skill->color == 'danger' ? 'selected' : '' }}>Danger</option>
                <option value="warning" {{ $skill->color == 'warning' ? 'selected' : '' }}>Warning</option>
                <option value="info" {{ $skill->color == 'info' ? 'selected' : '' }}>Info</option>
                <option value="dark" {{ $skill->color == 'dark' ? 'selected' : '' }}>Dark</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Percent</label>
            <input type="number" name="percent" class="form-control" min="0" max="100" value="{{ $skill->percent }}" required>
        </div>

        <button id="updateBtn" class="btn btn-success">
            <span class="spinner-border spinner-border-sm d-none"></span>
            Update
        </button>
    </form>
</div>
@endsection