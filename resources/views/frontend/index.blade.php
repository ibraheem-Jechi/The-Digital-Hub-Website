@php
    $hideHeader = true;
@endphp


@extends('layouts.frontend')

@section('content')

    


    <!-- Carousel Start -->
    <div class="header-carousel owl-carousel">
        <div class="header-carousel-item">
            <img src="img/carousel-1.jpg" class="img-fluid w-100" alt="Image">
            <div class="carousel-caption">
                <div class="container">
                    <div class="row gy-0 gx-5">
                        <div class="col-lg-0 col-xl-5"></div>
                        <div class="col-xl-7 animated fadeInLeft">
                            <div class="text-sm-center text-md-end">
                                <h4 class="text-primary text-uppercase fw-bold mb-4">Welcome to The Digital Hub</h4>
                                <h1 class="display-4 text-uppercase text-white mb-4">Gain hands-on experience in coding and
                                    advance your Digital skills.</h1>
                                <p class="mb-5 fs-5">Empower yourself with essential digital skills. Our programs, from
                                    digital literacy to full-stack development, equip you for the future of technology
                                </p>
                                <div class="d-flex justify-content-center justify-content-md-end flex-shrink-0 mb-4">
                                    <a class="btn btn-light rounded-pill py-3 px-4 px-md-5 me-2" href="#"><i
                                            class="fas fa-play-circle me-2"></i> Watch Video</a>
                                    <a class="btn btn-primary rounded-pill py-3 px-4 px-md-5 ms-2" href="about">Learn
                                        More</a>
                                </div>
                                <div class="d-flex align-items-center justify-content-center justify-content-md-end">
                                    <h2 class="text-white me-2">Follow Us:</h2>
                                    <div class="d-flex justify-content-end ms-2">
                                        <a class="btn btn-md-square btn-light rounded-circle me-2" href=""><i
                                                class="fab fa-facebook-f"></i></a>
                                        <a class="btn btn-md-square btn-light rounded-circle mx-2" href=""><i
                                                class="fab fa-twitter"></i></a>
                                        <a class="btn btn-md-square btn-light rounded-circle mx-2" href=""><i
                                                class="fab fa-instagram"></i></a>
                                        <a class="btn btn-md-square btn-light rounded-circle ms-2" href=""><i
                                                class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-carousel-item">
            <img src="img/carousel-2.jpg" class="img-fluid w-100" alt="Image">
            <div class="carousel-caption">
                <div class="container">
                    <div class="row g-5">
                        <div class="col-12 animated fadeInUp">
                            <div class="text-center">
                                <h4 class="text-primary text-uppercase fw-bold mb-4">Welcome To The Digital Hub</h4>
                                <h1 class="display-4 text-uppercase text-white mb-4"> Gain hands-on experience in coding and
                                    advance your Digital skills.</h1>
                                <p class="mb-5 fs-5">Empower yourself with essential digital skills. Our programs, from
                                    digital literacy to full-stack development, equip you for the future of technology
                                </p>
                                <div class="d-flex justify-content-center flex-shrink-0 mb-4">
                                    <a class="btn btn-light rounded-pill py-3 px-4 px-md-5 me-2" href="#"><i
                                            class="fas fa-play-circle me-2"></i> Watch Video</a>
                                    <a class="btn btn-primary rounded-pill py-3 px-4 px-md-5 ms-2" href="about">Learn
                                        More</a>
                                </div>
                                <div class="d-flex align-items-center justify-content-center">
                                    <h2 class="text-white me-2">Follow Us:</h2>
                                    <div class="d-flex justify-content-end ms-2">
                                        <a class="btn btn-md-square btn-light rounded-circle me-2" href=""><i
                                                class="fab fa-facebook-f"></i></a>
                                        <a class="btn btn-md-square btn-light rounded-circle mx-2" href=""><i
                                                class="fab fa-twitter"></i></a>
                                        <a class="btn btn-md-square btn-light rounded-circle mx-2" href=""><i
                                                class="fab fa-instagram"></i></a>
                                        <a class="btn btn-md-square btn-light rounded-circle ms-2" href=""><i
                                                class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->
    </div>
    <!-- Navbar & Hero End -->


    <!-- Abvout Start -->
    <div class="container-fluid about py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-xl-7 wow fadeInLeft" data-wow-delay="0.2s">
                    <div>
                        <h4 class="text-primary">About Us</h4>
                        <h1 class="display-5 mb-4">Digital Hub is a company that aims to connect youth with the modern
                            digital world.</h1>
                        <p class="mb-4">We provide specialized programs that empower young people with essential digital
                            skills, preparing them to enter and thrive in the world of web development.
                        </p>
                        <div class="row g-4">
                            <div class="col-md-6 col-lg-6 col-xl-6">
                                <div class="d-flex">
                                    <div><i class="fas fa-lightbulb fa-3x text-primary"></i></div>
                                    <div class="ms-4">
                                        <h4>Skill Development</h4>
                                        <p>Empowering individuals with the tools and knowledge to excel in the digital
                                            world.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-6">
                                <div class="d-flex">
                                    <div><i class="bi bi-bookmark-heart-fill fa-3x text-primary"></i></div>
                                    <div class="ms-4">
                                        <h4>Years of Mastery</h4>
                                        <p>Proven expertise honed through continuous learning and hands-on experience</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <a href="services" class="btn btn-primary rounded-pill py-3 px-5 flex-shrink-0">Discover
                                    Now</a>
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
                        <img src="{{ asset('img/DigitalHub.jpeg') }}" class="img-fluid rounded w-100" alt="">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Services Start -->
    <div class="container-fluid service pb-5">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Our Services</h4>
                <h1 class="display-5 mb-4">Programs that we implement </h1>
                <p class="mb-0">We implement Full Stack Web Development, Digital Literacy, AI, Word Press and Business
                    English courses.
            </div>
            <div class="row g-4">
                @forelse($programs as $program)
                    <div class="col-md-6 col-lg-4">
                        <div class="service-item">
                            <div class="service-img">
                                @if(!empty($program->image) && file_exists(public_path('storage/' . $program->image)))
                                    <img src="{{ asset('storage/' . $program->image) }}" class="img-fluid rounded-top w-100"
                                        alt="{{ $program->title ?? 'Program Image' }}">
                                @else
                                    <img src="{{ asset('img/default.jpg') }}" class="img-fluid rounded-top w-100" alt="Default">
                                @endif
                            </div>
                            <div class="rounded-bottom p-4">
                                <a href="#" class="h4 d-inline-block mb-4">{{ $program->title ?? 'Untitled Program' }}</a>
                                <p class="mb-4">
                                    {{ !empty($program->description) ? \Illuminate\Support\Str::limit($program->description, 100) : 'No description available.' }}
                                </p>
                                <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Learn More</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center">No programs available at the moment.</p>
                @endforelse
            </div>
        </div>
    </div>
    <!-- Services End -->

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


    <!-- Offer Start -->
    <div class="container-fluid offer-section pb-5">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Our Offer</h4>
                <h1 class="display-5 mb-4">Benefits We offer</h1>
                <p class="mb-0">We organize meetings with leading professionals and successful entrepreneurs in web
                    development and other technology fields, along with workshops designed to enhance youth life skills.
                </p>
            </div>
            <div class="row g-5 align-items-center">
                <div class="col-xl-5 wow fadeInLeft" data-wow-delay="0.2s">
                    <div class="nav nav-pills bg-light rounded p-5">
                        <a class="accordion-link p-4 active mb-4" data-bs-toggle="pill" href="#collapseOne">
                            <h5 class="mb-0">English Sessions</h5>
                        </a>
                        <a class="accordion-link p-4 mb-4" data-bs-toggle="pill" href="#collapseTwo">
                            <h5 class="mb-0">Life skills sessions</h5>
                        </a>
                        <a class="accordion-link p-4 mb-4" data-bs-toggle="pill" href="#collapseThree">
                            <h5 class="mb-0">Mock interviews</h5>
                        </a>
                        <a class="accordion-link p-4 mb-0" data-bs-toggle="pill" href="#collapseFour">
                            <h5 class="mb-0">Real projects to work on</h5>
                        </a>
                    </div>
                </div>
                <div class="col-xl-7 wow fadeInRight" data-wow-delay="0.4s">
                    <div class="tab-content">
                        <div id="collapseOne" class="tab-pane fade show p-0 active">
                            <div class="row g-4">
                                <div class="col-md-7">
                                    <img src="{{ asset('img/english.jpeg') }}" class="img-fluid w-100 rounded" alt="">
                                </div>
                                <div class="col-md-5">
                                    <h1 class="display-5 mb-4">Where you improve your English</h1>
                                    <p class="mb-4">In our English sessions you will learn some grammar rules, write emails
                                        and build a professioanl presentation.
                                    </p>
                                    <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Learn More</a>
                                </div>
                            </div>
                        </div>
                        <div id="collapseTwo" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <div class="col-md-7">
                                    <img src=" {{ asset('img/lifeskill.jpeg') }}" class="img-fluid w-100 rounded" alt="">
                                </div>
                                <div class="col-md-5">
                                    <h1 class="display-5 mb-4">Where you will be ready to a workplace</h1>
                                    <p class="mb-4">Our life skill sessions will prepare you to have a self-confidance and
                                        improve your teamwork skills.
                                    </p>
                                    <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Learn More</a>
                                </div>
                            </div>
                        </div>
                        <div id="collapseThree" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <div class="col-md-7">
                                    <img src="{{ asset('img/mockinterview.jpeg') }}" class="img-fluid w-100 rounded" alt="">
                                </div>
                                <div class="col-md-5">
                                    <h1 class="display-5 mb-4">Tips and Tricks</h1>
                                    <p class="mb-4">Our mock interview sessions will make you ready to be accepted in any
                                        interview for any job field.
                                    </p>
                                    <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Learn More</a>
                                </div>
                            </div>
                        </div>
                        <div id="collapseFour" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <div class="col-md-7">
                                    <img src="{{ asset('img/handson.jpeg') }}" class="img-fluid w-100 rounded" alt="">
                                </div>
                                <div class="col-md-5">
                                    <h1 class="display-5 mb-4">Hands On</h1>
                                    <p class="mb-4"> Our programs give you real projects to work on that makes you ready to
                                        start your own work.
                                    </p>
                                    <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Offer End -->

    <!-- Blog Start -->
    <div class="container-fluid blog pb-5">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Our Blog & News</h4>
                <h1 class="display-5 mb-4">Workshops</h1>
                <p class="mb-0">Our programs include a variety of workshops designed to equip students with digital
                    knowledge, career readiness skills, and effective interview preparation.
                </p>
            </div>
            <div class="owl-carousel blog-carousel wow fadeInUp" data-wow-delay="0.2s">
                @foreach($workshops as $workshop)
                    <div class="blog-item p-4">
                        <div class="blog-img mb-4">
                            @if($workshop->image)
                                <img src="{{ asset('storage/' . $workshop->image) }}" class="img-fluid w-100 rounded"
                                    alt="{{ $workshop->title }}">
                            @else
                                <img src="{{ asset('img/default-workshop.jpg') }}" class="img-fluid w-100 rounded" alt="No Image">
                            @endif
                            <div class="blog-title">
                                <a href="#" class="btn">{{ $workshop->program_id ?? 'General' }}</a>
                            </div>
                        </div>
                        <a href="#" class="h4 d-inline-block mb-3">{{ $workshop->title }}</a>
                        <p class="mb-4">{{ Str::limit($workshop->description, 100) }}</p>
                        <div class="d-flex align-items-center">

                            <div class="ms-3">
                                <h5>Admin</h5>
                                <p class="mb-0">{{ \Carbon\Carbon::parse($workshop->event_date)->format('F j, Y') }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Blog End -->


   <style>
/* Active / Expanded accordion button */
.accordion-button:not(.collapsed) {
    background-color: #0d6efd; /* Bootstrap primary blue */
    color: #fff;                /* White text */
    box-shadow: none;           /* Remove default shadow */
}

/* Optional: keep the arrow white */
.accordion-button:not(.collapsed)::after {
    filter: invert(1);
}

/* Ensure collapsed state looks good */
.accordion-button {
    background-color: #f8f9fa; /* Light grey */
    color: #000;                /* Black text */
}
</style>

<!-- FAQs Start -->
<div class="container-fluid faq-section py-5">
    <div class="container py-5 overflow-hidden">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">FAQs</h4>
            <h1 class="display-5 mb-4">Frequently Asked Questions</h1>
            <p class="mb-0">Find Your Answers Here.</p>
        </div>
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.2s">
                <div class="accordion accordion-flush bg-light rounded p-5" id="accordionFlushSection">
                    @foreach($faqs as $index => $faq)
                        <div class="accordion-item {{ $loop->first ? 'rounded-top' : ($loop->last ? 'rounded-bottom' : '') }}">
                            <h2 class="accordion-header" id="flush-heading{{ $index }}">
                                <button class="accordion-button collapsed {{ $loop->first ? 'rounded-top' : '' }}" 
                                        type="button" data-bs-toggle="collapse" 
                                        data-bs-target="#flush-collapse{{ $index }}" 
                                        aria-expanded="false" 
                                        aria-controls="flush-collapse{{ $index }}">
                                    {{ $faq->question }}
                                </button>
                            </h2>
                            <div id="flush-collapse{{ $index }}" class="accordion-collapse collapse" 
                                 aria-labelledby="flush-heading{{ $index }}" 
                                 data-bs-parent="#accordionFlushSection">
                                <div class="accordion-body">{{ $faq->answer }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.2s">
                <div class="bg-primary rounded">
                    <img src="{{ asset('img/asking.jpg') }}" class="img-fluid w-100" alt="FAQ Image">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- FAQs End -->




    <!-- Team Start -->
    @include('frontend.partials.team')
  
    <script>
        var videoModal = document.getElementById('videoModal');
        var videoFrame = document.getElementById('videoFrame');

        videoModal.addEventListener('hidden.bs.modal', function () {
            // Stop the video when modal is closed
            videoFrame.src = videoFrame.src;
        });
    </script>
@endsection