<div class="container-fluid team py-5">
    <div class="container py-5">
        <div class="text-center mx-auto pb-5" style="max-width: 800px;">
            <h4 class="text-primary">Our Team</h4>
            <h1 class="display-5 mb-4">Meet The Mentors & Managers</h1>
            <p class="text-muted">
                The mentors have a deep understanding of the programs and strong expertise, 
                supported by managers with exceptional organizational and management abilities.
            </p>
        </div>

        <div class="row g-4">
            @foreach($teamMembers as $member)
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="card border-0 shadow-sm text-center team-card h-100">
                        
                        <!-- Image with hover zoom -->
                        <div class="team-img overflow-hidden">
                            @if($member->photo)
                                <img src="{{ asset('storage/'.$member->photo) }}" 
                                     class="img-fluid rounded-top w-100" 
                                     alt="{{ $member->name }}">
                            @else
                                <img src="https://via.placeholder.com/300x300?text=No+Image" 
                                     class="img-fluid rounded-top w-100" 
                                     alt="No Image">
                            @endif
                        </div>

                        <!-- Info -->
                        <div class="card-body">
                            <h5 class="fw-bold mb-1">{{ $member->name }}</h5>
                            <p class="text-muted small mb-0">{{ $member->description }}</p>
                        </div>

                        <!-- Social icons -->
                        <div class="card-footer bg-white border-0 pb-3">
                            <a class="btn btn-sm rounded-circle me-2 social-btn facebook" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-sm rounded-circle me-2 social-btn twitter" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-sm rounded-circle me-2 social-btn linkedin" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-sm rounded-circle social-btn instagram" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<style>
    .team-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .team-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 25px rgba(0,0,0,0.15);
    }
    .team-img img {
        transition: transform 0.4s ease;
    }
    .team-card:hover .team-img img {
        transform: scale(1.1);
    }

    /* Social buttons with brand colors */
    .social-btn {
        color: #fff;
        padding: 8px;
    }
    .social-btn.facebook { background-color: #3b5998; }
    .social-btn.twitter { background-color: #1da1f2; }
    .social-btn.linkedin { background-color: #0077b5; }
    .social-btn.instagram { background-color: #e4405f; }

    .social-btn:hover {
        opacity: 0.85;
    }
</style>
