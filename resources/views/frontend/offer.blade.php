@extends('layouts.frontend')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Pages</a></li>
    <li class="breadcrumb-item active text-primary">Our Offer</li>
@endsection

@section('content')

<!-- Offer Start -->
<div class="container-fluid offer-section py-5">
    <div class="container py-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">Our Offer</h4>
            <h1 class="display-5 mb-4">Benefits We offer</h1>
            <p class="mb-0">
                We organize meetings with leading professionals and successful entrepreneurs in web development and other technology fields, along with workshops designed to enhance youth life skills.
            </p>
        </div>

        <div class="row g-5 align-items-center">
            <div class="col-xl-5 wow fadeInLeft" data-wow-delay="0.2s">
                <div class="nav nav-pills bg-light rounded p-5">
                    @foreach($offers as $key => $offer)
                        <a class="accordion-link p-4 mb-4 {{ $key === 0 ? 'active' : '' }}" data-bs-toggle="pill" href="#offer{{ $offer->id }}">
                            <h5 class="mb-0">{{ $offer->title }}</h5>
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="col-xl-7 wow fadeInRight" data-wow-delay="0.4s">
                <div class="tab-content">
                    @foreach($offers as $key => $offer)
                        <div id="offer{{ $offer->id }}" class="tab-pane fade show p-0 {{ $key === 0 ? 'active' : '' }}">
                            <div class="row g-4">
                                <div class="col-md-7">
                                    @if($offer->image)
                                        <img src="{{ asset('storage/' . $offer->image) }}" class="img-fluid w-100 rounded" alt="{{ $offer->title }}">
                                    @else
                                        <img src="{{ asset('img/default-offer.jpeg') }}" class="img-fluid w-100 rounded" alt="Offer Image">
                                    @endif
                                </div>
                                <div class="col-md-5">
                                    <h1 class="display-5 mb-4">{{ $offer->subtitle ?? $offer->title }}</h1>
                                    <p class="mb-4">{{ $offer->description }}</p>
                                    @if($offer->button_link)
                                        <a class="btn btn-primary rounded-pill py-2 px-4" href="{{ $offer->button_link }}">{{ $offer->button_text ?? 'Learn More' }}</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Offer End -->

@endsection
