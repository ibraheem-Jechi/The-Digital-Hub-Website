@extends('layouts.frontend')
@section('breadcrumb')

    <li class="breadcrumb-item active text-primary">Services</li>
@endsection

@section('content')

    <!-- Services Start -->
    <div class="container-fluid service py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Our Services</h4>
                <h1 class="display-5 mb-4">Programs that we implement</h1>
                <p class="mb-0">We implement Full Stack Web Development, Digital Literacy, AI, Word Press and Business
                    English courses.
                </p>
            </div>
            <div class="row g-4">
                @foreach($programs as $program)
                    <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="service-item">
                            <div class="service-img">
                                @if($program->image)
                                    <img src="{{ asset('storage/' . $program->image) }}" class="img-fluid rounded-top w-100"
                                        alt="{{ $program->title }}">
                                @else
                                    <img src="{{ asset('img/default.jpg') }}" class="img-fluid rounded-top w-100"
                                        alt="Default Image">
                                @endif
                            </div>
                            <div class="rounded-bottom p-4">
                                <a href="#" class="h4 d-inline-block mb-4">{{ $program->title }}</a>
                                <p class="mb-4">{{ Str::limit($program->description, 120, '...') }}</p>
                                <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Learn More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
    <!-- Services End -->






@endsection