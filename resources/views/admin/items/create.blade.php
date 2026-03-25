@extends('layouts.dashboard')

@section('page-title', isset($item) ? 'Edit Item' : 'Add Item')

@section('content')
<div class="detail-container mx-auto" style="max-width: 800px;">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">{{ isset($item) ? 'Edit Inventory Item' : 'Add New Item' }}</h2>
        </div>
        
        <div class="card-body">
            <form action="{{ isset($item) ? route('admin.items.update', $item) : route('admin.items.store') }}" method="POST">
                @csrf
                @if(isset($item)) 
                    @method('PUT') 
                @endif
                
                <div class="form-group mb-4">
                    <label class="form-label">Item / Service Name <span style="color: red;">*</span></label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $item->name ?? '') }}" required placeholder="e.g. Website Development">
                </div>
                
                <div class="filter-grid" style="grid-template-columns: 1fr 1fr;">
                    <div class="form-group">
                        <label class="form-label">Default Price (₹) <span style="color: red;">*</span></label>
                        <input type="number" name="default_price" class="form-control" step="0.01" value="{{ old('default_price', $item->default_price ?? '0.00') }}" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">HSN / SAC Code</label>
                        <input type="text" name="hsn_sac_code" class="form-control" value="{{ old('hsn_sac_code', $item->hsn_sac_code ?? '') }}" placeholder="e.g. 998314">
                    </div>
                </div>
                
                <div class="form-group mt-3">
                    <label class="form-label">Default Description</label>
                    <textarea name="description" class="form-control" rows="5" placeholder="This description will automatically act as the item detail inside the invoice.">{{ old('description', $item->description ?? '') }}</textarea>
                </div>
                
                <div class="form-actions mt-4 text-right">
                    <a href="{{ route('admin.items.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Cancel
                    </a>
                    <button type="submit" class="btn btn-primary" style="margin-left: 10px;">
                        <i class="fas fa-save"></i> {{ isset($item) ? 'Update Item' : 'Save Item' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
