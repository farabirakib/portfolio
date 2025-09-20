<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'My Portfolio')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <!-- Add this to your <head> if not already included -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <!--  -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- custom css link -->
    <link rel="stylesheet" href="{{asset('assets/css/frontend/portfolio.css')}}">

</head>

<body>

    <!-- preloader -->
    @include('frontend.partials.preloader')

    <!-- header -->
    @include('frontend.navbar')


    <!-- main body -->
    @yield('content')

    <!-- footer -->
    @include('frontend.footer')

    <!-- back button -->
    <button id="backToTop" class="btn btn-primary position-fixed bottom-0 end-0 m-4"
        style="display: none; z-index: 999;">
        ↑
    </button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>

 
    <!-- external js -->
    <script src="{{ asset('assets/main.js') }}"></script>


    <script>
document.addEventListener("DOMContentLoaded", function() {
    // Smooth scroll for offcanvas menu links
    const offcanvasLinks = document.querySelectorAll('.offcanvas .nav-link');

    offcanvasLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();

            // Close offcanvas
            const offcanvasEl = document.getElementById('offcanvasNavbar');
            const offcanvas = bootstrap.Offcanvas.getInstance(offcanvasEl);
            offcanvas.hide();

            // Scroll to section
            const targetId = this.getAttribute('href').substring(1);
            const targetEl = document.getElementById(targetId);
            const offset = 70; // navbar height
            const elementPosition = targetEl.getBoundingClientRect().top + window.scrollY;
            window.scrollTo({
                top: elementPosition - offset,
                behavior: 'smooth'
            });
        });
    });

    // Initialize ScrollSpy
    const scrollSpy = new bootstrap.ScrollSpy(document.body, {
        target: '#navbarNav',
        offset: 70
    });
});
</script>




</body>

</html>