{{-- resources/views/lead-verify.blade.php --}}
@extends('layouts.app')

@section('title', 'Verify Email')

@section('content')
<div class="breadcroumb-area">
    <div class="container">
        <div class="breadcroumn-contnt">
            <h2 class="brea-title">Verify Your Email</h2>
        </div>
    </div>
</div>

<section class="fnx-leave-message-section mt-5
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="fnx-form-wrapper text-center">
                    <div class="mb-4">
                        <h3>Enter Verification Code</h3>
                        <p class="text-muted">We've sent a 6-digit code to your email address.</p>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <form action="{{ route('lead.verify.post') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <input type="text" 
                                   name="otp" 
                                   class="form-control text-center" 
                                   style="font-size: 24px; letter-spacing: 8px;" 
                                   placeholder="000000" 
                                   maxlength="6" 
                                   required
                                   pattern="\d{6}">
                        </div>

                        <button type="submit" class="btn-custom-round btn-primary-custom w-100 mb-3">
                            Verify Code
                        </button>
                    </form>

                    <form action="{{ route('lead.resend-otp') }}" method="POST" class="mt-3">
                        @csrf
                        <button type="submit" class="btn btn-link text-decoration-none">
                            Didn't receive it? Resend Code
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection