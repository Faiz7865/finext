@extends('layouts.dashboard')

@section('page-title', 'Dashboard')

@section('content')
<!-- Stats Grid -->
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon bg-primary-soft">
            <i class="fas fa-users"></i>
        </div>
        <div class="stat-info">
            <h3>{{ $stats['total_leads'] ?? 0 }}</h3>
            <p>Total Leads</p>
        </div>
    </div>
    
    <div class="stat-card">
        <div class="stat-icon bg-warning-soft">
            <i class="fas fa-clock"></i>
        </div>
        <div class="stat-info">
            <h3>{{ $stats['pending_leads'] ?? 0 }}</h3>
            <p>Pending</p>
        </div>
    </div>
    
    <div class="stat-card">
        <div class="stat-icon bg-success-soft">
            <i class="fas fa-check-circle"></i>
        </div>
        <div class="stat-info">
            <h3>{{ $stats['verified_leads'] ?? 0 }}</h3>
            <p>Verified</p>
        </div>
    </div>
    
    <div class="stat-card">
        <div class="stat-icon bg-info-soft">
            <i class="fas fa-user-tie"></i>
        </div>
        <div class="stat-info">
            <h3>{{ $stats['total_employees'] ?? 0 }}</h3>
            <p>Employees</p>
        </div>
    </div>
</div>

<!-- Latest Leads -->
<div class="card">
    <div class="card-header">
        <h2 class="card-title">Latest 20 Leads</h2>
        <a href="{{ route('admin.leads.index') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-arrow-right"></i> View All
        </a>
    </div>
    
    <div class="table-responsive">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Lead Info</th>
                    <th>Contact</th>
                    <th>Service</th>
                    <th>Status</th>
                    <th>Assigned To</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($latestLeads as $lead)
                <tr>
                    <td>
                        <strong>{{ $lead->first_name }} {{ $lead->last_name }}</strong><br>
                        <small class="text-muted">{{ $lead->company }}</small>
                    </td>
                    <td>
                        {{ $lead->email }}<br>
                        <small class="text-muted">{{ $lead->phone }}</small>
                    </td>
                    <td>{{ str_replace('-', ' ', ucfirst($lead->service_type)) }}</td>
                    <td>
                        <span class="badge badge-{{ $lead->status }}">
                            {{ ucfirst($lead->status) }}
                        </span>
                    </td>
                    <td>
                        @if($lead->assignedTo)
                            <span style="color: var(--primary); font-weight: 600;">
                                <i class="fas fa-user-check"></i> {{ $lead->assignedTo->name }}
                            </span>
                        @else
                            <span class="text-muted">Unassigned</span>
                        @endif
                    </td>
                    <td>{{ $lead->created_at->format('M d, Y') }}</td>
                    <td>
                        <a href="{{ route('admin.leads.show', $lead) }}" class="btn btn-info btn-sm">
                            <i class="fas fa-eye"></i>
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">
                        <div class="empty-state">
                            <i class="fas fa-inbox"></i>
                            <p>No leads found</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection