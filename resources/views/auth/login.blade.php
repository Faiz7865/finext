<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login - Finext Solution</title>

    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}">
</head>

<body>
    <div class="auth-split-container">
        <!-- Left Side - Branding -->
        <div class="auth-branding">
            <div class="branding-content">
                <div class="brand-logo-large"><img src="{{ asset('assets/img/logo.svg') }}" alt="Finext Logo"></div>
                <h1>Welcome to Finext Solution</h1>
                <p>Transform your fintech ideas into reality with our cutting-edge technology and expert team.</p>

                <div class="feature-list">
                    <div class="feature-item">
                        <i class="fas fa-check"></i>
                        <span>Secure & Reliable Platform</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check"></i>
                        <span>24/7 Expert Support</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check"></i>
                        <span>Advanced Analytics Dashboard</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side - Form -->
        <div class="auth-form-section">
            <a href="{{ route('home') }}" class="back-home">
                <i class="fas fa-arrow-left"></i> Back to Home
            </a>

            <div class="auth-form-wrapper">
                <div class="form-header">
                    <h2>Sign In</h2>
                    <p>Enter your credentials to access your account</p>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-circle"></i>
                        {{ $errors->first() }}
                    </div>
                @endif

                <form action="{{ route('login') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label class="form-label">Email Address</label>
                        <div class="input-wrapper">
                            <i class="fas fa-envelope input-icon"></i>
                            <input type="email" name="email"
                                class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                                placeholder="name@company.com" required autofocus>
                        </div>
                        @error('email')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <div class="input-wrapper">
                            <i class="fas fa-lock input-icon"></i>
                            <input type="password" name="password" class="form-control"
                                placeholder="Enter your password" required>
                        </div>
                    </div>

                    <div class="form-check-wrapper">
                        <label class="form-check">
                            <input type="checkbox" name="remember" id="remember" class="form-check-input">
                            <span class="form-check-label">Remember me</span>
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">
                        <i class="fas fa-sign-in-alt"></i> Sign In
                    </button>
                </form>

                <div class="form-footer">
                    <p>Protected by Finext Solution Security</p>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
