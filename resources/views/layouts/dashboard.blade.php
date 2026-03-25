{{-- resources/views/layouts/dashboard.blade.php --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') - Lead Management</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Dashboard CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">

    @stack('styles')
</head>

<body>

    <div class="dashboard-wrapper">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <div class="logo">
                    <h1>Dashboard</h1>
                </div>
                <button class="sidebar-toggle" id="sidebarToggle">
                    <i class="fas fa-bars"></i>
                </button>
            </div>

            <nav class="sidebar-nav">
                {{-- ADMIN NAVIGATION --}}
                @if(Auth::user()->role === 'admin')
                    <div class="nav-section">
                        <p class="nav-title">Main</p>
                        <ul class="nav-menu">
                            <li>
                                <a href="{{ route('admin.dashboard') }}"
                                    class="nav-link @if (Route::currentRouteName() === 'admin.dashboard') active @endif">
                                    <i class="fas fa-chart-line"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.leads.index') }}"
                                    class="nav-link @if (Route::currentRouteName() === 'admin.leads.index') active @endif">
                                    <i class="fas fa-users"></i>
                                    <span>Leads</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.invoices.index') }}"
                                    class="nav-link @if (Str::startsWith(Route::currentRouteName(), 'admin.invoices')) active @endif">
                                    <i class="fas fa-file-invoice-dollar"></i>
                                    <span>Invoices</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.clients.index') }}"
                                    class="nav-link @if (Str::startsWith(Route::currentRouteName(), 'admin.clients')) active @endif">
                                    <i class="fas fa-handshake"></i>
                                    <span>Clients</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.items.index') }}"
                                    class="nav-link @if (Str::startsWith(Route::currentRouteName(), 'admin.items')) active @endif">
                                    <i class="fas fa-box-open"></i>
                                    <span>Items Inventory</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="nav-section">
                        <p class="nav-title">Management</p>
                        <ul class="nav-menu">
                            <li>
                                <a href="{{ route('admin.employees.index') }}"
                                    class="nav-link @if (Route::currentRouteName() === 'admin.employees.index') active @endif">
                                    <i class="fas fa-user-tie"></i>
                                    <span>Employees</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                {{-- EMPLOYEE NAVIGATION --}}
                @elseif(Auth::user()->role === 'employee')
                    <div class="nav-section">
                        <p class="nav-title">Main</p>
                        <ul class="nav-menu">
                            <li>
                                <a href="{{ route('employee.dashboard') }}"
                                    class="nav-link @if (Route::currentRouteName() === 'employee.dashboard') active @endif">
                                    <i class="fas fa-chart-line"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('employee.leads.index') }}"
                                    class="nav-link @if (Route::currentRouteName() === 'employee.leads.index') active @endif">
                                    <i class="fas fa-tasks"></i>
                                    <span>My Leads</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                @endif
            </nav>

            <div class="sidebar-footer">
                <div class="user-profile">
                    <div class="user-avatar">
                        <i class="fas fa-user-circle"></i>
                    </div>
                    <div class="user-info">
                        <p class="user-name">{{ Auth::user()->name }}</p>
                        <p class="user-role">{{ ucfirst(Auth::user()->role) }}</p>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Top Header -->
            <header class="top-header">
                <div class="header-left">
                    <button class="menu-toggle" id="menuToggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <h2 class="page-title">@yield('page-title', 'Dashboard')</h2>
                </div>

                <div class="header-right">
                    <!-- Search -->
                    <div class="search-box">
                        <input type="text" placeholder="Search..." class="search-input">
                        <i class="fas fa-search"></i>
                    </div>

                    <!-- Notifications -->
                    <div class="header-icon">
                        <button class="icon-btn">
                            <i class="fas fa-bell"></i>
                            <span class="notification-badge">3</span>
                        </button>
                    </div>

                    <!-- User Menu -->
                    <div class="user-menu-dropdown">
                        <button class="user-menu-btn" id="userMenuBtn">
                            <div class="user-avatar-small">
                                <i class="fas fa-user-circle"></i>
                            </div>
                            <span>{{ Auth::user()->name }}</span>
                            <i class="fas fa-chevron-down"></i>
                        </button>

                        <div class="dropdown-menu" id="dropdownMenu">
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-user"></i>
                                <span>Profile</span>
                            </a>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-cog"></i>
                                <span>Settings</span>
                            </a>
                            <hr class="dropdown-divider">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item dropdown-logout">
                                    <i class="fas fa-sign-out-alt"></i>
                                    <span>Logout</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Content Area -->
            <div class="content-area">
                <!-- Alerts -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <button type="button" class="alert-close" onclick="this.parentElement.remove()">
                            <i class="fas fa-times"></i>
                        </button>
                        <div class="alert-content">
                            <strong>Error!</strong>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success">
                        <button type="button" class="alert-close" onclick="this.parentElement.remove()">
                            <i class="fas fa-times"></i>
                        </button>
                        <div class="alert-content">
                            <strong>Success!</strong>
                            <p>{{ session('success') }}</p>
                        </div>
                    </div>
                @endif

                @if (session('warning'))
                    <div class="alert alert-warning">
                        <button type="button" class="alert-close" onclick="this.parentElement.remove()">
                            <i class="fas fa-times"></i>
                        </button>
                        <div class="alert-content">
                            <strong>Warning!</strong>
                            <p>{{ session('warning') }}</p>
                        </div>
                    </div>
                @endif

                <!-- Page Content -->
                <section class="page-content">
                    @yield('content')
                </section>
            </div>

            <!-- Footer -->
            <footer class="dashboard-footer">
                <div class="footer-content">
                    <p>&copy; {{ date('Y') }} Lead Management System. All rights reserved.</p>
                    <div class="footer-links">
                        <a href="#">Privacy Policy</a>
                        <a href="#">Terms & Conditions</a>
                        <a href="#">Support</a>
                    </div>
                </div>
            </footer>
        </main>
    </div>

    <script src="{{ asset('assets/js/dashboard.js') }}"></script>

    @stack('scripts')
</body>

</html>