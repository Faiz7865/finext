@extends('layouts.app')

@section('title', 'PAN Card Admin Software')

@section('content')

    <div class="breadcroumb-area">
        <div class="container">
            <div class="breadcroumn-contnt">
                <h2 class="brea-title">
                    PAN Card Admin Software </h2>
                <div class="bre-sub">
                    <span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="Go to Home."
                            href="{{ route('home') }}" class="home"><span property="name">Home</span></a>
                        <meta property="position" content="1">
                    </span> &gt; <span property="itemListElement" typeof="ListItem"><span property="name"
                            class="post post-page current-item">PAN Card Admin Software</span>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <section class="fnx-service-grid-section">
        <div class="container">
            <div class="fnx-title-box text-center">
                <h6 class="fnx-subtitle">Digital Identity Solutions</h6>
                <h2 class="fnx-main-title">Pan Card Portal with Complete Admin Management</h2>
            </div>

            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="fnx-card-six fnx-transition">
                        <div class="fnx-card-img">
                            <img src="{{ asset('assets/img/service-1.jpg') }}"
                                alt="API Integration">
                        </div>
                        <div class="fnx-card-body fnx-transition">
                            <div class="fnx-card-icon fnx-transition">
                                <i class="fa-solid fa-link"></i>
                            </div>
                            <div class="fnx-card-content fnx-transition">
                                <h3 class="fnx-card-title fnx-transition">NSDL/UTI API Integration</h3>
                                <div class="fnx-card-text fnx-transition">
                                    <p>Seamless integration with NSDL or UTI APIs for direct PAN application submission.</p>
                                </div>
                                <div class="fnx-card-btn">
                                    <a href="{{ route('contact') }}" class="btn-primary-custom btn-custom-round">Learn More <i
                                            class="fa-solid fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="fnx-card-six fnx-transition">
                        <div class="fnx-card-img">
                            <img src="{{ asset('assets/img/service-2.jpg') }}"
                                alt="User Management">
                        </div>
                        <div class="fnx-card-body fnx-transition">
                            <div class="fnx-card-icon fnx-transition">
                                <i class="fa-solid fa-users-gear"></i>
                            </div>
                            <div class="fnx-card-content fnx-transition">
                                <h3 class="fnx-card-title fnx-transition">Admin, Distributor & Retailer Logins</h3>
                                <div class="fnx-card-text fnx-transition">
                                    <p>Role-based access control with dedicated panels for different user levels.</p>
                                </div>
                                <div class="fnx-card-btn">
                                    <a href="{{ route('contact') }}" class="btn-primary-custom btn-custom-round">Learn More <i
                                            class="fa-solid fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="fnx-card-six fnx-transition">
                        <div class="fnx-card-img">
                            <img src="{{ asset('assets/img/service-3.jpg') }}"
                                alt="Status Tracking">
                        </div>
                        <div class="fnx-card-body fnx-transition">
                            <div class="fnx-card-icon fnx-transition">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <div class="fnx-card-content fnx-transition">
                                <h3 class="fnx-card-title fnx-transition">Application Status Tracking</h3>
                                <div class="fnx-card-text fnx-transition">
                                    <p>Real-time application status updates and tracking for complete transparency.</p>
                                </div>
                                <div class="fnx-card-btn">
                                    <a href="{{ route('contact') }}" class="btn-primary-custom btn-custom-round">Learn More <i
                                            class="fa-solid fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="fnx-card-six fnx-transition">
                        <div class="fnx-card-img">
                            <img src="{{ asset('assets/img/service-4.jpg') }}"
                                alt="Wallet & Commission">
                        </div>
                        <div class="fnx-card-body fnx-transition">
                            <div class="fnx-card-icon fnx-transition">
                                <i class="fa-solid fa-wallet"></i>
                            </div>
                            <div class="fnx-card-content fnx-transition">
                                <h3 class="fnx-card-title fnx-transition">Wallet & Commission System</h3>
                                <div class="fnx-card-text fnx-transition">
                                    <p>Automated wallet management and commission calculations for all user levels.</p>
                                </div>
                                <div class="fnx-card-btn">
                                    <a href="{{ route('contact') }}" class="btn-primary-custom btn-custom-round">Learn More <i
                                            class="fa-solid fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="fnx-about-wrapper">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="fnx-about-content">
                        <h6 class="restly-about-stitle"><span>PAN Card Solutions</span></h6>
                        <h2 class="restly-about-title">Complete PAN Card Management Platform for Agents & CSC Centers</h2>
                        <div class="restly-about-dec">
                            <p>Our PAN Card Admin Software helps businesses, agents, and CSC centers to generate and manage PAN card applications with a full-featured admin panel. Integrate UTI/NSDL APIs and track real-time application statuses with ease.</p>
                            <ul>
                                <li>White-label portal with custom branding options</li>
                                <li>Real-time updates and detailed reporting</li>
                                <li>SMS/email alerts for transparency and communication</li>
                            </ul>
                        </div>
                        <div class="fnx-button-area">
                            <a href="{{ route('contact') }}" class="theme-btns">Get Your PAN Solution</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="fnx-image-box">
                        <img loading="lazy" src="{{ asset('assets/img/about.webp') }}" class="fnx-main-img" alt="PAN Card Software">
                        <img src="{{ asset('assets/img/shape.webp') }}" alt="Shape" class="fnx-shape-anim">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="fnx-main-process-area services-process">
        <div class="container">

            <div class="restly-section-title-wrapper">
                <div class="restly-section-title">
                    <h6 class="restly-section-stitle"><span>Development Process</span></h6>
                    <h2 class="restly-section-title">Pan Card Software Development Process</h2>
                </div>
            </div>

            <div class="fnx-steps-grid">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="fnx-process-card">
                            <div class="fnx-icon-circle">
                                <i class="fa-solid fa-comments"></i>
                            </div>
                            <h2 class="fnx-title">Requirement Gathering</h2>
                            <div class="fnx-desc">
                                <p>We identify the required APIs, user levels, document flows, and business requirements.</p>
                            </div>
                            <a href="{{ route('contact') }}" class="fnx-btn">Learn More <i class="fas fa-arrow-right"></i></a>
                            <label class="fnx-number">01</label>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="fnx-process-card">
                            <div class="fnx-icon-circle">
                                <i class="fa-solid fa-layer-group"></i>
                            </div>
                            <h2 class="fnx-title">Admin Panel Setup</h2>
                            <div class="fnx-desc">
                                <p>We build your portal with user roles, document uploads, verification, and reporting.</p>
                            </div>
                            <a href="{{ route('contact') }}" class="fnx-btn">Learn More <i class="fas fa-arrow-right"></i></a>
                            <label class="fnx-number">02</label>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="fnx-process-card">
                            <div class="fnx-icon-circle">
                                <i class="fa-solid fa-plug"></i>
                            </div>
                            <h2 class="fnx-title">API Configuration</h2>
                            <div class="fnx-desc">
                                <p>We integrate NSDL or UTI APIs and set up secure communication channels.</p>
                            </div>
                            <a href="{{ route('contact') }}" class="fnx-btn">Learn More <i class="fas fa-arrow-right"></i></a>
                            <label class="fnx-number">03</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" style="margin-top: 40px;">
                <div class="col-lg-12">
                    <div class="fnx-process-card" style="text-align: center;">
                        <div class="fnx-icon-circle" style="margin: 0 auto 20px;">
                            <i class="fa-solid fa-rocket"></i>
                        </div>
                        <h2 class="fnx-title">Live Testing & Go Live</h2>
                        <div class="fnx-desc">
                            <p>We test the system with dummy submissions and ensure smooth go-live deployment.</p>
                        </div>
                        <a href="{{ route('contact') }}" class="fnx-btn">Learn More <i class="fas fa-arrow-right"></i></a>
                        <label class="fnx-number">04</label>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="fnx-contact-section">
        <div class="container">
            <div class="fnx-contact-inner-wrapper">
                <div class="row">
                    <div class="col-lg-8 fnx-form-column">
                        <div class="restly-section-title-wrapper">
                            <div class="restly-section-title">
                                <h2 class="restly-section-title">Deploy Your PAN Card System</h2>
                            </div>
                        </div>

                        <div class="restly-home-form">
                            <form action="#" method="post" class="wpcf7-form">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="restly-input name">
                                            <input type="text" name="yourname" placeholder="Your Name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="restly-input email">
                                            <input type="email" name="youremail" placeholder="Your Email" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="restly-input phone">
                                            <input type="tel" name="yourphone" placeholder="Your Phone" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="restly-input website">
                                            <input type="text" name="website" placeholder="Your Company" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="restly-input message">
                                            <textarea name="message" rows="4" placeholder="Tell us about your PAN card business requirements."></textarea>
                                        </div>
                                        <div class="restly-message-btn">
                                            <input type="submit" value="Send Message">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-lg-4 fnx-info-column">
                        <div class="restly-contact-info">
                            <div class="fnx-background-overlay"></div>
                            <h2 class="contact-info-title">Need Help?</h2>
                            <div class="restly-contact-info-items">

                                <div class="restly-cinfo">
                                    <div class="restly-cinfo-icon">
                                        <i class="fa-solid fa-phone"></i>
                                    </div>
                                    <div class="restly-cinfo-dec">
                                        <span>Call Us</span>
                                        <p><a href="tel:+919258020120" style="color: inherit; text-decoration: none;">+91 92580 20120</a></p>
                                    </div>
                                </div>

                                <div class="restly-cinfo">
                                    <div class="restly-cinfo-icon">
                                        <i class="fa-regular fa-envelope"></i>
                                    </div>
                                    <div class="restly-cinfo-dec">
                                        <span>Write to us</span>
                                        <p><a href="mailto:Support@finextsolution.com" style="color: inherit; text-decoration: none;">Support@finextsolution.com</a></p>
                                    </div>
                                </div>

                                <div class="restly-cinfo">
                                    <div class="restly-cinfo-icon">
                                        <i class="fa-solid fa-clock"></i>
                                    </div>
                                    <div class="restly-cinfo-dec">
                                        <span>Office Location</span>
                                        <p>Bijnor, Uttar Pradesh 246701</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection