<section id="about" class="py-5 bg-light">
    <div class="container" data-aos="fade-up">
        <div class="row align-items-center">
            <div class="col-md-5 mb-4 mb-md-0">
                <img src="{{ asset($about->image) }}" alt="Profile" class="img-fluid rounded shadow"
                    style="height: 400px; width: 40 cover;">
            </div>
            <div class="col-md-7">
                <h3 class="text-primary">About Me</h3>
                <p>{{ $about->description }}</p>               
                @if($about->cv_link && file_exists(public_path($about->cv_link)))
                <a href="{{ route('about.downloadCV', $about->id) }}" class="btn btn-outline-primary mt-2"
                    target="_blank">
                    Download CV
                </a>
                @else
                <p class="text-muted mt-2">No CV uploaded.</p>
                @endif
            </div>
        </div>
    </div>
</section>