<section id="skills" class="py-5">
    <div class="container" data-aos="fade-up">
        <h3 class="text-center mb-5 text-primary">My Skills</h3>
        <div class="row text-center gy-4">
            @foreach ($skills as $skill)
            <div class="col-md-4">
                <div class="p-4 bg-white shadow rounded skill-card h-100">
                    <div class="mb-3 d-flex align-items-center flex-column">
                        <i class="fab {{ $skill->icon }} fa-2x mb-2 text-{{ $skill->color }}"></i>
                        <span class="mt-1" style="font-size: 15px;">{{ $skill->name }}</span>
                    </div>
                    <div class="progress" style="height: 11px;">
                        <div class="progress-bar bg-{{ $skill->color }}" role="progressbar" style="width: 0%"
                            aria-valuenow="{{ $skill->percent }}" aria-valuemin="0" aria-valuemax="100">
                            {{ $skill->percent }}%
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
