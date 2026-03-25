@extends('layouts.dashboard')

@section('page-title', isset($client) ? 'Edit Client' : 'Add Client')

@section('content')
<div class="detail-container mx-auto" style="max-width: 800px;">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">{{ isset($client) ? 'Edit Client Details' : 'Add New Client' }}</h2>
        </div>
        
        <div class="card-body">
            <form action="{{ isset($client) ? route('admin.clients.update', $client) : route('admin.clients.store') }}" method="POST">
                @csrf
                @if(isset($client)) 
                    @method('PUT') 
                @endif
                
                <div class="filter-grid" style="grid-template-columns: 1fr 1fr;">
                    <div class="form-group">
                        <label class="form-label">Contact Name <span style="color: red;">*</span></label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $client->name ?? '') }}" required placeholder="e.g. John Doe">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Company Name</label>
                        <input type="text" name="company_name" class="form-control" value="{{ old('company_name', $client->company_name ?? '') }}" placeholder="e.g. Acme Corp">
                    </div>
                </div>
                
                <div class="filter-grid" style="grid-template-columns: 1fr 1fr;">
                    <div class="form-group">
                        <label class="form-label">Email Address</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $client->email ?? '') }}" placeholder="e.g. john@example.com">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Mobile Number</label>
                        <input type="text" name="mobile" class="form-control" value="{{ old('mobile', $client->mobile ?? '') }}" placeholder="e.g. +91 9876543210">
                    </div>
                </div>
                
                <div class="form-group mt-3">
                    <label class="form-label">Address</label>
                    <textarea name="address" class="form-control" rows="4" placeholder="Enter full billing address...">{{ old('address', $client->address ?? '') }}</textarea>
                </div>
                
                <div class="form-actions mt-4 text-right">
                    <a href="{{ route('admin.clients.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Cancel
                    </a>
                    <button type="submit" class="btn btn-primary" style="margin-left: 10px;">
                        <i class="fas fa-save"></i> {{ isset($client) ? 'Update Client' : 'Save Client' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
