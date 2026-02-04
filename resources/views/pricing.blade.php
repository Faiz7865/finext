@extends('layouts.app')

@section('title', 'Pricing')

@section('content')

    <div class="breadcroumb-area">
        <div class="container">
            <div class="breadcroumn-contnt">
                <h2 class="brea-title">
                    Pricing </h2>
                <div class="bre-sub">
                    <span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="Go to Home."
                            href="/" class="home"><span property="name">Home</span></a>
                        <meta property="position" content="1">
                    </span> &gt; <span property="itemListElement" typeof="ListItem"><span property="name"
                            class="post post-page current-item">Pricing</span>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <section class="fnx-pricing-area">
        <div class="container">
            <div class="fnx-pricing-title-wrap">
                <div class="restly-section-title">
                    <h6 class="restly-section-stitle"><span>Affordable Solutions</span></h6>
                    <h2 class="restly-section-title">Flexible Pricing for Every Business Size</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 fnx-pricing-col">
                    <div class="restly-pricing-warpper restly-pricing-three">
                        <span>Starter</span>
                        <div class="restly-pricing-inner">
                            <div class="restly-pricing-header">
                                <h3 class="restly-pricing-title">Startup</h3>
                                <div class="pricing-icon">
                                    <i class="fa-solid fa-rocket"></i>
                                </div>
                                <h2 class="restly-pricing-price"><label>₹</label>50,000</h2>
                                <h6 class="restly-pricing-time">Project Based</h6>
                            </div>
                            <div class="restly-price-feature">
                                <ul>
                                    <li>Basic Website Development</li>
                                    <li>5 Pages + Dashboard</li>
                                    <li>3 Months Support</li>
                                    <li>Basic API Integration</li>
                                    <li>SSL Certificate Included</li>
                                </ul>
                            </div>
                            <div class="restly-price-footer">
                                <a class="theme-btns" href="/contact">Get Started</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 fnx-pricing-col">
                    <div class="restly-pricing-warpper restly-pricing-three">
                        <span>popular</span>
                        <div class="restly-pricing-inner">
                            <div class="restly-pricing-header">
                                <h3 class="restly-pricing-title">Professional</h3>
                                <div class="pricing-icon">
                                    <i class="fa-solid fa-chart-line"></i>
                                </div>
                                <h2 class="restly-pricing-price"><label>₹</label>1,50,000</h2>
                                <h6 class="restly-pricing-time">Project Based</h6>
                            </div>
                            <div class="restly-price-feature">
                                <ul>
                                    <li>Custom Web Application</li>
                                    <li>Unlimited Pages + Admin Panel</li>
                                    <li>6 Months Support</li>
                                    <li>Advanced API Integration</li>
                                    <li>Payment Gateway Setup</li>
                                </ul>
                            </div>
                            <div class="restly-price-footer">
                                <a class="theme-btns" href="/contact">Choose Plan</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 fnx-pricing-col">
                    <div class="restly-pricing-warpper restly-pricing-three">
                        <span>Enterprise</span>
                        <div class="restly-pricing-inner">
                            <div class="restly-pricing-header">
                                <h3 class="restly-pricing-title">Enterprise</h3>
                                <div class="pricing-icon">
                                    <i class="fa-solid fa-crown"></i>
                                </div>
                                <h2 class="restly-pricing-price"><label>₹</label>5,00,000+</h2>
                                <h6 class="restly-pricing-time">Custom Quote</h6>
                            </div>
                            <div class="restly-price-feature">
                                <ul>
                                    <li>Full-Stack Fintech Solutions</li>
                                    <li>Web + Mobile App Development</li>
                                    <li>12 Months Dedicated Support</li>
                                    <li>Custom Integrations</li>
                                    <li>24/7 Monitoring & Maintenance</li>
                                </ul>
                            </div>
                            <div class="restly-price-footer">
                                <a class="theme-btns" href="/contact">Contact Sales</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div style="margin-top: 60px; padding: 40px; background: #f8f9fa; border-radius: 10px; text-align: center;">
                <h3 style="margin-bottom: 20px; color: #333;">Need a Custom Solution?</h3>
                <p style="margin-bottom: 25px; color: #666; font-size: 16px;">Our team can create a tailored package based on your specific requirements. Get a free consultation today!</p>
                <a href="/contact" class="btn-primary-custom btn-custom-round">Request Custom Quote</a>
            </div>
        </div>
    </section>


    <section class="fnx-main-process-area">
        <div class="container">

            <div class="fnx-logo-card">
                <div class="fnx-slick-slider">
                    <div class="fnx-logo-item"><img
                            src="{{ asset('assets/img/client-logo1.webp') }}" alt="Logo">
                    </div>
                    <div class="fnx-logo-item"><img
                            src="{{ asset('assets/img/client-logo2.webp') }}" alt="Logo">
                    </div>
                    <div class="fnx-logo-item"><img
                            src="{{ asset('assets/img/client-logo3.webp') }}" alt="Logo">
                    </div>
                    <div class="fnx-logo-item"><img
                            src="{{ asset('assets/img/client-logo4.webp') }}" alt="Logo">
                    </div>
                    <div class="fnx-logo-item"><img
                            src="{{ asset('assets/img/client-logo5.webp') }}" alt="Logo">
                    </div>
                    <div class="fnx-logo-item"><img
                            src="{{ asset('assets/img/client-logo1.webp') }}" alt="Logo">
                    </div>
                </div>
            </div>

            <div class="fnx-steps-grid">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="fnx-process-card">
                            <div class="fnx-icon-circle">
                                <i class="fa-solid fa-code"></i>
                            </div>
                            <h2 class="fnx-title">Fintech Software Development</h2>
                            <div class="fnx-desc">
                                <p>Custom fintech platforms for banks & NBFCs with real-time reporting & secure integrations.</p>
                            </div>
                            <a href="/fintech-software-development" class="fnx-btn">Read More <i class="fas fa-arrow-right"></i></a>
                            <label class="fnx-number">01</label>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="fnx-process-card">
                            <div class="fnx-icon-circle">
                                <i class="fa-solid fa-globe"></i>
                            </div>
                            <h2 class="fnx-title">Custom Web Development</h2>
                            <div class="fnx-desc">
                                <p>End-to-end web solutions with seamless API integrations for your digital business needs.</p>
                            </div>
                            <a href="/custom-web-development" class="fnx-btn">Read More <i class="fas fa-arrow-right"></i></a>
                            <label class="fnx-number">02</label>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="fnx-process-card">
                            <div class="fnx-icon-circle">
                                <i class="fa-solid fa-mobile-screen-button"></i>
                            </div>
                            <h2 class="fnx-title">Mobile App Development</h2>
                            <div class="fnx-desc">
                                <p>Native and cross-platform mobile applications for seamless fintech user experiences.</p>
                            </div>
                            <a href="/mobile-app-development" class="fnx-btn">Read More <i class="fas fa-arrow-right"></i></a>
                            <label class="fnx-number">03</label>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="fnx-team-stats-section">
        <div class="container">
            <div class="fnx-section-title-box">
                <h6 class="fnx-subtitle">Our Success</h6>
                <h2 class="fnx-main-title">Why Clients Choose Finext Solution</h2>
            </div>

            <div class="row fnx-stats-grid">
                <div class="col-md-4">
                    <div class="fnx-counter-item">
                        <div class="fnx-counter-number"><span class="timer" data-to="50" data-speed="5000">50</span>+
                        </div>
                        <h3 class="fnx-counter-label">Projects Delivered</h3>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="fnx-counter-item">
                        <div class="fnx-counter-number"><span class="timer" data-to="10" data-speed="5000">10</span>+
                        </div>
                        <h3 class="fnx-counter-label">Years Experience</h3>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="fnx-counter-item">
                        <div class="fnx-counter-number"><span class="timer" data-to="6000"
                                data-speed="5000">6000</span>+</div>
                        <h3 class="fnx-counter-label">Satisfied Clients</h3>
                    </div>
                </div>
            </div>

            <div class="fnx-testimonial-slider" id="testimonial-slider">
                <div class="fnx-testimonial-card">
                    <div class="fnx-card-inner">
                        <div class="fnx-card-header">
                            <div class="fnx-user-info">
                                <img src="{{ asset('assets/img/team-1.avif') }}"
                                    alt="User">
                                <div class="fnx-user-meta">
                                    <h3>Rahul Verma</h3>
                                    <span>Techfinity Solutions</span>
                                </div>
                            </div>
                            <div class="fnx-quote-icon">
                                <i class="fa-solid fa-quote-right"></i>
                            </div>
                        </div>
                        <p class="fnx-testimonial-text">
                            "Finext-Solution team ne hamare liye website banai jo design aur performance dono me best hai. 100% recommended!"
                        </p>
                    </div>
                </div>
                <div class="fnx-testimonial-card">
                    <div class="fnx-card-inner">
                        <div class="fnx-card-header">
                            <div class="fnx-user-info">
                                <img src="{{ asset('assets/img/team-2.avif') }}"
                                    alt="User">
                                <div class="fnx-user-meta">
                                    <h3>Priya Sharma</h3>
                                    <span>UrbanTech India</span>
                                </div>
                            </div>
                            <div class="fnx-quote-icon">
                                <i class="fa-solid fa-quote-right"></i>
                            </div>
                        </div>
                        <p class="fnx-testimonial-text">
                            "Finext ke saath kaam karke kaafi acha experience raha. Inka app development fast aur reliable tha."
                        </p>
                    </div>
                </div>
                <div class="fnx-testimonial-card">
                    <div class="fnx-card-inner">
                        <div class="fnx-card-header">
                            <div class="fnx-user-info">
                                <img src="{{ asset('assets/img/team-3.avif') }}" alt="User">
                                <div class="fnx-user-meta">
                                    <h3>Siddharth Mehta</h3>
                                    <span>GrowFast Enterprises</span>
                                </div>
                            </div>
                            <div class="fnx-quote-icon">
                                <i class="fa-solid fa-quote-right"></i>
                            </div>
                        </div>
                        <p class="fnx-testimonial-text">
                            "Unki SEO & Analytics service ne hamare business ko Google pe top rank par le aaya. Great work Finext!"
                        </p>
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
                                <h2 class="restly-section-title">Get Your Custom Quote</h2>
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
                                            <input type="text" name="website" placeholder="Your Website/Project" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="restly-input message">
                                            <textarea name="message" rows="4" placeholder="Tell us about your project requirements."></textarea>
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
                            <h2 class="contact-info-title">Have Questions?</h2>
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
                                        <span>Response Time</span>
                                        <p>Within 24 Hours</p>
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