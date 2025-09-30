@extends('layouts.frontend')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Pages</a></li>
    <li class="breadcrumb-item active text-primary">FAQ</li>
@endsection
@section('content')

<!-- Custom CSS for Accordion -->
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

@endsection
