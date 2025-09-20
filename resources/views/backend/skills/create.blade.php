@extends('backend.layouts.app')

@section('content')
<div class="container">
    <h2>Add Skill</h2>
    <form id="skillForm" action="{{ route('admin.skills.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Icon (Select from FontAwesome)</label>
            <select name="icon" id="iconSelect" class="form-control">
                <option value="">-- Select Icon --</option>
                <option value="fa-html5">HTML5</option>
                <option value="fa-css3-alt">CSS3</option>
                <option value="fa-js">JavaScript</option>
                <option value="fa-php">PHP</option>
                <option value="fa-laravel">Laravel</option>
                <option value="fa-database">MySQL</option>
                <option value="fa-bootstrap">Bootstrap</option>
            </select>

            <!-- Live Preview -->
            <div class="mt-3">
                <i id="iconPreview" class="fab fa-2x text-secondary"></i>
            </div>
        </div>

        <div class="mb-3">
            <label>Color (Bootstrap color class)</label>
            <select name="color" class="form-control">
                <option value="primary">Primary</option>
                <option value="secondary">Secondary</option>
                <option value="success">Success</option>
                <option value="danger">Danger</option>
                <option value="warning">Warning</option>
                <option value="info">Info</option>
                <option value="dark">Dark</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Percent</label>
            <input type="number" name="percent" class="form-control" min="0" max="100" required>
        </div>

        <button type="submit" id="saveBtn" class="btn btn-success">
        <span class="spinner-border spinner-border-sm d-none"></span>
        Save
    </button>
    </form>
</div>
@endsection



