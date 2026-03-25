@extends('layouts.dashboard')
@section('page-title', 'Invoice Statement')

@section('content')

<!-- Header Card -->
<div class="card statement-header-card mb-4">
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col-md-7 d-flex align-items-center mb-4 mb-md-0">
                <div class="client-avatar">
                    {{ strtoupper(substr($client->name, 0, 1)) }}
                </div>
                <div>
                    <h3 class="font-weight-bold mb-1">{{ $client->name }}</h3>
                    <div class="text-light opacity-75 mb-2" style="font-size: 15px;">
                        @if($client->company_name) <i class="fas fa-building mr-1"></i> {{ $client->company_name }} &nbsp;|&nbsp; @endif
                        <i class="fas fa-envelope mr-1"></i> {{ $client->email }} &nbsp;|&nbsp;
                        <i class="fas fa-phone mr-1"></i> {{ $client->mobile }}
                    </div>
                </div>
            </div>
            <div class="col-md-5 text-md-right">
                <a href="{{ route('admin.clients.statement.pdf', $client) }}" target="_blank" class="btn btn-danger btn-lg shadow px-4" style="border-radius: 8px; font-weight: 600;">
                    <i class="fas fa-file-pdf mr-2"></i> Download PDF Report
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Metrics Row -->
<div class="row mb-4">
    <div class="col-md-4 mb-3 mb-md-0">
        <div class="metric-card">
            <div class="metric-title"><i class="fas fa-file-invoice-dollar mr-2"></i> Total Invoiced</div>
            <div class="metric-val">₹{{ number_format($invoices->sum('total'), 2) }}</div>
        </div>
    </div>
    <div class="col-md-4 mb-3 mb-md-0">
        <div class="metric-card" style="border-bottom: 4px solid #10b981;">
            <div class="metric-title"><i class="fas fa-check-circle text-success mr-2"></i> Total Paid</div>
            <div class="metric-val text-success">₹{{ number_format($invoices->sum('amount_paid'), 2) }}</div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="metric-card" style="border-bottom: 4px solid #ef4444;">
            <div class="metric-title"><i class="fas fa-exclamation-circle text-danger mr-2"></i> Pending Balance</div>
            <div class="metric-val text-danger">₹{{ number_format($invoices->sum('balance_due'), 2) }}</div>
        </div>
    </div>
</div>

<!-- Transactions Table -->
<div class="card transaction-card mb-5 mt-5">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0 font-weight-bold text-dark"><i class="fas fa-history mr-2 text-primary"></i> Detailed Transaction Ledger</h5>
    </div>
    <div class="table-responsive">
        <table class="table mb-0 table-hover">
            <thead>
                <tr>
                    <th class="pl-4">Date</th>
                    <th>Document / Detail</th>
                    <th class="text-right">Total Amount</th>
                    <th class="text-right">Paid</th>
                    <th class="text-right">Balance</th>
                    <th class="pr-4 text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($invoices as $invoice)
                <!-- Invoice Row -->
                <tr>
                    <td class="pl-4 font-weight-bold">{{ $invoice->invoice_date->format('d M, Y') }}</td>
                    <td>
                        <a href="{{ route('admin.invoices.show', $invoice) }}" class="font-weight-bold text-primary">
                            <i class="fas fa-file-invoice mr-1"></i> {{ $invoice->invoice_number }}
                        </a>
                    </td>
                    <td class="text-right font-weight-bold">₹{{ number_format($invoice->total, 2) }}</td>
                    <td class="text-right">-</td>
                    <td class="text-right text-danger font-weight-bold">₹{{ number_format($invoice->balance_due, 2) }}</td>
                    <td class="pr-4 text-center">
                        <span class="badge badge-{{ $invoice->status }} badge-status shadow-sm">
                            {{ strtoupper(str_replace('_', ' ', $invoice->status)) }}
                        </span>
                    </td>
                </tr>
                
                <!-- Associated Payments Rows -->
                @foreach($invoice->payments as $payment)
                <tr class="payment-row">
                    <td class="pl-4 text-muted small pl-5"><i class="fas fa-clock mr-1"></i> {{ $payment->payment_date->format('d M, Y') }}</td>
                    <td>
                        <div class="d-flex align-items-center">
                            <span class="payment-icon"><i class="fas fa-level-down-alt"></i></span>
                            <div>
                                <span class="d-block font-weight-bold text-success">Payment Received</span>
                                <small class="text-muted">Via {{ $payment->payment_method }} @if($payment->transaction_id) • Ref: {{ $payment->transaction_id }} @endif</small>
                            </div>
                        </div>
                    </td>
                    <td class="text-right">-</td>
                    <td class="text-right font-weight-bold text-success">+ ₹{{ number_format($payment->amount, 2) }}</td>
                    <td class="text-right">-</td>
                    <td class="pr-4 text-center">
                        <a href="{{ route('admin.payments.receipt', $payment) }}" target="_blank" class="btn btn-sm btn-outline-success rounded-pill px-3 shadow-sm">
                            <i class="fas fa-search mr-1"></i> Receipt
                        </a>
                    </td>
                </tr>
                @endforeach
                
                @empty
                <tr>
                    <td colspan="6" class="text-center py-5">
                        <div class="text-muted text-center py-4">
                            <i class="fas fa-box-open fa-3x mb-3 text-light"></i>
                            <h5 class="mb-0 text-secondary">No transactions found for this client.</h5>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
