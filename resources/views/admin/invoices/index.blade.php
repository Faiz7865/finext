@extends('layouts.dashboard')

@section('page-title', 'Invoices')

@section('content')
<div class="filter-section">
    <form action="{{ route('admin.invoices.index') }}" method="GET" class="filter-form">
        <div class="filter-grid">
            <div class="form-group">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="">All Statuses</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="partially_paid" {{ request('status') == 'partially_paid' ? 'selected' : '' }}>Partially Paid</option>
                    <option value="paid" {{ request('status') == 'paid' ? 'selected' : '' }}>Paid</option>
                    <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
            </div>

            <div class="form-group">
                <label class="form-label">Search</label>
                <input type="text" name="search" class="form-control" placeholder="Invoice #, Client Name..." value="{{ request('search') }}">
            </div>
        </div>

        <div class="filter-actions">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-filter"></i> Apply Filters
            </button>
            <a href="{{ route('admin.invoices.index') }}" class="btn btn-secondary">
                <i class="fas fa-undo"></i> Clear
            </a>
        </div>
    </form>
</div>

<div class="card">
    <div class="card-header">
        <h2 class="card-title">All Invoices</h2>
        <a href="{{ route('admin.invoices.create') }}" class="btn btn-success btn-sm">
            <i class="fas fa-plus"></i> Create Invoice
        </a>
    </div>

    <div class="table-responsive">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Invoice #</th>
                    <th>Client</th>
                    <th>Date</th>
                    <th>Total</th>
                    <th>Paid</th>
                    <th>Balance</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($invoices as $invoice)
                    <tr>
                        <td><strong>{{ $invoice->invoice_number }}</strong></td>
                        <td>{{ $invoice->bill_to_name }}</td>
                        <td>{{ $invoice->invoice_date->format('M d, Y') }}</td>
                        <td>Rs. {{ number_format($invoice->total, 2) }}</td>
                        <td>Rs. {{ number_format($invoice->amount_paid, 2) }}</td>
                        <td class="text-danger"><strong>Rs. {{ number_format($invoice->balance_due, 2) }}</strong></td>
                        <td>
                            <span class="badge badge-{{ $invoice->status }}">
                                {{ str_replace('_', ' ', ucfirst($invoice->status)) }}
                            </span>
                        </td>
                        <td>
                            <div class="action-btns">
                                <a href="{{ route('admin.invoices.show', $invoice) }}" class="btn btn-primary btn-sm" title="View Details, Add Payment">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.invoices.pdf', $invoice) }}" class="btn btn-info btn-sm" title="Download PDF">
                                    <i class="fas fa-file-pdf"></i>
                                </a>
                                <form action="{{ route('admin.invoices.destroy', $invoice) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete this invoice?');">
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
                                <i class="fas fa-file-invoice"></i>
                                <p>No invoices found</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination">
        {{ $invoices->links() }}
    </div>
</div>
@endsection
