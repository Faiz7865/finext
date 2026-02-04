@extends('layouts.app')

@section('title', 'About')

@section('content')

    <div class="breadcroumb-area">
        <div class="container">
            <div class="breadcroumn-contnt">
                <h2 class="brea-title">
                    About Us </h2>
                <div class="bre-sub">
                    <span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="Go to Home."
                            href="/" class="home"><span property="name">Home</span></a>
                        <meta property="position" content="1">
                    </span> &gt; <span property="itemListElement" typeof="ListItem"><span property="name"
                            class="post post-page current-item">About Us</span>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <section class="section-marketing">
        <div class="container">
            <div class="row align-items-center g-lg-5">
                <div class="col-lg-5 mb-5 mb-lg-0">
                    <div class="marketing-image-wrapper">
                        <div class="img-box img-top">
                            <img src="{{ asset('assets/img/about-1.avif') }}"
                                alt="Team Meeting">
                        </div>
                        <div class="img-box img-middle">
                            <img src="{{ asset('assets/img/about-2.avif') }}"
                                alt="Office Work">
                        </div>
                        <div class="img-box img-bottom">
                            <img src="{{ asset('assets/img/about-3.avif') }}"
                                alt="Discussion">
                        </div>
                        <div class="shape-circle"></div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="solution-content">
                        <p class="sub-title">Who We Are</p>
                        <h2 class="main-title">Fintech Software Solutions to Power the Future of Finance</h2>

                        <p style="margin-bottom: 20px; line-height: 1.8;">
                            Finext Solution is a leading fintech software agency delivering next-gen financial products — from loan management and digital wallets to payment gateways and NBFC automation. We craft secure, scalable, and innovative digital finance systems tailored for banks, NBFCs, and startups.
                        </p>

                        <div class="row feature-grid">
                            <div class="col-sm-6">
                                <div class="feature-item">
                                    <div class="feature-icon"><i class="fa-solid fa-headset"></i></div>
                                    <div class="feature-text">
                                        <h5>Our Mission</h5>
                                        <p>To empower financial institutions with technology-driven solutions</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="feature-item">
                                    <div class="feature-icon"><i class="fa-solid fa-users-gear"></i></div>
                                    <div class="feature-text">
                                        <h5>Our Vision</h5>
                                        <p>To become a global leader in fintech innovation</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="feature-item">
                                    <div class="feature-icon"><i class="fa-solid fa-screwdriver-wrench"></i></div>
                                    <div class="feature-text">
                                        <h5>Security First</h5>
                                        <p>Building secure, scalable solutions for financial institutions</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="feature-item">
                                    <div class="feature-icon"><i class="fa-solid fa-briefcase"></i></div>
                                    <div class="feature-text">
                                        <h5>Innovation</h5>
                                        <p>Delivering next-gen fintech solutions for digital transformation</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="cta-wrapper">
                            <a href="/contact" class="btn-primary-custom btn-custom-round">Get a Quote <i
                                    class="fa-solid fa-arrow-right"></i></a>

                            <div class="contact-call">
                                <div class="call-circle"><i class="fa-solid fa-phone"></i></div>
                                <div class="call-info">
                                    <p class="call-label">Call us anytime</p>
                                    <p class="call-number"><a href="tel:+919258020120" style="color: inherit; text-decoration: none;">+91 92580 20120</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                                <i class="fa-solid fa-comments"></i>
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
                                <i class="fa-solid fa-bezier-curve"></i>
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
                <h6 class="fnx-subtitle">Our Stats</h6>
                <h2 class="fnx-main-title">Why Industry Leaders Choose Finext Solution</h2>
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
                                <h2 class="restly-section-title">Get In Touch</h2>
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
                                            <input type="url" name="website" placeholder="Website" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="restly-input message">
                                            <textarea name="message" rows="4" placeholder="Let us know what you need."></textarea>
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
                            <h2 class="contact-info-title">Don't hesitate to contact us</h2>
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