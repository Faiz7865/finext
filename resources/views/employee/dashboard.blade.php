{{-- resources/views/employee/dashboard.blade.php --}}
@extends('layouts.dashboard')

@section('title', 'My Dashboard')

@section('content')
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon bg-primary-soft">
            <i class="fas fa-tasks"></i>
        </div>
        <div class="stat-info">
            <h3>{{ $stats['total_assigned'] }}</h3>
            <p>Assigned Leads</p>
        </div>
    </div>
    
    <div class="stat-card">
        <div class="stat-icon bg-warning-soft">
            <i class="fas fa-clock"></i>
        </div>
        <div class="stat-info">
            <h3>{{ $stats['pending'] }}</h3>
            <p>Pending</p>
        </div>
    </div>
    
    <div class="stat-card">
        <div class="stat-icon bg-info-soft">
            <i class="fas fa-phone"></i>
        </div>
        <div class="stat-info">
            <h3>{{ $stats['contacted'] }}</h3>
            <p>Contacted</p>
        </div>
    </div>
    
    <div class="stat-card">
        <div class="stat-icon bg-success-soft">
            <i class="fas fa-check-circle"></i>
        </div>
        <div class="stat-info">
            <h3>{{ $stats['converted'] }}</h3>
            <p>Converted</p>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h2 class="card-title">My Latest Leads</h2>
        <a href="{{ route('employee.leads.index') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-arrow-right"></i> View All
        </a>
    </div>
    
    <div class="table-responsive">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Lead Info</th>
                    <th>Service</th>
                    <th>Status</th>
                    <th>Last Remark</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($latestLeads as $lead)
                <tr>
                    <td>
                        <strong>{{ $lead->full_name }}</strong><br>
                        <small>{{ $lead->company }}</small>
                    </td>
                    <td>{{ str_replace('-', ' ', ucfirst($lead->service_type)) }}</td>
                    <td>
                        <span class="badge badge-{{ $lead->status }}">
                            {{ ucfirst($lead->status) }}
                        </span>
                    </td>
                    <td>
                        @if($lead->latestRemark)
                            <small>{{ Str::limit($lead->latestRemark->remark, 30) }}</small><br>
                            <small class="text-muted">{{ $lead->latestRemark->created_at->diffForHumans() }}</small>
                        @else
                            <span class="text-muted">No remarks</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('employee.leads.show', $lead) }}" class="btn btn-info btn-sm">
                            <i class="fas fa-eye"></i>
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">
                        <div class="empty-state">
                            <i class="fas fa-inbox"></i>
                            <p>No leads assigned to you yet</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection