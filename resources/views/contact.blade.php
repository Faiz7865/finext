@extends('layouts.app')

@section('title', 'Contact')

@section('content')

    <div class="breadcroumb-area">
        <div class="container">
            <div class="breadcroumn-contnt">
                <h2 class="brea-title">
                    Contact Us </h2>
                <div class="bre-sub">
                    <span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="Go to Home."
                            href="{{ route('home') }}" class="home"><span property="name">Home</span></a>
                        <meta property="position" content="1">
                    </span> &gt; <span property="itemListElement" typeof="ListItem"><span property="name"
                            class="post post-page current-item">Contact Us</span>
                    </span>
                </div>
            </div>
        </div>
    </div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- General Error --}}
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

    <section class="fnx-contact-bar-section">
        <div class="container">
            <div class="fnx-contact-bar">
                <div class="row text-center align-items-center">
                    <div class="col-md-4">
                        <div class="fnx-bar-item">
                            <i class="fa-solid fa-phone"></i>
                            <p><a href="tel:+919258020120" style="color: inherit; text-decoration: none;">+91 92580 20120</a></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="fnx-bar-item">
                            <i class="fa-solid fa-envelope"></i>
                            <p><a href="mailto:Support@finextsolution.com" style="color: inherit; text-decoration: none;">Support@finextsolution.com</a> <br> <a href="mailto:Finextsolution@gmail.com" style="color: inherit; text-decoration: none;">Finextsolution@gmail.com</a></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="fnx-bar-item">
                            <i class="fa-solid fa-location-dot"></i>
                            <p>Bijnor, Uttar Pradesh <br> Pin Code 246701</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="fnx-leave-message-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4">
                    <div class="fnx-message-image">
                        <div class="fnx-image-overlay"></div>
                        <div class="fnx-image-content">
                            <h2>Let's working together</h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="fnx-form-wrapper">
                        <h2 class="fnx-form-header">Send A Message</h2>
                        <p class="fnx-form-text">Have a fintech idea or project? Let's discuss how Finext Solution can turn it into a secure, scalable, and profitable digital solution for your business needs.</p>

                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error!</strong> Please check the form and try again.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form action="{{ route('contact.submit') }}" method="POST" class="fnx-main-form">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="restly-input name">
                                        <input type="text" name="name" placeholder="Full Name" value="{{ old('name') }}" required>
                                        @error('name')
                                            <span class="text-danger" style="font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="restly-input email">
                                        <input type="email" name="email" placeholder="Your Email" value="{{ old('email') }}" required>
                                        @error('email')
                                            <span class="text-danger" style="font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="restly-input phone">
                                        <input type="tel" name="phone" placeholder="Your Phone" value="{{ old('phone') }}" required>
                                        @error('phone')
                                            <span class="text-danger" style="font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="restly-input subject">
                                        <input type="text" name="subject" placeholder="Subject" value="{{ old('subject') }}" required>
                                        @error('subject')
                                            <span class="text-danger" style="font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="restly-input message">
                                        <textarea name="message" rows="7" placeholder="Your Message" required>{{ old('message') }}</textarea>
                                        @error('message')
                                            <span class="text-danger" style="font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div style="display: flex; align-items: flex-start; gap: 10px; margin-bottom: 20px;">
                                        <input type="checkbox" name="consent_communications" id="consent_communications"
                                            {{ old('consent_communications') ? 'checked' : '' }} required style="margin-top: 5px;">
                                        <label for="consent_communications" style="font-size: 12px; color: #666; margin: 0;">
                                            I consent to receiving RCS, WhatsApp, Email, or SMS from Finextsolution.com & I have reviewed and agreed to Terms & Conditions and Privacy Policy.
                                        </label>
                                    </div>
                                    @error('consent_communications')
                                        <span class="text-danger" style="font-size: 12px; display: block; margin-bottom: 10px;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn-custom-round btn-primary-custom">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection