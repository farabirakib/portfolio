<div class="sidebar">
    <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <i class="fas fa-tachometer-alt me-2"></i> Dashboard
    </a>

    <a href="{{ route('admin.contacts.index') }}"
        class="{{ request()->routeIs('admin.contacts.index') ? 'active' : '' }}">
        <i class="fas fa-envelope me-2"></i> Messages
    </a>

    <a href="{{ route('admin.about.index') }}" class="{{ request()->routeIs('admin.about.index') ? 'active' : '' }}">
        <i class="fas fa-users me-2"></i>About</a>
    <a href="{{ route('admin.projects.index') }}"
        class="{{ request()->routeIs('admin.projects.index') ? 'active' : '' }}">
        <i class="fas fa-briefcase me-2"></i> Projects
    </a>

    <a href="{{ route('admin.skills.index') }}" class="{{ request()->routeIs('admin.skills.*') ? 'active' : '' }}">
        <i class="fas fa-lightbulb me-2"></i> Skills
    </a>

    <a href="#"><i class="fas fa-cogs me-2"></i> Settings</a>
</div>