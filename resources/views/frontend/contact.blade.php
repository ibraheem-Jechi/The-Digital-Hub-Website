@extends('layouts.frontend')

@section('breadcrumb')
    <li class="breadcrumb-item active text-primary">Contact Us</li>
@endsection

@section('content')
    <!-- Contact Start -->
    <div class="container-fluid contact py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-xl-6">
                    <div class="wow fadeInUp" data-wow-delay="0.2s">
                        <!-- Contact Info -->
                        <div class="bg-light rounded p-5 mb-5">
                            <h4 class="text-primary mb-4">Get in Touch</h4>
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="contact-add-item">
                                        <div class="contact-icon text-primary mb-4">
                                            <i class="fas fa-map-marker-alt fa-2x"></i>
                                        </div>
                                        <div>
                                            <h4>Address</h4>
                                            <p class="mb-0">Beirut Souks</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="contact-add-item">
                                        <div class="contact-icon text-primary mb-4">
                                            <i class="fas fa-envelope fa-2x"></i>
                                        </div>
                                        <div>
                                            <h4>Mail Us</h4>
                                            <p class="mb-0">digitalhubteam1@gmail.com</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="contact-add-item">
                                        <div class="contact-icon text-primary mb-4">
                                            <i class="fa fa-phone-alt fa-2x"></i>
                                        </div>
                                        <div>
                                            <h4>Telephone</h4>
                                            <p class="mb-0">(+961) 81079029</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="contact-add-item">
                                        <div class="contact-icon text-primary mb-4">
                                            <i class="fab fa-firefox-browser fa-2x"></i>
                                        </div>
                                        <div>
                                            <h4>Email</h4>
                                            <p class="mb-0">LFO.DigitalHub@unrwa.org</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Contact Form -->
                        <div class="bg-light p-5 rounded h-100 wow fadeInUp" data-wow-delay="0.2s">
                            <h4 class="text-primary">Send Your Message</h4>

                            <!-- Success / Error messages -->
                            @if(session('success'))
                                <div class="alert alert-success mb-3">{{ session('success') }}</div>
                            @endif

                            @if($errors->any())
                                <div class="alert alert-danger mb-3">
                                    <ul class="mb-0">
                                        @foreach($errors->all() as $e)
                                            <li>{{ $e }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('contact.store') }}" method="POST">
                                @csrf
                                <div class="row g-4">
                                    <div class="col-lg-12 col-xl-6">
                                        <div class="form-floating">
                                            <input name="name" type="text" class="form-control border-0" id="name"
                                                placeholder="Your Name" value="{{ old('name') }}">
                                            <label for="name">Your Name</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-xl-6">
                                        <div class="form-floating">
                                            <input name="email" type="email" class="form-control border-0" id="email"
                                                placeholder="Your Email" value="{{ old('email') }}">
                                            <label for="email">Your Email</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-xl-6">
                                        <div class="form-floating">
                                            <input name="phone" type="tel" class="form-control border-0" id="phone"
                                                placeholder="Phone" value="{{ old('phone') }}">
                                            <label for="phone">Your Phone</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-xl-6">
                                        <div class="form-floating">
                                            <input name="project" type="text" class="form-control border-0" id="project"
                                                placeholder="Project" value="{{ old('project') }}">
                                            <label for="project">Your Project</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input name="subject" type="text" class="form-control border-0" id="subject"
                                                placeholder="Subject" value="{{ old('subject') }}">
                                            <label for="subject">Subject</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea name="message" class="form-control border-0"
                                                placeholder="Leave a message here" id="message"
                                                style="height: 160px">{{ old('message') }}</textarea>
                                            <label for="message">Message</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Google Map -->
                <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.2s">
                    <div class="rounded h-100">
                        <iframe class="rounded h-100 w-100" style="height: 400px;"
                            src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3311.6119312312976!2d35.504731!3d33.899647!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2s!5e0!3m2!1sen!2sae!4v1758788745162!5m2!1sen!2sae"
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection