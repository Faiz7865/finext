@extends('layouts.app')

@section('title', 'Lead Form')

@section('content')

    <div class="breadcroumb-area">
        <div class="container">
            <div class="breadcroumn-contnt">
                <h2 class="brea-title">
                    Get Started </h2>
                <div class="bre-sub">
                    <span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="Go to Home."
                            href="{{ route('home') }}" class="home"><span property="name">Home</span></a>
                        <meta property="position" content="1">
                    </span> &gt; <span property="itemListElement" typeof="ListItem"><span property="name"
                            class="post post-page current-item">Get Started</span>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <section class="fnx-leave-message-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="py-5 text-center">
                        <h2 class="fnx-form-header">Tell Us About Your Project</h2>
                        <p class="fnx-form-text">Share your fintech vision with us. Whether it's a mobile app, web platform, or
                            payment solution, we're ready to turn your idea into a scalable, secure, and profitable digital product.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-4">
                    <div class="fnx-message-image">
                        <div class="fnx-image-overlay"></div>
                        <div class="fnx-image-content">
                            <h2>Start Your Journey</h2>
                            <p style="margin-top: 15px; color: white; font-size: 14px;">Transform your fintech ideas into
                                reality with Finext Solution's cutting-edge technology and expert team.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="fnx-form-wrapper">

                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error!</strong> Please check the form and try again.
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <form action="{{ route('lead.submit') }}" method="POST" class="fnx-main-form">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="restly-input name">
                                        <input type="text" name="first_name" placeholder="First Name"
                                            value="{{ old('first_name') }}" required>
                                        @error('first_name')
                                            <span class="text-danger" style="font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="restly-input name">
                                        <input type="text" name="last_name" placeholder="Last Name"
                                            value="{{ old('last_name') }}" required>
                                        @error('last_name')
                                            <span class="text-danger" style="font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="restly-input email">
                                        <input type="email" name="email" placeholder="Your Email"
                                            value="{{ old('email') }}" required>
                                        @error('email')
                                            <span class="text-danger" style="font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="restly-input phone">
                                        <input type="tel" name="phone" placeholder="Your Phone"
                                            value="{{ old('phone') }}" required>
                                        @error('phone')
                                            <span class="text-danger" style="font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="restly-input">
                                        <input type="text" name="company" placeholder="Company Name"
                                            value="{{ old('company') }}" required>
                                        @error('company')
                                            <span class="text-danger" style="font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="restly-input">
                                        <select name="service_type" class="form-control" required
                                            style="padding: 12px; border: 1px solid #e0e0e0; border-radius: 5px;">
                                            <option value="">Select Service Type</option>
                                            <option value="fintech-software"
                                                {{ old('service_type') == 'fintech-software' ? 'selected' : '' }}>Fintech
                                                Software Development</option>
                                            <option value="mobile-app"
                                                {{ old('service_type') == 'mobile-app' ? 'selected' : '' }}>Mobile App
                                                Development</option>
                                            <option value="web-development"
                                                {{ old('service_type') == 'web-development' ? 'selected' : '' }}>Custom Web
                                                Development</option>
                                            <option value="api-integration"
                                                {{ old('service_type') == 'api-integration' ? 'selected' : '' }}>API
                                                Integration</option>
                                            <option value="e-commerce"
                                                {{ old('service_type') == 'e-commerce' ? 'selected' : '' }}>E-commerce
                                                Software</option>
                                            <option value="ui-ux" {{ old('service_type') == 'ui-ux' ? 'selected' : '' }}>
                                                UI/UX Design</option>
                                            <option value="other" {{ old('service_type') == 'other' ? 'selected' : '' }}>
                                                Other</option>
                                        </select>
                                        @error('service_type')
                                            <span class="text-danger" style="font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="restly-input">
                                        <select name="budget" class="form-control" required
                                            style="padding: 12px; border: 1px solid #e0e0e0; border-radius: 5px;">
                                            <option value="">Select Budget Range</option>
                                            <option value="10k-25k" {{ old('budget') == '10k-25k' ? 'selected' : '' }}>
                                                ₹10,000 - ₹25,000</option>
                                            <option value="25k-50k" {{ old('budget') == '25k-50k' ? 'selected' : '' }}>
                                                ₹25,000 - ₹50,000</option>
                                            <option value="50k-100k" {{ old('budget') == '50k-100k' ? 'selected' : '' }}>
                                                ₹50,000 - ₹1,00,000</option>
                                            <option value="100k-500k"
                                                {{ old('budget') == '100k-500k' ? 'selected' : '' }}>₹1,00,000 - ₹5,00,000
                                            </option>
                                            <option value="500k+" {{ old('budget') == '500k+' ? 'selected' : '' }}>
                                                ₹5,00,000+</option>
                                        </select>
                                        @error('budget')
                                            <span class="text-danger" style="font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="restly-input message">
                                        <textarea name="project_description" rows="6"
                                            placeholder="Describe your project idea, goals, and requirements..." required>{{ old('project_description') }}</textarea>
                                        @error('project_description')
                                            <span class="text-danger" style="font-size: 12px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div style="display: flex; align-items: flex-start; gap: 10px; margin-bottom: 20px;">
                                        <input type="checkbox" name="consent_communications" id="consent_communications"
                                            {{ old('consent_communications') ? 'checked' : '' }} required style="margin-top: 5px;">
                                        <label for="consent_communications" style="font-size: 12px; color: #666; margin: 0;">
                                            I consent to receiving RCS, WhatsApp, Email, or SMS from Finextsolution.com & I have reviewed and agreed to Terms & Conditions and Privacy Policy
                                        </label>
                                    </div>
                                    @error('consent_communications')
                                        <span class="text-danger"
                                            style="font-size: 12px; display: block; margin-bottom: 10px;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn-custom-round btn-primary-custom">Get Started
                                        Now</button>
                                </div>
                            </div>
                        </form>

                        <p style="margin-top: 20px; font-size: 12px; color: #999; text-align: center;">
                            We'll review your project details and contact you within 24 hours to discuss your requirements.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
