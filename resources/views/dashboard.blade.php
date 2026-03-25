{{-- resources/views/layouts/dashboard.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - Finext Solution</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    
    @stack('styles')
</head>
<body>
    <div class="dashboard-wrapper">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <div class="brand-logo">
                    <div class="logo-box">F</div>
                    <div class="brand-info">
                        <h3>Finext Solution</h3>
                        <p>{{ auth()->user()->role === 'admin' ? 'Admin Portal' : 'Employee Portal' }}</p>
                    </div>
                </div>
            </div>

            <div class="user-profile">
                <div class="user-avatar">
                    {{ substr(auth()->user()->name, 0, 1) }}
                </div>
                <div class="user-info">
                    <h4>{{ auth()->user()->name }}</h4>
                    <p>{{ auth()->user()->email }}</p>
                </div>
            </div>

            <nav class="nav-menu">
                <div class="nav-section">Main Menu</div>
                
                {{-- ADMIN NAVIGATION --}}
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="fas fa-home"></i>
                        <span>Dashboard</span>
                    </a>
                    
                    <a href="{{ route('admin.leads.index') }}" class="nav-item {{ request()->routeIs('admin.leads.*') ? 'active' : '' }}">
                        <i class="fas fa-users"></i>
                        <span>All Leads</span>
                    </a>
                    
                    <a href="{{ route('admin.employees.index') }}" class="nav-item {{ request()->routeIs('admin.employees.*') ? 'active' : '' }}">
                        <i class="fas fa-user-tie"></i>
                        <span>Employees</span>
                    </a>
                {{-- EMPLOYEE NAVIGATION --}}
                @else
                    <a href="{{ route('employee.dashboard') }}" class="nav-item {{ request()->routeIs('employee.dashboard') ? 'active' : '' }}">
                        <i class="fas fa-home"></i>
                        <span>Dashboard</span>
                    </a>
                    
                    <a href="{{ route('employee.leads.index') }}" class="nav-item {{ request()->routeIs('employee.leads.*') ? 'active' : '' }}">
                        <i class="fas fa-tasks"></i>
                        <span>My Leads</span>
                    </a>
                @endif
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Top Header -->
            <header class="top-header">
                <div class="page-title">
                    <h1>@yield('page-title', '@yield("title")')</h1>
                    <p>{{ now()->format('l, F d, Y') }}</p>
                </div>

                <div class="header-actions">
                    <button class="notification-btn">
                        <i class="fas fa-bell"></i>
                        <span class="badge-count">3</span>
                    </button>

                    <form action="{{ route('logout') }}" method="POST" class="logout-form">
                        @csrf
                        <button type="submit" class="btn-logout">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
            </header>

            <!-- Content Area -->
            <div class="content-area">
                {{-- Success Alert --}}
                @if(session('success'))
                    <div class="alert alert-success">
                        <i class="fas fa-check-circle"></i>
                        <div class="alert-content">
                            <strong>Success!</strong>
                            <p>{{ session('success') }}</p>
                        </div>
                        <button type="button" class="alert-close" onclick="this.parentElement.style.display='none';">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                @endif

                {{-- Error Alert --}}
                @if(session('error'))
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-circle"></i>
                        <div class="alert-content">
                            <strong>Error!</strong>
                            <p>{{ session('error') }}</p>
                        </div>
                        <button type="button" class="alert-close" onclick="this.parentElement.style.display='none';">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                @endif

                {{-- Validation Errors --}}
                @if($errors->any())
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-circle"></i>
                        <div class="alert-content">
                            <strong>Validation Error!</strong>
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <button type="button" class="alert-close" onclick="this.parentElement.style.display='none';">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                @endif

                {{-- Page Content --}}
                @yield('content')
            </div>
        </main>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    @stack('scripts')
</body>
</html>