@extends('layouts.dashboard')

@section('page-title', 'Edit Employee')

@section('content')
<div class="card" style="max-width: 600px;">
    <div class="card-header">
        <h2 class="card-title">Edit Employee: {{ $employee->name }}</h2>
        <a href="{{ route('admin.employees.index') }}" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>
    
    <div class="card-body">
        <form action="{{ route('admin.employees.update', $employee) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label class="form-label">Full Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $employee->name) }}" required>
                @error('name')<span class="invalid-feedback">{{ $message }}</span>@enderror
            </div>
            
            <div class="form-group">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $employee->email) }}" required>
                @error('email')<span class="invalid-feedback">{{ $message }}</span>@enderror
            </div>
            
            <div class="form-group">
                <label class="form-label">New Password (leave blank to keep current)</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                @error('password')<span class="invalid-feedback">{{ $message }}</span>@enderror
            </div>
            
            <div class="form-group">
                <label class="form-label">Confirm New Password</label>
                <input type="password" name="password_confirmation" class="form-control">
            </div>
            
            <div class="form-group">
                <label class="form-label">Status</label>
                <select name="is_active" class="form-select">
                    <option value="1" {{ old('is_active', $employee->is_active) ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ !old('is_active', $employee->is_active) ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            
            <div class="form-group" style="margin-top: 24px;">
                <button type="submit" class="btn btn-primary btn-lg">
                    <i class="fas fa-save"></i> Update Employee
                </button>
            </div>
        </form>
    </div>
</div>
@endsection