<!-- Font Awesome CDN (add in layout if not included) -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

<section id="contact" class="section bg-light py-5">
    <div class="container" data-aos="fade-up">
        <h3 class="text-center mb-5 text-primary">Contact Me</h3>


        <form id="contactForm" method="POST" action="{{ route('contact.store') }}">
            @csrf
            <div class="row mb-3">
                <div class="col-md-6 mb-3">
                    <input type="text" name="name" class="form-control shadow-sm" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 mb-3">
                    <input type="email" name="email" class="form-control shadow-sm" placeholder="Your Email" required>
                </div>
                <div class="col-12 mb-3">
                    <textarea name="message" rows="5" class="form-control shadow-sm" placeholder="Your Message"
                        required></textarea>
                </div>
                <div class="col-12 text-center mb-4">
                    <button type="submit" class="btn btn-primary rounded-pill shadow px-5">Send Message</button>
                </div>
            </div>
        </form>


        <!-- Success/Error message show er jonno -->
        <div id="formMessage" class="text-center mt-3"></div>


        <!-- Social Links & Address Info -->
        <div class="row align-items-start">
            <!-- Social Links -->
            <div class="col-md-6 mb-4">
                <a class="navbar-brand d-flex align-items-center" href="#">
                    <img src="{{asset('assets/logo/logo.gif')}}" alt="logo"
                        style="height:60px; width:110px; filter: brightness(0) saturate(100%) invert(19%) sepia(99%) saturate(7476%) hue-rotate(210deg) brightness(95%) contrast(105%);">
                </a>
                <p>Firmament morning sixth subdue darkness <br /> creeping gathered divide.</p>
                <h5 class="text-primary fw-semibold mb-3">Follow Me</h5>
                <div class="d-flex flex-wrap gap-3">
                    <a href="https://www.facebook.com/farabi.rakib.35/" target="_blank" class="social-icon facebook"><i
                            class="fab fa-facebook-f"></i></a>
                    <a href="https://wa.me/yourwhatsapplink" target="_blank" class="social-icon whatsapp"><i
                            class="fab fa-whatsapp"></i></a>
                    <a href="https://www.instagram.com/fara.bi371?igsh=MW5nZWRjcGJmaWlzcQ==" target="_blank" class="social-icon instagram"><i
                            class="fab fa-instagram"></i></a>
                    <a href="https://www.linkedin.com/in/rakibul-islam-a23972318?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" target="_blank" class="social-icon linkedin"><i
                            class="fab fa-linkedin-in"></i></a>
                    <a href="https://github.com/farabirakib" target="_blank" class="social-icon github"><i
                            class="fab fa-github"></i></a>
                </div>
            </div>

            <!-- Address Info -->
            <div class="col-md-6 mb-4">
                <h5 class="text-primary fw-semibold mb-3">Contact Information</h5>
                <ul class="list-unstyled text-muted">
                    <!-- Address -->
                    <li class="d-flex align-items-center mb-3">
                        <i class="fas fa-map-marker-alt me-3 text-primary fs-5"></i>
                        <a href="https://maps.google.com/?q=12+Uttara+Street,+Dhaka,+Bangladesh" target="_blank"
                            class="text-muted text-decoration-none hover-effect">
                            12 Uttara Street, Dhaka, Bangladesh
                        </a>
                    </li>

                    <!-- Email (already correct) -->
                    <li class="d-flex align-items-center mb-3">
                        <i class="fas fa-envelope me-3 text-primary fs-5"></i>
                        <a href="mailto:mdrikib399@gmail.com" class="text-muted text-decoration-none hover-effect">
                            mdrikib399@gmail.com
                        </a>
                    </li>

                    <!-- WhatsApp -->
                    <li class="d-flex align-items-center mb-3">
                        <i class="fab fa-whatsapp me-3 text-success fs-5"></i>
                        <a href="https://wa.me/880123456789" target="_blank"
                            class="text-muted text-decoration-none hover-effect">
                            +880 1725663176
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>