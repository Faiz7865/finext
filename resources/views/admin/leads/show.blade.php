@extends('layouts.dashboard')

@section('page-title', 'Lead Details - ' . $lead->first_name)

@section('content')
<div class="lead-details-grid">
    <!-- Lead Information -->
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Lead Information</h2>
            <span class="badge badge-{{ $lead->status }}">{{ ucfirst($lead->status) }}</span>
        </div>
        
        <div class="card-body">
            <div class="lead-info-card">
                <div class="info-row">
                    <span class="info-label">Full Name</span>
                    <span class="info-value">{{ $lead->first_name }} {{ $lead->last_name }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Email</span>
                    <span class="info-value">{{ $lead->email }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Phone</span>
                    <span class="info-value">{{ $lead->phone }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Company</span>
                    <span class="info-value">{{ $lead->company }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Service Type</span>
                    <span class="info-value">{{ str_replace('-', ' ', ucfirst($lead->service_type)) }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Budget</span>
                    <span class="info-value">{{ $lead->budget }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Submitted</span>
                    <span class="info-value">{{ $lead->created_at->format('F d, Y H:i A') }}</span>
                </div>
            </div>
            
            <div class="project-description-box">
                <h4><i class="fas fa-file-alt"></i> Project Description</h4>
                <p>{{ $lead->project_description }}</p>
            </div>
            
            <hr style="margin: 24px 0; border: none; border-top: 1px solid var(--border);">
            
            <form action="{{ route('admin.leads.assign', $lead) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label">Assign To Employee</label>
                    <div style="display: flex; gap: 12px;">
                        <select name="assigned_to" class="form-select">
                            <option value="">Select Employee</option>
                            @foreach($employees as $employee)
                            <option value="{{ $employee->id }}" {{ $lead->assigned_to == $employee->id ? 'selected' : '' }}>
                                {{ $employee->name }}
                            </option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary">Assign</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Add Remark -->
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Add Remark</h2>
        </div>
        
        <div class="card-body">
            <form action="{{ route('admin.leads.remark', $lead) }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label class="form-label">Update Status</label>
                    <select name="status" class="form-select">
                        <option value="">Keep Current ({{ ucfirst($lead->status) }})</option>
                        <option value="pending">Pending</option>
                        <option value="verified">Verified</option>
                        <option value="contacted">Contacted</option>
                        <option value="converted">Converted</option>
                        <option value="lost">Lost</option>
                        <option value="follow_up">Follow Up</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Follow Up Time</label>
                    <input type="datetime-local" name="follow_up_time" class="form-control">
                </div>
                
                <div class="form-group">
                    <label class="form-label">Remark</label>
                    <textarea name="remark" rows="4" class="form-control" required placeholder="Enter your remark about this lead..."></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary btn-block">
                    <i class="fas fa-comment"></i> Add Remark
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Remarks History -->
<div class="card" style="margin-top: 24px;">
    <div class="card-header">
        <h2 class="card-title">Remark History</h2>
        <span class="badge bg-primary-soft">{{ $lead->remarks->count() }} Remarks</span>
    </div>
    
    <div class="card-body">
        <div class="remarks-list">
            @forelse($lead->remarks as $remark)
            <div class="remark-item">
                <div class="remark-header">
                    <span class="remark-author">
                        <i class="fas fa-user-circle"></i> {{ $remark->user->name }}
                    </span>
                    <span class="remark-date">{{ $remark->created_at->format('M d, Y H:i') }}</span>
                    @if($remark->status)
                    <span class="badge badge-{{ $remark->status }}">{{ ucfirst($remark->status) }}</span>
                    @endif
                </div>
                <div class="remark-body">
                    {{ $remark->remark }}
                </div>
                @if($remark->follow_up_time)
                <div class="remark-footer">
                    <i class="fas fa-clock"></i> Follow up scheduled: {{ $remark->follow_up_time->format('M d, Y H:i A') }}
                </div>
                @endif
            </div>
            @empty
            <div class="empty-state">
                <i class="fas fa-comments"></i>
                <p>No remarks yet. Add your first remark above.</p>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection