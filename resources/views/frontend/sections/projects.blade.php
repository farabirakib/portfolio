<!-- Projects Section -->
<section id="projects" class="section bg-light py-5">
    <div class="container" data-aos="fade-up">
        <h3 class="text-center mb-5 text-primary">My Projects</h3>
        <div class="row g-4">
            @foreach($projects as $project)
            <div class="col-md-6 col-lg-4">
                <a href="{{ $project->project_link ?? '#' }}" target="_blank" class="text-decoration-none">
                    <div class="card shadow-lg border-0 project-card">
                        <div class="project-img-container overflow-hidden rounded">
                            <!-- Project Image -->
                            <img src="{{ asset($project->image) }}" class="project-img" alt="Project Image">

                            <!-- Overlay Title -->
                            <div class="overlay">
                                <h5 class="overlay-title">{{ $project->title }}</h5>
                                <!-- <p class="overlay-text">{{ $project->short_description }}</p> -->
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
