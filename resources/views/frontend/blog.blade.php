@extends('layouts.frontend')

@section('breadcrumb')
    <li class="breadcrumb-item active text-primary">Blogs</li>
@endsection

@section('content')
    <div class="container-fluid blog py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" style="max-width: 800px;">
                <h4 class="text-primary">Our Blog & News</h4>
                <h1 class="display-5 mb-4">Workshops</h1>
                <p class="mb-0">Our programs include a variety of workshops designed to equip students with digital
                    knowledge, career readiness skills, and effective interview preparation.</p>
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
@endsection