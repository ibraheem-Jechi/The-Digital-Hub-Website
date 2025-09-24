@extends('layouts.frontend')
@section('page-title', 'About Us')

@section('breadcrumb')
    <li class="breadcrumb-item active text-primary">About</li>
@endsection

@section('content')

<!-- About Start -->
<div class="container-fluid about py-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-xl-7 wow fadeInLeft" data-wow-delay="0.2s">
                <div>
                    <h4 class="text-primary">About Us</h4>
                    <h1 class="display-5 mb-4">Digital Hub is a company that aims to connect youth with the modern digital world.</h1>
                    <p class="mb-4">We provide specialized programs that empower young people with essential digital skills, preparing them to enter and thrive in the world of web development.
                    </p>
                    <div class="row g-4">
                        <div class="col-md-6 col-lg-6 col-xl-6">
                            <div class="d-flex">
                                <div><i class="fas fa-lightbulb fa-3x text-primary"></i></div>
                                <div class="ms-4">
                                    <h4>Business Consuluting</h4>
                                    <p>Helping businesses grow through digital strategies and smart solutions.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-6">
                            <div class="d-flex">
                                <div><i class="bi bi-bookmark-heart-fill fa-3x text-primary"></i></div>
                                <div class="ms-4">
                                    <h4>Year Of Expertise</h4>
                                    <p>Trusted expertise built through continous learning and real-world practice.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <a href="#" class="btn btn-primary rounded-pill py-3 px-5 flex-shrink-0">Discover Now</a>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex">
                                <i class="fas fa-phone-alt fa-2x text-primary me-4"></i>
                                <div>
                                    <h4>Call Us</h4>
                                    <p class="mb-0 fs-5" style="letter-spacing: 1px;">+961 81079029</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 wow fadeInRight" data-wow-delay="0.2s">
                <div class="bg-primary rounded position-relative overflow-hidden">
                    <img src="{{ asset('img/DigitalHub.jpeg') }}" class="img-fluid rounded w-100" alt="The Digital Hub">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

<!-- Sponsors Section Start -->
<div class="container-fluid feature py-5">
    <div class="container py-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">Our Sponsors</h4>
            <h1 class="display-5 mb-4">Organizations and companies that fund and sponsor our programs</h1>
            <p class="mb-0">We are grateful to the organizations and companies that fund and sponsor our programs, enabling us to empower youth with essential digital skills. We also welcome and thank new sponsors and partners, who will become an integral part of our journey.</p>
        </div>

        <div class="row g-4 justify-content-center">
            @forelse($sponsorships as $sponsor)
                <div class="col-md-6 col-lg-4 col-xl-3 text-center mb-4 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="p-4 border rounded shadow-sm">
                        @if($sponsor->logo_url)
                            <a href="{{ $sponsor->website_url }}" target="_blank">
                                <img src="{{ asset('storage/' . $sponsor->logo_url) }}" alt="{{ $sponsor->description }}" class="img-fluid mb-2" style="max-height:100px;">
                            </a>
                        @else
                            <i class="fas fa-handshake fa-4x text-primary mb-2"></i>
                        @endif
                        <h5 class="mb-2">{{ $sponsor->description }}</h5>
                        @if($sponsor->website_url)
                            <a href="{{ $sponsor->website_url }}" target="_blank" class="btn btn-primary rounded-pill py-1 px-3 mt-2">
                                Visit Website
                            </a>
                        @endif
                    </div>
                </div>
            @empty
                <p class="text-center">No sponsors yet.</p>
            @endforelse
        </div>
    </div>
</div>
<!-- Sponsors Section End -->

<!-- Team Start -->
<div class="container-fluid team pb-5">
    <!-- Team content remains the same as your original code -->
</div>
<!-- Team End -->

@endsection
