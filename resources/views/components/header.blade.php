<header class="w-100 position-relative">
    <div class="top-bar">
        <div class="container d-flex flex-column flex-sm-row justify-content-between align-items-center gap-2">
            <p class="mb-0 d-none d-md-block">Are you ready to grow up your fintech business?</p>
            <div class="d-flex align-items-center gap-4">
                <span class="d-flex align-items-center gap-2">
                    <i class="fa-solid fa-map-marker-alt"></i>
                    Bijnor, Uttar Pradesh 246701
                </span>
            </div>
        </div>
    </div>

    <div class="bg-white border-bottom bottom-bar">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="{{ route('home') }}" class="brand_logo text-decoration-none">
                <span class="h4 mb-0 fw-bold text-dark">
                    <img src="{{ asset('assets/img/logo.svg') }}" alt="Logo">
                </span>
            </a>

            <div class="d-none d-lg-flex align-items-center gap-4">
                <div class="d-flex align-items-center">
                    <div class="info-icon-box"><i class="fa-solid fa-phone"></i></div>
                    <div>
                        <p class="small text-muted">Call 24/7 anytime</p>
                        <p class="mb-0 fw-bold text-dark"><a href="tel:+919258020120" style="color: inherit; text-decoration: none;">+91 92580 20120</a></p>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <div class="info-icon-box"><i class="fa-solid fa-envelope"></i></div>
                    <div>
                        <p class="small text-muted">Mail Us Anytime</p>
                        <p class="mb-0 fw-bold text-dark"><a href="mailto:Support@finextsolution.com" style="color: inherit; text-decoration: none;">Support@finextsolution.com</a></p>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <div class="info-icon-box"><i class="fa-solid fa-clock"></i></div>
                    <div>
                        <p class="small text-muted">Office Time</p>
                        <p class="mb-0 fw-bold text-dark">Mon-Fri: 9:00-18:00</p>
                    </div>
                </div>
            </div>

            <button class="d-lg-hidden btn btn-link text-dark p-2 d-lg-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#mobileNav">
                <i class="fa-solid fa-bars fa-lg"></i>
            </button>
        </div>
    </div>

    <div class="nav-top">
        <div class="container">
            <nav class="main-nav">
                <div class="container">
                    <div class="d-none d-lg-flex align-items-center justify-content-between navbar-custom">
                        <ul class="nav">
                            <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                            <li class="nav-item"><a href="{{ route('pricing') }}" class="nav-link">Pricing</a></li>
                            <li class="nav-item menu-item-has-children">
                                <a href="#" class="nav-link services-menu">Services</a>
                                <ul class="sub-menu">
                                    <li class="menu-item">
                                        <a href="{{ route('fintech-software-development') }}">Fintech Software Development</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="{{ route('aeps-admin-software') }}">AEPS Admin Software</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="{{ route('recharge-admin-software') }}">Recharge Admin Software</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="{{ route('pancard-admin-software') }}">Pan Card Admin Software</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="{{ route('ecommerce-software') }}">E-Commerce Software</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="{{ route('api-provider') }}">API Provider</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="{{ route('custom-web-development') }}">Custom Web Development</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="{{ route('mobile-app-development') }}">Mobile App Development</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="{{ route('ui-ux-design') }}">UI/UX & Web Design</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item"><a href="{{ route('about') }}" class="nav-link">About</a></li>
                            <li class="nav-item"><a href="{{ route('contact') }}" class="nav-link">Contact</a></li>
                        </ul>
                        <a href="{{ route('contact') }}" class="btn-primary-custom">Free Quote <i aria-hidden="true"
                                class="fa-solid fa-arrow-right"></i></a>
                    </div>

                    <div class="collapse d-lg-none py-3" id="mobileNav">
                        <ul class="nav flex-column">
                            <li class="nav-item"><a href="{{ route('home') }}" class="nav-link text-white">Home</a></li>
                            <li class="nav-item"><a href="{{ route('pricing') }}" class="nav-link">Pricing</a></li>
                            <li class="nav-item">
                                <a href="#servicesSubmenu" class="nav-link text-white" data-bs-toggle="collapse">
                                    Services <i class="fa-solid fa-chevron-down ms-2"></i>
                                </a>
                                <div class="collapse" id="servicesSubmenu">
                                    <ul class="nav flex-column ms-3 mt-2">
                                        <li class="nav-item">
                                            <a href="{{ route('fintech-software-development') }}" class="nav-link text-white">Fintech Software Development</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('aeps-admin-software') }}" class="nav-link text-white">AEPS Admin Software</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('recharge-admin-software') }}" class="nav-link text-white">Recharge Admin Software</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('pancard-admin-software') }}" class="nav-link text-white">Pan Card Admin Software</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('ecommerce-software') }}" class="nav-link text-white">E-Commerce Software</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('api-provider') }}" class="nav-link text-white">API Provider</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('custom-web-development') }}" class="nav-link text-white">Custom Web Development</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('mobile-app-development') }}" class="nav-link text-white">Mobile App Development</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('ui-ux-design') }}" class="nav-link text-white">UI/UX & Web Design</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item"><a href="{{ route('about') }}" class="nav-link text-white">About</a></li>
                            <li class="nav-item"><a href="{{ route('contact') }}" class="nav-link text-white">Contact</a></li>
                        </ul>
                        <div class="mt-3 px-3">
                            <a href="{{ route('contact') }}" class="btn-primary-custom w-100">Free Quote</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>

</header>