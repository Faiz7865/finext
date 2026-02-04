@extends('layouts.app')

@section('title', 'E-commerce Software')

@section('content')

    <div class="breadcroumb-area">
        <div class="container">
            <div class="breadcroumn-contnt">
                <h2 class="brea-title">
                    E-commerce Software </h2>
                <div class="bre-sub">
                    <span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="Go to Home."
                            href="{{ route('home') }}" class="home"><span property="name">Home</span></a>
                        <meta property="position" content="1">
                    </span> &gt; <span property="itemListElement" typeof="ListItem"><span property="name"
                            class="post post-page current-item">E-commerce Software</span>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <section class="fnx-service-grid-section">
        <div class="container">
            <div class="fnx-title-box text-center">
                <h6 class="fnx-subtitle">Online Store Solutions</h6>
                <h2 class="fnx-main-title">Complete E-commerce Platform for Your Business</h2>
            </div>

            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="fnx-card-six fnx-transition">
                        <div class="fnx-card-img">
                            <img src="{{ asset('assets/img/service-1.jpg') }}"
                                alt="Product Management">
                        </div>
                        <div class="fnx-card-body fnx-transition">
                            <div class="fnx-card-icon fnx-transition">
                                <i class="fa-solid fa-box"></i>
                            </div>
                            <div class="fnx-card-content fnx-transition">
                                <h3 class="fnx-card-title fnx-transition">Product & Inventory Management</h3>
                                <div class="fnx-card-text fnx-transition">
                                    <p>Easy product catalog management with real-time inventory tracking and stock level alerts.</p>
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
                                alt="Vendor Management">
                        </div>
                        <div class="fnx-card-body fnx-transition">
                            <div class="fnx-card-icon fnx-transition">
                                <i class="fa-solid fa-users"></i>
                            </div>
                            <div class="fnx-card-content fnx-transition">
                                <h3 class="fnx-card-title fnx-transition">Admin & Multi-Vendor Panels</h3>
                                <div class="fnx-card-text fnx-transition">
                                    <p>Support for single vendor or multi-vendor setup with dedicated vendor management and commission tracking.</p>
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
                                alt="Payment Integration">
                        </div>
                        <div class="fnx-card-body fnx-transition">
                            <div class="fnx-card-icon fnx-transition">
                                <i class="fa-solid fa-credit-card"></i>
                            </div>
                            <div class="fnx-card-content fnx-transition">
                                <h3 class="fnx-card-title fnx-transition">Payment Gateway Integration</h3>
                                <div class="fnx-card-text fnx-transition">
                                    <p>Support for multiple payment gateways with secure transaction processing and automatic reconciliation.</p>
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
                                alt="Marketing Tools">
                        </div>
                        <div class="fnx-card-body fnx-transition">
                            <div class="fnx-card-icon fnx-transition">
                                <i class="fa-solid fa-tags"></i>
                            </div>
                            <div class="fnx-card-content fnx-transition">
                                <h3 class="fnx-card-title fnx-transition">Coupons, Offers & Analytics</h3>
                                <div class="fnx-card-text fnx-transition">
                                    <p>Advanced marketing tools with coupon management, promotional offers, and comprehensive sales analytics.</p>
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
                        <h6 class="restly-about-stitle"><span>E-commerce Solutions</span></h6>
                        <h2 class="restly-about-title">Launch Your Online Store with Complete E-commerce Platform</h2>
                        <div class="restly-about-dec">
                            <p>Launch your online store with our E-commerce Software, designed for scalability, flexibility, and smooth shopping experiences. We provide multi-vendor, single vendor, or custom feature setups with powerful admin controls. From groceries to electronics, fashion to digital products – our e-commerce platform is ready for any industry.</p>
                            <ul>
                                <li>Order & shipping management with tracking</li>
                                <li>Android & iOS mobile app development available</li>
                                <li>Advanced reporting and sales analytics</li>
                            </ul>
                        </div>
                        <div class="fnx-button-area">
                            <a href="{{ route('contact') }}" class="theme-btns">Build Your Online Store</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="fnx-image-box">
                        <img loading="lazy" src="{{ asset('assets/img/about.webp') }}" class="fnx-main-img" alt="E-commerce Solution">
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
                    <h6 class="restly-section-stitle"><span>Development Workflow</span></h6>
                    <h2 class="restly-section-title">How We Build Your E-commerce Platform</h2>
                </div>
            </div>

            <div class="fnx-steps-grid">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="fnx-process-card">
                            <div class="fnx-icon-circle">
                                <i class="fa-solid fa-chart-pie"></i>
                            </div>
                            <h2 class="fnx-title">Requirement Planning</h2>
                            <div class="fnx-desc">
                                <p>We understand your product types, vendors, shipping flow, and business goals for custom solutions.</p>
                            </div>
                            <a href="{{ route('contact') }}" class="fnx-btn">Learn More <i class="fas fa-arrow-right"></i></a>
                            <label class="fnx-number">01</label>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="fnx-process-card">
                            <div class="fnx-icon-circle">
                                <i class="fa-solid fa-palette"></i>
                            </div>
                            <h2 class="fnx-title">Design & Development</h2>
                            <div class="fnx-desc">
                                <p>We design intuitive UI and develop robust backend logic for customer and admin panels.</p>
                            </div>
                            <a href="{{ route('contact') }}" class="fnx-btn">Learn More <i class="fas fa-arrow-right"></i></a>
                            <label class="fnx-number">02</label>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="fnx-process-card">
                            <div class="fnx-icon-circle">
                                <i class="fa-solid fa-credit-card"></i>
                            </div>
                            <h2 class="fnx-title">Payment & Shipping Setup</h2>
                            <div class="fnx-desc">
                                <p>We configure payment gateways, shipping zones, tax rules, and user notifications for smooth operations.</p>
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
                        <h2 class="fnx-title">Testing & Launch</h2>
                        <div class="fnx-desc">
                            <p>After comprehensive testing and team training, we hand over your store and assist with live deployment.</p>
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
                                <h2 class="restly-section-title">Launch Your E-commerce Store</h2>
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
                                            <textarea name="message" rows="4" placeholder="Tell us about your e-commerce store requirements."></textarea>
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