@extends('layouts.frontend')
@section('page-title', 'Our Team')

@section('breadcrumb')
    <li class="breadcrumb-item active text-primary">Team</li>
@endsection

@section('content')
<div class="container-fluid team py-5">
    <div class="container py-5">
        <!-- Section header -->
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">Our Team</h4>
            <h1 class="display-5 mb-4">Meet The Mentors & Managers</h1>
            <p class="mb-0">The mentors have a deep understanding of the programs and strong expertise, supported by managers with exceptional organizational and management abilities.</p>
        </div>

        <!-- Team members grid -->
        <div class="row g-4">
            @foreach($teamMembers as $member)
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                <div class="team-item card border-0 shadow-sm text-center">
                    <!-- Member photo -->
                    <div class="team-img">
                        @if($member->photo)
                            <img src="{{ asset('storage/'.$member->photo) }}" class="img-fluid rounded-top" alt="{{ $member->name }}">
                        @else
                            <img src="https://via.placeholder.com/300x300?text=No+Image" class="img-fluid rounded-top" alt="No Image">
                        @endif
                    </div>

                    <!-- Member info -->
                    <div class="team-title card-body">
                        <h4 class="mb-0">{{ $member->name }}</h4>
                        <p class="mb-0">{{ $member->description }}</p>
                    </div>

                    <!-- Social icons -->
                    <div class="team-icon card-footer bg-white border-0 pb-3">
                        <a class="btn btn-primary btn-sm-square rounded-circle me-2" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-primary btn-sm-square rounded-circle me-2" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-primary btn-sm-square rounded-circle me-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-primary btn-sm-square rounded-circle me-0" href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Optional: Add Animate.css or Wow.js for animation effects -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<script>
    new WOW().init();
</script>
@endsection
