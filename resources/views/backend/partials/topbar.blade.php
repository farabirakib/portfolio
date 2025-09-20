<nav class="navbar navbar-dark bg-black shadow-sm sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('frontend.home')}}">My Admin</a>
        <div class="dropdown">
            <a class="text-white text-decoration-none" href="#" role="button" data-bs-toggle="dropdown">
                <i class="fas fa-user-circle"></i>
                <span class="user-name">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li>
                    <!-- <hr class="dropdown-divider"> -->
                </li>
                <li>
                    <form action="{{route('logout')}}" method="POST" class="dropdown-item p-0">
                        @csrf
                        <button type="submit" class="btn btn-link dropdown-item">Logout</button>
                    </form>
                </li>
            </ul>

        </div>
    </div>
</nav>