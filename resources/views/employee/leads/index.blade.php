{{-- resources/views/employee/leads/index.blade.php --}}
@extends('layouts.dashboard')

@section('title', 'My Leads')

@section('content')
<div class="filter-section">
    <form action="{{ route('employee.leads.index') }}" method="GET">
        <div class="filter-grid" style="grid-template-columns: repeat(3, 1fr);">
            <div class="form-group">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="">All Statuses</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="contacted" {{ request('status') == 'contacted' ? 'selected' : '' }}>Contacted</option>
                    <option value="converted" {{ request('status') == 'converted' ? 'selected' : '' }}>Converted</option>
                    <option value="lost" {{ request('status') == 'lost' ? 'selected' : '' }}>Lost</option>
                </select>
            </div>
            
            <div class="form-group">
                <label class="form-label">Search</label>
                <input type="text" name="search" class="form-control" placeholder="Name or Email" value="{{ request('search') }}">
            </div>
            
            <div class="form-group" style="display: flex; align-items: flex-end;">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-filter"></i> Filter
                </button>
                <a href="{{ route('employee.leads.index') }}" class="btn btn-secondary ml-2">
                    <i class="fas fa-undo"></i>
                </a>
            </div>
        </div>
    </form>
</div>

<div class="card">
    <div class="card-header">
        <h2 class="card-title">My Assigned Leads</h2>
    </div>
    
    <div class="table-responsive">
        <table class="data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Lead Info</th>
                    <th>Service</th>
                    <th>Status</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($leads as $lead)
                <tr>
                    <td>#{{ $lead->id }}</td>
                    <td>
                        <strong>{{ $lead->full_name }}</strong><br>
                        <small>{{ $lead->email }}</small><br>
                        <small class="text-muted">{{ $lead->company }}</small>
                    </td>
                    <td>{{ str_replace('-', ' ', ucfirst($lead->service_type)) }}</td>
                    <td>
                        <span class="badge badge-{{ $lead->status }}">
                            {{ ucfirst($lead->status) }}
                        </span>
                    </td>
                    <td>{{ $lead->created_at->format('M d, Y') }}</td>
                    <td>
                        <a href="{{ route('employee.leads.show', $lead) }}" class="btn btn-info btn-sm">
                            <i class="fas fa-eye"></i> View
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">
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
    
    <div class="pagination">
        {{ $leads->links() }}
    </div>
</div>
@endsection