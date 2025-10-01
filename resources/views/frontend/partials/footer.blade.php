<!-- Footer Start -->
<div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s">
    <div class="container py-5 border-start-0 border-end-0"
        style="border: 1px solid; border-color: rgb(255, 255, 255, 0.08);">
        <div class="row g-5">
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="footer-item">
                    <a href="index.html" class="p-0">
                        <h4 class="text-white">{{ $footer->title ?? 'The Digital Hub' }}</h4>
                        <!-- <img src="img/logo.png" alt="Logo"> -->
                    </a>
                    <p class="mb-4">{{ $footer->description ?? 'A company that teach youths the modern skills to make them full web developers and digital programmers.' }}</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-2">
                <div class="footer-item">
                    <h4 class="text-white mb-4">Quick Links</h4>
                    <a href="about"><i class="fas fa-angle-right me-2"></i> About Us</a>
                    <a href="features"><i class="fas fa-angle-right me-2"></i> Our Sponsors</a>
                    <a href="blog"><i class="fas fa-angle-right me-2"></i> Blog</a>
                    <a href="contact"><i class="fas fa-angle-right me-2"></i> Contact us</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="footer-item">
                    <h4 class="text-white mb-4">Support</h4>
                    <a href="FAQ"><i class="fas fa-angle-right me-2"></i> FAQ</a>
                    <a href="contact"><i class="fas fa-angle-right me-2"></i> Help</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="footer-item">
                    <h4 class="text-white mb-4">Contact Info</h4>
                    <div class="d-flex align-items-center">
                        <i class="fas fa-map-marker-alt text-primary me-3"></i>
                        <p class="text-white mb-0">{{ $footer->address ?? 'Beirut Souks' }}</p>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="fas fa-envelope text-primary me-3"></i>
                        <p class="text-white mb-0">{{ $footer->email ?? 'F.GHADBAN@unrwa.org' }}</p>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="fa fa-phone-alt text-primary me-3"></i>
                        <p class="text-white mb-0">{{ $footer->phone ?? '(+961) 81 079 029' }}</p>
                    </div>
                    <div class="d-flex align-items-center mb-4">
                        <i class="fab fa-firefox-browser text-primary me-3"></i>
                        <p class="text-white mb-0">{{ $footer->website ?? 'LFO.DigitalHub@unrwa.org' }}</p>
                    </div>
                   <div class="d-flex">
    @if($footer && $footer->facebook)
    <a class="btn btn-primary btn-sm-square rounded-circle me-3" href="{{ $footer->facebook }}">
        <i class="fab fa-facebook-f text-white"></i>
    </a>
@else
    <span class="text-white">N/A</span>
@endif

@if($footer && $footer->twitter)
    <a class="btn btn-primary btn-sm-square rounded-circle me-3" href="{{ $footer->twitter }}">
        <i class="fab fa-twitter text-white"></i>
    </a>
@else
    <span class="text-white">N/A</span>
@endif

@if($footer && $footer->instagram)
    <a class="btn btn-primary btn-sm-square rounded-circle me-3" href="{{ $footer->instagram }}">
        <i class="fab fa-instagram text-white"></i>
    </a>
@else
    <span class="text-white">N/A</span>
@endif

@if($footer && $footer->linkedin)
    <a class="btn btn-primary btn-sm-square rounded-circle me-0" href="{{ $footer->linkedin }}">
        <i class="fab fa-linkedin-in text-white"></i>
    </a>
@else
    <span class="text-white">N/A</span>
@endif

</div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->

<!-- Back to Top -->
<a href="#" class="btn btn-primary btn-lg-square rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>
