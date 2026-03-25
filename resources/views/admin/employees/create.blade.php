@extends('layouts.dashboard')

@section('page-title', 'Add Employee')

@section('content')
<div class="card" style="max-width: 600px;">
    <div class="card-header">
        <h2 class="card-title">Create New Employee</h2>
        <a href="{{ route('admin.employees.index') }}" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>
    
    <div class="card-body">
        <form action="{{ route('admin.employees.store') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label class="form-label">Full Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                @error('name')<span class="invalid-feedback">{{ $message }}</span>@enderror
            </div>
            
            <div class="form-group">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                @error('email')<span class="invalid-feedback">{{ $message }}</span>@enderror
            </div>
            
            <div class="form-group">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                @error('password')<span class="invalid-feedback">{{ $message }}</span>@enderror
            </div>
            
            <div class="form-group">
                <label class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>
            
            <div class="form-group" style="margin-top: 24px;">
                <button type="submit" class="btn btn-primary btn-lg">
                    <i class="fas fa-user-plus"></i> Create Employee
                </button>
            </div>
        </form>
    </div>
</div>
@endsection