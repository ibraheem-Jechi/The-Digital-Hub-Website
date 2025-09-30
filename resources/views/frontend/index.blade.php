@php
    $hideHeader = true;
@endphp


@extends('layouts.frontend')

@section('content')

    


   <!-- Carousel Start -->
<div class="header-carousel owl-carousel">
    @foreach($sliders as $slider)
        <div class="header-carousel-item">
            <img src="{{ asset('storage/' . $slider->background_image) }}" class="img-fluid w-100" alt="Slider Image">
            <div class="carousel-caption">
                <div class="container">
                    <div class="row gy-0 gx-5">
                        <div class="col-lg-0 col-xl-5"></div>
                        <div class="col-xl-7 animated fadeInLeft">
                            <div class="text-sm-center text-md-end">
                                <h4 class="text-primary text-uppercase fw-bold mb-4">{{ $slider->title }}</h4>
                                <h1 class="display-4 text-uppercase text-white mb-4">{{ $slider->subtitle }}</h1>
                                <p class="mb-5 fs-5">{{ $slider->description }}</p>
                                @if($slider->video_link)
                                    <div class="d-flex justify-content-center justify-content-md-end flex-shrink-0 mb-4">
                                        <a class="btn btn-light rounded-pill py-3 px-4 px-md-5 me-2" href="{{ $slider->video_link }}" target="_blank">
                                            <i class="fas fa-play-circle me-2"></i> Watch Video
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
<!-- Carousel End -->

    <!-- Navbar & Hero End -->


    <!-- Abvout Start -->
     
    <div class="container-fluid about py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-xl-7 wow fadeInLeft" data-wow-delay="0.2s">
                    <div>
                        <h4 class="text-primary">About Us</h4>
                        <h1 class="display-5 mb-4">
                            Digital Hub is a company that aims to connect youth with the modern digital world.
                        </h1>
                        <p class="mb-4">
                            We provide specialized programs that empower young people with essential digital skills, preparing them to enter and thrive in the world of web development.
                        </p>
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="d-flex">
                                    <div><i class="fas fa-lightbulb fa-3x text-primary"></i></div>
                                    <div class="ms-4">
                                        <h4>Business Consulting</h4>
                                        <p>Helping businesses grow through digital strategies and smart solutions.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex">
                                    <div><i class="bi bi-bookmark-heart-fill fa-3x text-primary"></i></div>
                                    <div class="ms-4">
                                        <h4>Years Of Expertise</h4>
                                        <p>Trusted expertise built through continuous learning and real-world practice.</p>
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
            <p class="mb-0"> Find Your Answers Here.</p>
        </div>
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.2s">
                <div class="accordion accordion-flush bg-light rounded p-5" id="accordionFlushSection">
                    <div class="accordion-item rounded-top">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed rounded-top" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                What learning style does Digital Hub follow?
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushSection">
                            <div class="accordion-body">We focus on self-learning methods while equipping students with problem-solving skills that prepare them for real-world challenges.</div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                How long is the program?
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushSection">
                            <div class="accordion-body"> Our programs typically run between 3 to 6 months, depending on the track.</div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                Where is the workplace located?
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushSection">
                            <div class="accordion-body">All activities take place at our hub in Beirut Souks.</div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                What is the age range for the programs?
                            </button>
                        </h2>
                        <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushSection">
                            <div class="accordion-body"> The students should be from 19 to 30</div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                                Do you accept all nationalities?
                            </button>
                        </h2>
                        <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushSection">
                            <div class="accordion-body">For now our programs for palestinians, and maybe in the future we accpet others.</div>
                        </div>
                    </div>
                    <div class="accordion-item rounded-bottom">
                        <h2 class="accordion-header" id="flush-headingSix">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
                                Do you have a transportation fees?
                            </button>
                        </h2>
                        <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushSection">
                            <div class="accordion-body">Till now no, but maybe we can have a private buses for all cities.</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.2s">
                <div class="bg-primary rounded">
                    <img src="{{ asset('img/asking.jpg') }}" class="img-fluid w-100" alt="">
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