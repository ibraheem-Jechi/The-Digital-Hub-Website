@extends('layouts.frontend')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Pages</a></li>
    <li class="breadcrumb-item active text-primary">Our Sponsors</li>
@endsection

@section('content')


    <!-- Features Start -->
    <div class="row g-4 justify-content-center">
        @forelse($sponsorships as $sponsor)
            <div class="col-md-6 col-lg-4 col-xl-3 text-center mb-4 wow fadeInUp" data-wow-delay="0.2s">
                <div class="p-4 border rounded shadow-sm">
                    @if($sponsor->logo_url)
                        <a href="{{ $sponsor->website_url }}" target="_blank">
                            <img src="{{ asset('storage/' . $sponsor->logo_url) }}" alt="{{ $sponsor->description }}"
                                class="img-fluid mb-2" style="max-height:100px;">
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
    <!-- Features End -->




@endsection