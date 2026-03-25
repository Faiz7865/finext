@extends('layouts.dashboard')

@section('page-title', 'All Leads')

@section('content')
<!-- Filter Section -->
<div class="filter-section">
    <form action="{{ route('admin.leads.index') }}" method="GET" class="filter-form">
        <div class="filter-grid">
            <div class="form-group">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="">All Statuses</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="verified" {{ request('status') == 'verified' ? 'selected' : '' }}>Verified</option>
                    <option value="contacted" {{ request('status') == 'contacted' ? 'selected' : '' }}>Contacted</option>
                    <option value="converted" {{ request('status') == 'converted' ? 'selected' : '' }}>Converted</option>
                    <option value="lost" {{ request('status') == 'lost' ? 'selected' : '' }}>Lost</option>
                </select>
            </div>

            <div class="form-group">
                <label class="form-label">Service Type</label>
                <select name="service_type" class="form-select">
                    <option value="">All Services</option>
                    <option value="fintech-software" {{ request('service_type') == 'fintech-software' ? 'selected' : '' }}>Fintech Software</option>
                    <option value="mobile-app" {{ request('service_type') == 'mobile-app' ? 'selected' : '' }}>Mobile App</option>
                    <option value="web-development" {{ request('service_type') == 'web-development' ? 'selected' : '' }}>Web Development</option>
                    <option value="api-integration" {{ request('service_type') == 'api-integration' ? 'selected' : '' }}>API Integration</option>
                    <option value="e-commerce" {{ request('service_type') == 'e-commerce' ? 'selected' : '' }}>E-commerce</option>
                    <option value="ui-ux" {{ request('service_type') == 'ui-ux' ? 'selected' : '' }}>UI/UX Design</option>
                </select>
            </div>

            <div class="form-group">
                <label class="form-label">Assigned To</label>
                <select name="assigned_to" class="form-select">
                    <option value="">All Employees</option>
                    @foreach ($employees as $employee)
                        <option value="{{ $employee->id }}" {{ request('assigned_to') == $employee->id ? 'selected' : '' }}>
                            {{ $employee->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label class="form-label">Search</label>
                <input type="text" name="search" class="form-control" placeholder="Name, Email, Company..." value="{{ request('search') }}">
            </div>
        </div>

        <div class="filter-actions">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-filter"></i> Apply Filters
            </button>
            <a href="{{ route('admin.leads.index') }}" class="btn btn-secondary">
                <i class="fas fa-undo"></i> Clear
            </a>
        </div>
    </form>
</div>

<!-- Leads Table -->
<div class="card">
    <div class="card-header">
        <h2 class="card-title">Leads List</h2>
        <a href="{{ route('admin.leads.create') }}" class="btn btn-success btn-sm">
            <i class="fas fa-plus"></i> Add Lead
        </a>
    </div>

    <div class="table-responsive">
        <table class="data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Lead Info</th>
                    <th>Service</th>
                    <th>Budget</th>
                    <th>Status</th>
                    <th>Assigned</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($leads as $lead)
                    <tr>
                        <td>#{{ $lead->id }}</td>
                        <td>
                            <strong>{{ $lead->first_name }} {{ $lead->last_name }}</strong><br>
                            <small>{{ $lead->email }}</small><br>
                            <small class="text-muted">{{ $lead->company }}</small>
                        </td>
                        <td>{{ str_replace('-', ' ', ucfirst($lead->service_type)) }}</td>
                        <td>{{ $lead->budget }}</td>
                        <td>
                            <span class="badge badge-{{ $lead->status }}">
                                {{ ucfirst($lead->status) }}
                            </span>
                        </td>
                        <td>{{ $lead->assignedTo?->name ?? '-' }}</td>
                        <td>{{ $lead->created_at->format('M d, Y') }}</td>
                        <td>
                            <div class="action-btns">
                                <a href="{{ route('admin.leads.show', $lead) }}" class="btn btn-info btn-sm" title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.leads.edit', $lead) }}" class="btn btn-warning btn-sm" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.leads.destroy', $lead) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete this lead?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">
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