{{-- resources/views/employee/leads/show.blade.php --}}
@extends('layouts.dashboard')

@section('title', 'Lead Details')

@section('content')
<div class="lead-details-grid">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Lead Information</h2>
            <span class="badge badge-{{ $lead->status }}">{{ ucfirst($lead->status) }}</span>
        </div>
        
        <div class="card-body">
            <div class="lead-info-card">
                <div class="info-row">
                    <span class="info-label">Full Name</span>
                    <span class="info-value">{{ $lead->full_name }}</span>
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
                    <span class="info-label">Service</span>
                    <span class="info-value">{{ str_replace('-', ' ', ucfirst($lead->service_type)) }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Budget</span>
                    <span class="info-value">{{ $lead->budget }}</span>
                </div>
            </div>
            
            <div class="project-description-box">
                <h4><i class="fas fa-file-alt"></i> Project Description</h4>
                <p>{{ $lead->project_description }}</p>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Add Remark</h2>
        </div>
        
        <div class="card-body">
            <form action="{{ route('employee.leads.remark', $lead) }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label class="form-label">Update Status</label>
                    <select name="status" class="form-select">
                        <option value="">Keep Current ({{ ucfirst($lead->status) }})</option>
                        <option value="pending">Pending</option>
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
                    <textarea name="remark" rows="4" class="form-control" required placeholder="Enter your remark..."></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary btn-block">
                    <i class="fas fa-comment"></i> Add Remark
                </button>
            </form>
        </div>
    </div>
</div>

<div class="card" style="margin-top: 24px;">
    <div class="card-header">
        <h2 class="card-title">Remark History</h2>
    </div>
    
    <div class="card-body">
        <div class="remarks-list">
            @forelse($lead->remarks as $remark)
            <div class="remark-item">
                <div class="remark-header">
                    <span class="remark-author"><i class="fas fa-user-circle"></i> {{ $remark->user->name }}</span>
                    <span class="remark-date">{{ $remark->created_at->format('M d, Y H:i') }}</span>
                    @if($remark->status)
                    <span class="badge badge-{{ $remark->status }}">{{ ucfirst($remark->status) }}</span>
                    @endif
                </div>
                <div class="remark-body">{{ $remark->remark }}</div>
                @if($remark->follow_up_time)
                <div class="remark-footer">
                    <i class="fas fa-clock"></i> Follow up: {{ $remark->follow_up_time->format('M d, Y \a\t h:i A') }}
                </div>
                @endif
            </div>
            @empty
            <div class="empty-state">
                <i class="fas fa-comments"></i>
                <p>No remarks yet.</p>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection