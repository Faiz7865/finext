@extends('layouts.app')

@section('title', 'Home')

@section('content')
<section id="home"
    style="background: url({{ asset('assets/img/banner.webp') }}) no-repeat center center / cover; min-height: 100vh;">
    <div class="container position-relative z-1 text-white">
        <div class="mx-auto text-center" style="max-width: 800px;">
            <p class="text-white fw-bold text-uppercase tracking-wider mb-30">Trusted Fintech Software Company</p>
            <h1 class="banner-heading">Fintech Software Solutions</h1>
            <p class="lead text-light mb-5 opacity-75">
                Finext Solution delivers modern banking platforms, secure APIs, digital lending tools, and custom fintech applications — designed to scale your business.
            </p>
            <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center">
                <a href="{{ route('pricing') }}" class="btn-primary-custom btn-custom-round">
                    View Pricing
                </a>
                <a href="{{ route('contact') }}" class="btn-primary-custom btn-custom-round">Get Free Demo</a>
            </div>
        </div>
    </div>
</section>

<section id="services" class="section-padding">
    <div class="container">
        <div class="text-center mx-auto mb-5">
            <p class="section-subtitle">What We Offer</p>
            <h2 class="section-title">Complete Fintech & IT Solutions Under One Roof</h2>
        </div>

        <div class="row">
            <div class="col-md-6 col-lg-4">
                <div class="card card-hover">
                    <div class="service-icon mb-4"><i class="fa-solid fa-code"></i></div>
                    <h3 class="card-title">Fintech Software Development</h3>
                    <p class="card-description">Custom fintech platforms for banks & NBFCs with real-time reporting & data security features.</p>
                    <a href="{{ route('fintech-software-development') }}" class="card-link">
                        Read More <i class="fa-solid fa-arrow-right small"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card card-hover">
                    <div class="service-icon mb-4"><i class="fa-solid fa-mobile-screen"></i></div>
                    <h3 class="card-title">Mobile App Development</h3>
                    <p class="card-description">Native and cross-platform mobile applications for seamless fintech user experiences.</p>
                    <a href="{{ route('mobile-app-development') }}" class="card-link">
                        Read More <i class="fa-solid fa-arrow-right small"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card card-hover">
                    <div class="service-icon mb-4"><i class="fa-solid fa-globe"></i></div>
                    <h3 class="card-title">Custom Web Development</h3>
                    <p class="card-description">End-to-end web solutions with seamless API & third-party integrations for your business.</p>
                    <a href="{{ route('custom-web-development') }}" class="card-link">
                        Read More <i class="fa-solid fa-arrow-right small"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card card-hover">
                    <div class="service-icon mb-4"><i class="fa-regular fa-credit-card"></i></div>
                    <h3 class="card-title">AEPS Admin Software</h3>
                    <p class="card-description">Comprehensive Aadhaar Enabled Payment System solutions for digital banking services.</p>
                    <a href="{{ route('aeps-admin-software') }}" class="card-link">
                        Read More <i class="fa-solid fa-arrow-right small"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card card-hover">
                    <div class="service-icon mb-4"><i class="fa-solid fa-chart-simple"></i></div>
                    <h3 class="card-title">Recharge Admin Software</h3>
                    <p class="card-description">Complete recharge management platform with multi-operator support and real-time analytics.</p>
                    <a href="{{ route('recharge-admin-software') }}" class="card-link">
                        Read More <i class="fa-solid fa-arrow-right small"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card card-hover">
                    <div class="service-icon mb-4"><i class="fa-solid fa-gears"></i></div>
                    <h3 class="card-title">API Provider Services</h3>
                    <p class="card-description">Robust API solutions for payment gateways, banking services, and third-party integrations.</p>
                    <a href="{{ route('api-provider') }}" class="card-link">
                        Read More <i class="fa-solid fa-arrow-right small"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card card-hover">
                    <div class="service-icon mb-4"><i class="fa-solid fa-palette"></i></div>
                    <h3 class="card-title">UI/UX & Web Design</h3>
                    <p class="card-description">Creative and user-centric design solutions for beautiful and functional digital experiences.</p>
                    <a href="{{ route('ui-ux-design') }}" class="card-link">
                        Read More <i class="fa-solid fa-arrow-right small"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card card-hover">
                    <div class="service-icon mb-4"><i class="fa-solid fa-shopping-cart"></i></div>
                    <h3 class="card-title">E-Commerce Software</h3>
                    <p class="card-description">Complete e-commerce solutions with payment integration, inventory management, and analytics.</p>
                    <a href="{{ route('ecommerce-software') }}" class="card-link">
                        Read More <i class="fa-solid fa-arrow-right small"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-about">
    <div class="container">
        <div class="row align-items-center g-">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="about-img-wrapper">
                    <img src="{{ asset('assets/img/project.avif') }}"
                        alt="Team working">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="about-content">
                    <p class="section-about-subtitle mb-2">About Us</p>
                    <h2 class="section-about-title">We're a Fintech Software Solution Provider</h2>

                    <p class="section-description">
                        At Finext Solution, we specialize in building secure, scalable, and future-ready software for NBFCs, banks, and fintech startups. From loan management systems to payment gateway integrations — we provide end-to-end digital finance solutions.
                    </p>

                    <div class="about-button-wrapper">
                        <a href="{{ route('about') }}" class="btn-primary-custom btn-custom-round">Get Free Demo</a>

                        <div class="d-flex align-items-center gap-3">
                            <div class="contact-icon-circle">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <div>
                                <p class="small text-muted mb-0">Call us anytime</p>
                                <p class="fw-bold mb-0" style="color: var(--navy-dark);"><a href="tel:+919258020120" style="color: var(--navy-dark); text-decoration: none;">+91 92580 20120</a></p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="stat-item">
                                <h3 class="display-6 fw-bold text-primary mb-0">100+</h3>
                                <p class="">Fintech Projects Delivered</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="stat-item">
                                <h3 class="display-6 fw-bold text-primary mb-0">3k+</h3>
                                <p class="">Satisfied Clients</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="process_wrapper">
    <div class="container text-center">
        <div class="process-header">
            <p class="section-subtitle">Work Process</p>
            <h2 class="section-title">Our Proven Fintech & IT Workflow</h2>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-6">
                <div class="process-item">
                    <div class="process-icon-wrapper">
                        <div class="process-icon">
                            <span class="step-badge">01</span>
                            <i class="fa-solid fa-clipboard-list"></i>
                        </div>
                    </div>
                    <h4 class="process-name">Requirement Gathering & Research</h4>
                    <p class="process-desc">We analyze your business needs and market requirements to create a strategic roadmap.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="process-item">
                    <div class="process-icon-wrapper">
                        <div class="process-icon">
                            <span class="step-badge">02</span>
                            <i class="fa-solid fa-calculator"></i>
                        </div>
                    </div>
                    <h4 class="process-name">Business Logic Planning & Compliance</h4>
                    <p class="process-desc">We design solutions following best practices and regulatory compliance standards.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="process-item">
                    <div class="process-icon-wrapper">
                        <div class="process-icon">
                            <span class="step-badge">03</span>
                            <i class="fa-solid fa-chart-line"></i>
                        </div>
                    </div>
                    <h4 class="process-name">UI/UX Design & Development</h4>
                    <p class="process-desc">Our team creates intuitive interfaces and develops robust, scalable applications.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="process-item">
                    <div class="process-icon-wrapper">
                        <div class="process-icon">
                            <span class="step-badge">04</span>
                            <i class="fa-solid fa-award"></i>
                        </div>
                    </div>
                    <h4 class="process-name">Testing, QA & Secure Deployment</h4>
                    <p class="process-desc">We ensure quality assurance and secure deployment with continuous monitoring.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="appointment-padding">
    <div class="container">
        <div class="appointment-card shadow-sm border-0">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="appointment-form-content">
                        <h2 class="appointment-title">Make An Appointment</h2>
                        <p class="appointment-description">Get in touch with our team for your fintech project</p>

                        <form>
                            <div class="mb-3">
                                <select class="form-select custom-input" aria-label="Select Service">
                                    <option value="">Select a service</option>
                                    <option value="fintech">Fintech Software Development</option>
                                    <option value="mobile">Mobile App Development</option>
                                    <option value="web">Custom Web Development</option>
                                    <option value="aeps">AEPS Admin Software</option>
                                    <option value="api">API Provider Services</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <input type="email" class="form-control custom-input" placeholder="Your Email">
                            </div>
                            <button type="submit"
                                class="btn-primary-custom btn-custom-round btn-custom-small d-block w-100">SEND
                                MESSAGE</button>
                        </form>

                        <div class="call-to-action">
                            <p>Facing Any Problem To Get A Quote</p>
                            <h4>Call: <a href="tel:+919258020120" class="text-primary-custom text-decoration-none">+91 92580 20120</a></h4>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="appointment-img-wrapper">
                        <img src="{{ asset('assets/img/appointment.avif') }}"
                            alt="Team Meeting" class="img-fluid rounded-4">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-leadership">
    <div class="container text-center">
        <div class="leadership-header">
            <p class="section-subtitle">Who We Are</p>
            <h2 class="section-title">Our Leadership Team</h2>
        </div>

        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="team-card">
                    <div class="team-img-box">
                        <img src="{{ asset('assets/img/team-1.avif') }}"
                            alt="Harry Steve">
                        <div class="team-social">
                            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="#"><i class="fa-brands fa-twitter"></i></a>
                            <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                            <a href="#"><i class="fa-brands fa-pinterest-p"></i></a>
                            <a href="#" class="plus-icon"><i class="fa-solid fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="team-info">
                        <h4 class="member-name">Harry Steve</h4>
                        <p class="member-role">Web Designer</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="team-card">
                    <div class="team-img-box">
                        <img src="{{ asset('assets/img/team-2.avif') }}"
                            alt="Claire Divas">
                        <div class="team-social">
                            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="#"><i class="fa-brands fa-twitter"></i></a>
                            <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                            <a href="#"><i class="fa-brands fa-pinterest-p"></i></a>
                            <a href="#" class="plus-icon"><i class="fa-solid fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="team-info">
                        <h4 class="member-name">Claire Divas</h4>
                        <p class="member-role">Web Designer</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="team-card">
                    <div class="team-img-box">
                        <img src="{{ asset('assets/img/team-3.avif') }}"
                            alt="Hobilar David">
                        <div class="team-social">
                            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="#"><i class="fa-brands fa-twitter"></i></a>
                            <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                            <a href="#"><i class="fa-brands fa-pinterest-p"></i></a>
                            <a href="#" class="plus-icon"><i class="fa-solid fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="team-info">
                        <h4 class="member-name">Hobilar David</h4>
                        <p class="member-role">Software Engineer</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="team-card">
                    <div class="team-img-box">
                        <img src="{{ asset('assets/img/team-4.avif') }}"
                            alt="Makhaia Antitni">
                        <div class="team-social">
                            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="#"><i class="fa-brands fa-twitter"></i></a>
                            <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                            <a href="#"><i class="fa-brands fa-pinterest-p"></i></a>
                            <a href="#" class="plus-icon"><i class="fa-solid fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="team-info">
                        <h4 class="member-name">Makhaia Antitni</h4>
                        <p class="member-role">Developer</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-testimonials">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="testimonial-content">
                    <p class="section-subtitle">Our Customer Feedbacks</p>
                    <h2 class="section-title">Client's Testimonials</h2>

                    <div id="clientCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="5000">
                                <div class="quote-icon">
                                    <i class="fa-solid fa-quote-left"></i>
                                </div>
                                <p class="testimonial-text">
                                    "Finext-Solution team ne hamare liye website banai jo design aur performance dono me best hai. 100% recommended!"
                                </p>
                            </div>
                            <div class="carousel-item" data-bs-interval="5000">
                                <div class="quote-icon">
                                    <i class="fa-solid fa-quote-left"></i>
                                </div>
                                <p class="testimonial-text">
                                    "Finext ke saath kaam karke kaafi acha experience raha. Inka app development fast aur reliable tha."
                                </p>
                            </div>
                            <div class="carousel-item" data-bs-interval="5000">
                                <div class="quote-icon">
                                    <i class="fa-solid fa-quote-left"></i>
                                </div>
                                <p class="testimonial-text">
                                    "Unki SEO & Analytics service ne hamare business ko Google pe top rank par le aaya. Great work Finext!"
                                </p>
                            </div>
                        </div>

                        <div class="testimonial-button">
                            <button type="button" data-bs-target="#clientCarousel" data-bs-slide="prev">
                                <i class="fa-solid fa-arrow-left"></i>
                            </button>
                            <button type="button" data-bs-target="#clientCarousel" data-bs-slide="next">
                                <i class="fa-solid fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="testimonial-image-grid d-flex gap-3 align-items-center justify-content-end">
                    <div class="left-img">
                        <img src="{{ asset('assets/img/testimonial-1.avif') }}"
                            alt="Meeting">
                        <img src="{{ asset('assets/img/testimonial-2.avif') }}"
                            alt="Design">
                    </div>
                    <div class="right-img">
                        <img src="{{ asset('assets/img/testimonial-3.avif') }}"
                            alt="Team">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-blog">
    <div class="container">
        <div class="text-center mb-5">
            <p class="section-subtitle">Our Blog</p>
            <h2 class="section-title">Get News & Blog</h2>
        </div>

        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="blog-card">
                    <div class="blog-img">
                        <img src="{{ asset('assets/img/blog-3.avif') }}"
                            alt="Blog 1" class="img-fluid">
                    </div>
                    <div class="blog-body">
                        <div class="blog-meta">
                            <span><i class="fa-regular fa-calendar-days me-1"></i> April 10, 2021</span>
                            <span><i class="fa-regular fa-user me-1"></i> by Finext Solution</span>
                        </div>
                        <h4 class="blog-title">Keep Your Business Safe Ensure High Availability.</h4>
                        <p>We've been a strategy thought leader for nearly five decades and we...</p>
                        <a href="#" class="read-more-link">
                            Read More <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="blog-card">
                    <div class="blog-img">
                        <img src="{{ asset('assets/img/blog-4.avif') }}"
                            alt="Blog 2" class="img-fluid">
                    </div>
                    <div class="blog-body">
                        <div class="blog-meta">
                            <span><i class="fa-regular fa-calendar-days me-1"></i> April 11, 2021</span>
                            <span><i class="fa-regular fa-user me-1"></i> by Finext Solution</span>
                        </div>
                        <h4 class="blog-title">What's the Holding Back the It Solution...</h4>
                        <p>We've been a strategy thought leader for nearly five decades and we...</p>
                        <a href="#" class="read-more-link">
                            Read More <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="blog-card">
                    <div class="blog-img">
                        <img src="{{ asset('assets/img/blog-5.avif') }}"
                            alt="Blog 3" class="img-fluid">
                    </div>
                    <div class="blog-body">
                        <div class="blog-meta">
                            <span><i class="fa-regular fa-calendar-days me-1"></i> April 11, 2021</span>
                            <span><i class="fa-regular fa-user me-1"></i> by Finext Solution</span>
                        </div>
                        <h4 class="blog-title">This Week's Top Stories About It Solution</h4>
                        <p>We've been a strategy thought leader for nearly five decades and we...</p>
                        <a href="#" class="read-more-link">
                            Read More <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection