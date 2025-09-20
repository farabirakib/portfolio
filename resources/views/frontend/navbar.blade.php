<body data-bs-spy="scroll" data-bs-target="#navbarNav" data-bs-offset="70" tabindex="0">

<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
    <div class="container d-flex justify-content-between align-items-center">

        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center m-0" href="{{route('frontend.home')}}">
            <img src="{{asset('assets/logo/logo.gif')}}" alt="logo" class="img-fluid"
                 style="height:50px; width:auto; filter: brightness(0) saturate(100%) invert(19%) sepia(99%) saturate(7476%) hue-rotate(210deg) brightness(95%) contrast(105%);">
        </a>

        <!-- Mobile Toggler -->
        <button class="navbar-toggler border-0 shadow-sm rounded d-lg-none d-flex align-items-center" type="button" 
            data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Desktop Menu -->
        <div class="collapse navbar-collapse d-none d-lg-block" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center gap-lg-3">
                <li class="nav-item"><a class="nav-link nav-animate fs-6 active" href="#hero">Home</a></li>
                <li class="nav-item"><a class="nav-link nav-animate fs-6" href="#about">About</a></li>
                <li class="nav-item"><a class="nav-link nav-animate fs-6" href="#skills">Skills</a></li>
                <li class="nav-item"><a class="nav-link nav-animate fs-6" href="#experience">Experience</a></li>
                <li class="nav-item"><a class="nav-link nav-animate fs-6" href="#services">Services</a></li>
                <li class="nav-item"><a class="nav-link nav-animate fs-6" href="#projects">Projects</a></li>
                <li class="nav-item"><a class="nav-link nav-animate fs-6" href="#contact">Contact</a></li>
                <li class="nav-item">
                    <button id="themeToggle" class="btn btn-outline-secondary ms-lg-2" type="button">🌙</button>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Mobile Offcanvas Menu -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title">Menu</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="navbar-nav gap-3">
            <li class="nav-item"><a class="nav-link fs-6" href="#hero">Home</a></li>
            <li class="nav-item"><a class="nav-link fs-6" href="#about">About</a></li>
            <li class="nav-item"><a class="nav-link fs-6" href="#skills">Skills</a></li>
            <li class="nav-item"><a class="nav-link fs-6" href="#experience">Experience</a></li>
            <li class="nav-item"><a class="nav-link fs-6" href="#services">Services</a></li>
            <li class="nav-item"><a class="nav-link fs-6" href="#projects">Projects</a></li>
            <li class="nav-item"><a class="nav-link fs-6" href="#contact">Contact</a></li>
            <li class="nav-item">
                <button id="themeToggleMobile" class="btn btn-outline-secondary" type="button">🌙</button>
            </li>
        </ul>
    </div>
</div>