@extends('layouts.app')

@section('title', 'Fintech Software Development')

@section('content')

    <div class="breadcroumb-area">
        <div class="container">
            <div class="breadcroumn-contnt">
                <h2 class="brea-title">
                    Fintech Software Development </h2>
                <div class="bre-sub">
                    <span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="Go to Home."
                            href="{{ route('home') }}" class="home"><span property="name">Home</span></a>
                        <meta property="position" content="1">
                    </span> &gt; <span property="itemListElement" typeof="ListItem"><span property="name"
                            class="post post-page current-item">Fintech Software Development</span>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <section class="fnx-service-grid-section">
        <div class="container">
            <div class="fnx-title-box text-center">
                <h6 class="fnx-subtitle">Our Expertise</h6>
                <h2 class="fnx-main-title">Custom Fintech Software Development Solutions</h2>
            </div>

            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="fnx-card-six fnx-transition">
                        <div class="fnx-card-img">
                            <img src="{{ asset('assets/img/service-1.jpg') }}"
                                alt="Payment Gateway">
                        </div>
                        <div class="fnx-card-body fnx-transition">
                            <div class="fnx-card-icon fnx-transition">
                                <i class="fa-solid fa-credit-card"></i>
                            </div>
                            <div class="fnx-card-content fnx-transition">
                                <h3 class="fnx-card-title fnx-transition">Payment Gateway Integration</h3>
                                <div class="fnx-card-text fnx-transition">
                                    <p>Seamless integration with multiple payment gateways for secure transactions and enhanced user experience.</p>
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
                                alt="KYC/AML">
                        </div>
                        <div class="fnx-card-body fnx-transition">
                            <div class="fnx-card-icon fnx-transition">
                                <i class="fa-solid fa-shield-halved"></i>
                            </div>
                            <div class="fnx-card-content fnx-transition">
                                <h3 class="fnx-card-title fnx-transition">Secure KYC/AML Modules</h3>
                                <div class="fnx-card-text fnx-transition">
                                    <p>Robust identity verification and anti-money laundering solutions compliant with regulatory standards.</p>
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
                                alt="Digital Wallet">
                        </div>
                        <div class="fnx-card-body fnx-transition">
                            <div class="fnx-card-icon fnx-transition">
                                <i class="fa-solid fa-wallet"></i>
                            </div>
                            <div class="fnx-card-content fnx-transition">
                                <h3 class="fnx-card-title fnx-transition">Digital Wallet & UPI Systems</h3>
                                <div class="fnx-card-text fnx-transition">
                                    <p>Feature-rich digital wallet solutions with UPI integration for seamless mobile payments.</p>
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
                                alt="Risk Analysis">
                        </div>
                        <div class="fnx-card-body fnx-transition">
                            <div class="fnx-card-icon fnx-transition">
                                <i class="fa-solid fa-chart-line"></i>
                            </div>
                            <div class="fnx-card-content fnx-transition">
                                <h3 class="fnx-card-title fnx-transition">AI-Based Risk Analysis</h3>
                                <div class="fnx-card-text fnx-transition">
                                    <p>Advanced machine learning algorithms for fraud detection and credit risk assessment.</p>
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
                        <h6 class="restly-about-stitle"><span>Fintech Excellence</span></h6>
                        <h2 class="restly-about-title">Custom Fintech Software Development for Banks & NBFCs</h2>
                        <div class="restly-about-dec">
                            <p>At Finext Solution, we specialize in building robust, secure, and scalable fintech software tailored to your business needs. Whether you're a startup or an enterprise, our custom solutions are designed to streamline operations, enhance customer experience, and ensure compliance with the latest regulations.</p>
                            <ul>
                                <li>Full-cycle fintech software development</li>
                                <li>Data privacy & regulatory compliance</li>
                                <li>Performance optimization & security</li>
                            </ul>
                        </div>
                        <div class="fnx-button-area">
                            <a href="{{ route('contact') }}" class="theme-btns">Get Free Consultation</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="fnx-image-box">
                        <img loading="lazy" src="{{ asset('assets/img/about.webp') }}" class="fnx-main-img" alt="Fintech Solutions">
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
                    <h6 class="restly-section-stitle"><span>Our Process</span></h6>
                    <h2 class="restly-section-title">How We Deliver Fintech Projects</h2>
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
                                <p>We deeply understand your business model and user personas to define custom solutions that match your vision.</p>
                            </div>
                            <a href="{{ route('contact') }}" class="fnx-btn">Learn More <i class="fas fa-arrow-right"></i></a>
                            <label class="fnx-number">01</label>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="fnx-process-card">
                            <div class="fnx-icon-circle">
                                <i class="fa-solid fa-bezier-curve"></i>
                            </div>
                            <h2 class="fnx-title">UI/UX & Architecture</h2>
                            <div class="fnx-desc">
                                <p>We create wireframes and design secure scalable architecture for maximum performance and user satisfaction.</p>
                            </div>
                            <a href="{{ route('contact') }}" class="fnx-btn">Learn More <i class="fas fa-arrow-right"></i></a>
                            <label class="fnx-number">02</label>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="fnx-process-card">
                            <div class="fnx-icon-circle">
                                <i class="fa-solid fa-laptop-code"></i>
                            </div>
                            <h2 class="fnx-title">Development & Testing</h2>
                            <div class="fnx-desc">
                                <p>Full-stack development with continuous testing & QA cycles to ensure performance, security, and reliability.</p>
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
                            <i class="fa-solid fa-cloud-arrow-up"></i>
                        </div>
                        <h2 class="fnx-title">Deployment & Support</h2>
                        <div class="fnx-desc">
                            <p>Final delivery, cloud deployment, and ongoing maintenance with 24/7 support to ensure continuous operation and updates.</p>
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
                                <h2 class="restly-section-title">Start Your Fintech Project</h2>
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
                                            <textarea name="message" rows="4" placeholder="Tell us about your fintech project requirements."></textarea>
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