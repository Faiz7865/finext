@extends('layouts.dashboard')

@section('page-title', 'Employee Details')

@section('content')
<div class="lead-details-grid">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Employee Information</h2>
            <span class="badge {{ $employee->is_active ? 'badge-active' : 'badge-inactive' }}">
                {{ $employee->is_active ? 'Active' : 'Inactive' }}
            </span>
        </div>
        
        <div class="card-body">
            <div class="lead-info-card">
                <div class="info-row">
                    <span class="info-label">Full Name</span>
                    <span class="info-value">{{ $employee->name }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Email</span>
                    <span class="info-value">{{ $employee->email }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Role</span>
                    <span class="info-value">{{ ucfirst($employee->role) }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Joined</span>
                    <span class="info-value">{{ $employee->created_at->format('F d, Y') }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Last Updated</span>
                    <span class="info-value">{{ $employee->updated_at->format('F d, Y H:i') }}</span>
                </div>
            </div>
            
            <div style="display: flex; gap: 12px; margin-top: 24px;">
                <a href="{{ route('admin.employees.edit', $employee) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Edit Employee
                </a>
                <form action="{{ route('admin.employees.destroy', $employee) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-user-slash"></i> {{ $employee->is_active ? 'Deactivate' : 'Activate' }}
                    </button>
                </form>
            </div>
        </div>
    </div>
    
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Assigned Leads</h2>
            <span class="badge bg-primary-soft">{{ $employee->assignedLeads->count() }} Leads</span>
        </div>
        
        <div class="card-body">
            @if($employee->assignedLeads->count() > 0)
                <div class="remarks-list">
                    @foreach($employee->assignedLeads->take(10) as $lead)
                    <div class="remark-item">
                        <div class="remark-header">
                            <span class="remark-author">{{ $lead->first_name }} {{ $lead->last_name }}</span>
                            <span class="badge badge-{{ $lead->status }}">{{ ucfirst($lead->status) }}</span>
                        </div>
                        <div class="remark-body">
                            {{ $lead->company }} • {{ str_replace('-', ' ', ucfirst($lead->service_type)) }}
                        </div>
                        <div class="remark-footer">
                            <a href="{{ route('admin.leads.show', $lead) }}" class="btn btn-sm btn-info">View Lead</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="empty-state">
                    <i class="fas fa-clipboard-list"></i>
                    <p>No leads assigned to this employee yet.</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection