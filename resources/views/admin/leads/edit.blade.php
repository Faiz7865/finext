@extends('layouts.dashboard')

@section('page-title', 'Edit Lead')

@section('content')
<div class="card" style="max-width: 900px;">
    <div class="card-header">
        <h2 class="card-title">Edit Lead #{{ $lead->id }}</h2>
        <a href="{{ route('admin.leads.index') }}" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>
    
    <div class="card-body">
        <form action="{{ route('admin.leads.update', $lead) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">First Name</label>
                        <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name', $lead->first_name) }}" required>
                        @error('first_name')<span class="invalid-feedback">{{ $message }}</span>@enderror
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Last Name</label>
                        <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name', $lead->last_name) }}" required>
                        @error('last_name')<span class="invalid-feedback">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Email Address</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $lead->email) }}" required>
                        @error('email')<span class="invalid-feedback">{{ $message }}</span>@enderror
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Phone Number</label>
                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $lead->phone) }}" required>
                        @error('phone')<span class="invalid-feedback">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label class="form-label">Company Name</label>
                <input type="text" name="company" class="form-control @error('company') is-invalid @enderror" value="{{ old('company', $lead->company) }}" required>
                @error('company')<span class="invalid-feedback">{{ $message }}</span>@enderror
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Service Type</label>
                        <select name="service_type" class="form-select @error('service_type') is-invalid @enderror" required>
                            <option value="fintech-software" {{ old('service_type', $lead->service_type) == 'fintech-software' ? 'selected' : '' }}>Fintech Software</option>
                            <option value="mobile-app" {{ old('service_type', $lead->service_type) == 'mobile-app' ? 'selected' : '' }}>Mobile App</option>
                            <option value="web-development" {{ old('service_type', $lead->service_type) == 'web-development' ? 'selected' : '' }}>Web Development</option>
                            <option value="api-integration" {{ old('service_type', $lead->service_type) == 'api-integration' ? 'selected' : '' }}>API Integration</option>
                            <option value="e-commerce" {{ old('service_type', $lead->service_type) == 'e-commerce' ? 'selected' : '' }}>E-commerce</option>
                            <option value="ui-ux" {{ old('service_type', $lead->service_type) == 'ui-ux' ? 'selected' : '' }}>UI/UX Design</option>
                        </select>
                        @error('service_type')<span class="invalid-feedback">{{ $message }}</span>@enderror
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Budget Range</label>
                        <select name="budget" class="form-select @error('budget') is-invalid @enderror" required>
                            <option value="10k-25k" {{ old('budget', $lead->budget) == '10k-25k' ? 'selected' : '' }}>₹10,000 - ₹25,000</option>
                            <option value="25k-50k" {{ old('budget', $lead->budget) == '25k-50k' ? 'selected' : '' }}>₹25,000 - ₹50,000</option>
                            <option value="50k-100k" {{ old('budget', $lead->budget) == '50k-100k' ? 'selected' : '' }}>₹50,000 - ₹1,00,000</option>
                            <option value="100k-500k" {{ old('budget', $lead->budget) == '100k-500k' ? 'selected' : '' }}>₹1,00,000 - ₹5,00,000</option>
                            <option value="500k+" {{ old('budget', $lead->budget) == '500k+' ? 'selected' : '' }}>₹5,00,000+</option>
                        </select>
                        @error('budget')<span class="invalid-feedback">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label class="form-label">Project Description</label>
                <textarea name="project_description" rows="5" class="form-control @error('project_description') is-invalid @enderror" required>{{ old('project_description', $lead->project_description) }}</textarea>
                @error('project_description')<span class="invalid-feedback">{{ $message }}</span>@enderror
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="pending" {{ old('status', $lead->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="verified" {{ old('status', $lead->status) == 'verified' ? 'selected' : '' }}>Verified</option>
                            <option value="contacted" {{ old('status', $lead->status) == 'contacted' ? 'selected' : '' }}>Contacted</option>
                            <option value="converted" {{ old('status', $lead->status) == 'converted' ? 'selected' : '' }}>Converted</option>
                            <option value="lost" {{ old('status', $lead->status) == 'lost' ? 'selected' : '' }}>Lost</option>
                        </select>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Assign To</label>
                        <select name="assigned_to" class="form-select">
                            <option value="">Unassigned</option>
                            @foreach($employees as $employee)
                            <option value="{{ $employee->id }}" {{ old('assigned_to', $lead->assigned_to) == $employee->id ? 'selected' : '' }}>{{ $employee->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="form-group" style="margin-top: 24px;">
                <button type="submit" class="btn btn-primary btn-lg">
                    <i class="fas fa-save"></i> Update Lead
                </button>
            </div>
        </form>
    </div>
</div>
@endsection