@extends('layouts.app')

@section('title', 'Custom Web Development')

@section('content')

    <div class="breadcroumb-area">
        <div class="container">
            <div class="breadcroumn-contnt">
                <h2 class="brea-title">
                    Custom Web Development </h2>
                <div class="bre-sub">
                    <span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="Go to Home."
                            href="{{ route('home') }}" class="home"><span property="name">Home</span></a>
                        <meta property="position" content="1">
                    </span> &gt; <span property="itemListElement" typeof="ListItem"><span property="name"
                            class="post post-page current-item">Custom Web Development</span>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <section class="fnx-service-grid-section">
        <div class="container">
            <div class="fnx-title-box text-center">
                <h6 class="fnx-subtitle">Web Solutions</h6>
                <h2 class="fnx-main-title">Custom Web Development for Modern Businesses</h2>
            </div>

            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="fnx-card-six fnx-transition">
                        <div class="fnx-card-img">
                            <img src="{{ asset('assets/img/service-1.jpg') }}"
                                alt="Custom Code">
                        </div>
                        <div class="fnx-card-body fnx-transition">
                            <div class="fnx-card-icon fnx-transition">
                                <i class="fa-solid fa-code"></i>
                            </div>
                            <div class="fnx-card-content fnx-transition">
                                <h3 class="fnx-card-title fnx-transition">100% Custom Code Development</h3>
                                <div class="fnx-card-text fnx-transition">
                                    <p>No templates, no bloated code. We build pixel-perfect custom solutions tailored to your needs.</p>
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
                                alt="SEO Optimization">
                        </div>
                        <div class="fnx-card-body fnx-transition">
                            <div class="fnx-card-icon fnx-transition">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </div>
                            <div class="fnx-card-content fnx-transition">
                                <h3 class="fnx-card-title fnx-transition">SEO-Friendly & Fast Loading</h3>
                                <div class="fnx-card-text fnx-transition">
                                    <p>Optimized for search engines and speed. Your website will rank higher and load faster.</p>
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
                                alt="Mobile Responsive">
                        </div>
                        <div class="fnx-card-body fnx-transition">
                            <div class="fnx-card-icon fnx-transition">
                                <i class="fa-solid fa-mobile"></i>
                            </div>
                            <div class="fnx-card-content fnx-transition">
                                <h3 class="fnx-card-title fnx-transition">Mobile Responsive Design</h3>
                                <div class="fnx-card-text fnx-transition">
                                    <p>Mobile-first approach ensures perfect display on all devices and screen sizes.</p>
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
                                alt="Security & Support">
                        </div>
                        <div class="fnx-card-body fnx-transition">
                            <div class="fnx-card-icon fnx-transition">
                                <i class="fa-solid fa-shield-halved"></i>
                            </div>
                            <div class="fnx-card-content fnx-transition">
                                <h3 class="fnx-card-title fnx-transition">Secure Backend & Lifetime Support</h3>
                                <div class="fnx-card-text fnx-transition">
                                    <p>Built with Laravel security best practices and free lifetime technical support for bugs.</p>
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
                        <h6 class="restly-about-stitle"><span>Web Development Excellence</span></h6>
                        <h2 class="restly-about-title">Build Your Digital Presence with Custom Web Solutions</h2>
                        <div class="restly-about-dec">
                            <p>Finext Solution offers custom web development services tailored to meet your unique business needs. Whether you need a portfolio website, a dynamic admin panel, or a feature-rich web application, we deliver pixel-perfect and high-performance websites with modern technologies like Laravel, Tailwind CSS, and JavaScript.</p>
                            <ul>
                                <li>Portfolio websites for professionals</li>
                                <li>Dynamic admin panels and dashboards</li>
                                <li>Feature-rich web applications</li>
                            </ul>
                        </div>
                        <div class="fnx-button-area">
                            <a href="{{ route('contact') }}" class="theme-btns">Start Your Web Project</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="fnx-image-box">
                        <img loading="lazy" src="{{ asset('assets/img/about.webp') }}" class="fnx-main-img" alt="Web Development">
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
                    <h2 class="restly-section-title">How We Build Your Website</h2>
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
                                <p>We understand your brand goals, target audience, and project scope for perfect alignment.</p>
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
                            <h2 class="fnx-title">UI/UX Wireframe Design</h2>
                            <div class="fnx-desc">
                                <p>Figma-based wireframes with focus on usability, user flow, and visual hierarchy.</p>
                            </div>
                            <a href="{{ route('contact') }}" class="fnx-btn">Learn More <i class="fas fa-arrow-right"></i></a>
                            <label class="fnx-number">02</label>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="fnx-process-card">
                            <div class="fnx-icon-circle">
                                <i class="fa-solid fa-code"></i>
                            </div>
                            <h2 class="fnx-title">Development with Modern Stack</h2>
                            <div class="fnx-desc">
                                <p>We use Laravel, Tailwind CSS, and JavaScript for fast, scalable, and maintainable code.</p>
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
                        <h2 class="fnx-title">Deployment & Support</h2>
                        <div class="fnx-desc">
                            <p>We deploy your website on your domain and provide free lifetime technical support for any bugs.</p>
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
                                <h2 class="restly-section-title">Discuss Your Web Project</h2>
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
                                            <textarea name="message" rows="4" placeholder="Tell us about your website requirements and goals."></textarea>
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