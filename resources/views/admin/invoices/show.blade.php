@extends('layouts.dashboard')

@section('page-title', 'Invoice Details')

@push('styles')
    <style>
        .invoice-card { border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05); border: 1px solid #e2e8f0; background: #fff; }
        .invoice-header { background-color: #f8fafc; border-bottom: 1px solid #e2e8f0; padding: 20px 25px; border-radius: 12px 12px 0 0; }
        .info-section { background-color: #f9fafb; padding: 20px; border-radius: 8px; border: 1px solid #e5e7eb; height: 100%; }
        .section-title { color: #64748b; font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 15px; border-bottom: 1px solid #e2e8f0; padding-bottom: 8px; }
        .val-text { color: #0f172a; font-size: 14px; line-height: 1.5; }
        .badge-status { padding: 6px 14px; border-radius: 8px; font-weight: 600; font-size: 12px; letter-spacing: 0.5px; }
        
        .table th { background-color: #f8fafc; color: #475569; font-weight: 600; text-transform: uppercase; font-size: 11px; letter-spacing: 0.5px; border-top: none; border-bottom: 2px solid #e2e8f0; }
        
        .description-cell { font-size: 13px; color: #334155; line-height: 1.6; }
        .description-cell p { margin-bottom: 0.5rem; }
        .description-cell p:last-child { margin-bottom: 0; }
        
        /* Text Clipping for Product Description */
        .clipper-box {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: normal;
        }

        .payment-box { border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05); border: 1px solid #e2e8f0; overflow: hidden; }
        .payment-box-header { background: #1e293b; color: white; padding: 20px; font-weight: 600; }
        
        .totals-table td { border: none; padding: 8px 15px; font-size: 14px; }
        .totals-table tr.border-top td { border-top: 2px solid #e2e8f0 !important; }
    </style>
@endpush

@section('content')
<div class="row">
    <!-- Invoice Info -->
    <div class="col-lg-8 mb-4 mb-lg-0">
        <div class="invoice-card mb-4">
            <div class="invoice-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0 font-weight-bold text-dark">Invoice #{{ $invoice->invoice_number }}</h4>
                <span class="badge badge-{{ $invoice->status }} badge-status">
                    {{ strtoupper(str_replace('_', ' ', $invoice->status)) }}
                </span>
            </div>
            
            <div class="card-body p-4">
                <div class="row mb-5">
                    <div class="col-md-6 mb-4 mb-md-0">
                        <div class="info-section">
                            <h6 class="section-title"><i class="fas fa-building mr-2"></i> Bill To</h6>
                            <div class="val-text">
                                <strong style="font-size: 16px;">{{ $invoice->bill_to_name }}</strong>
                                @if($invoice->client && $invoice->client->company_name)
                                    <div class="text-muted small mb-2">{{ $invoice->client->company_name }}</div>
                                @endif
                                <div class="mt-2 text-muted" style="white-space: pre-line;">
                                    {{ $invoice->bill_to_address }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-section">
                            <h6 class="section-title"><i class="fas fa-info-circle mr-2"></i> Invoice Details</h6>
                            <table style="width: 100%;">
                                <tr>
                                    <td class="text-muted pb-2" style="width: 40%;">Invoice Date:</td>
                                    <td class="val-text font-weight-bold pb-2">{{ $invoice->invoice_date->format('d M Y') }}</td>
                                </tr>
                                <tr>
                                    <td class="text-muted pb-2">Payment Terms:</td>
                                    <td class="val-text pb-2">{{ $invoice->payment_terms }}</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Due Date:</td>
                                    <td class="val-text font-weight-bold {{ $invoice->due_date && $invoice->due_date->isPast() && $invoice->balance_due > 0 ? 'text-danger' : '' }}">
                                        {{ $invoice->due_date ? $invoice->due_date->format('d M Y') : 'N/A' }}
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="table-responsive mb-4">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th style="width: 50%;">Description</th>
                                <th class="text-right">Rate</th>
                                <th class="text-center">Qty</th>
                                <th class="text-right">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($invoice->items as $item)
                            <tr>
                                <td class="description-cell">
                                    <strong class="d-block mb-1 text-dark">{{ $item->name }}</strong>
                                    <div class="text-muted clipper-box" title="{{ strip_tags(Illuminate\Support\Str::markdown($item->description ?? '')) }}">
                                        {!! Illuminate\Support\Str::markdown($item->description ?? '') !!}
                                    </div>
                                </td>
                                <td class="text-right align-middle">₹{{ number_format($item->rate, 2) }}</td>
                                <td class="text-center align-middle">
                                    <span class="badge badge-light border">{{ $item->quantity }}</span>
                                </td>
                                <td class="text-right align-middle font-weight-bold">₹{{ number_format($item->amount, 2) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <div class="row border-top pt-4">
                    <div class="col-md-5">
                        <p class="text-muted small">
                            <i class="fas fa-lock mr-1"></i> Data safely encrypted and recorded.
                        </p>
                        <a href="{{ route('admin.invoices.pdf', $invoice) }}" class="btn btn-outline-primary rounded-pill px-4 mt-2">
                            <i class="fas fa-download mr-2"></i> Download PDF
                        </a>
                    </div>
                    <div class="col-md-7">
                        <div class="bg-light rounded p-3 text-right">
                            <table class="totals-table w-100">
                                <tbody>
                                    <tr>
                                        <td class="text-muted">Subtotal</td>
                                        <td class="font-weight-bold">₹{{ number_format($invoice->subtotal, 2) }}</td>
                                    </tr>
                                    @if($invoice->discount_active && $invoice->discount_value > 0)
                                    <tr>
                                        <td class="text-muted">Discount @if($invoice->discount_type == 'percentage') ({{ $invoice->discount_value }}%) @endif</td>
                                        <td class="text-danger">-₹{{ number_format($invoice->discount_amount, 2) }}</td>
                                    </tr>
                                    @endif
                                    @if($invoice->gst_active && $invoice->gst_percentage > 0)
                                    <tr>
                                        <td class="text-muted">GST ({{ $invoice->gst_percentage }}%)</td>
                                        <td>+₹{{ number_format($invoice->gst_amount, 2) }}</td>
                                    </tr>
                                    @endif
                                    <tr class="border-top">
                                        <td class="text-dark font-weight-bold" style="font-size: 16px;">Total Amount</td>
                                        <td class="text-dark font-weight-bold" style="font-size: 18px;">₹{{ number_format($invoice->total, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Amount Paid</td>
                                        <td class="text-success font-weight-bold">-₹{{ number_format($invoice->amount_paid, 2) }}</td>
                                    </tr>
                                    <tr class="border-top">
                                        <td class="font-weight-bold text-danger" style="font-size: 16px;">Balance Due</td>
                                        <td class="font-weight-bold text-danger" style="font-size: 20px;">₹{{ number_format($invoice->balance_due, 2) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Payments History -->
        @if($invoice->payments->count() > 0)
        <div class="invoice-card mb-4 mb-lg-0">
            <div class="invoice-header d-flex align-items-center bg-white border-bottom">
                <i class="fas fa-history text-primary mr-2 fa-lg"></i>
                <h5 class="mb-0 font-weight-bold text-dark">Payment History</h5>
            </div>
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th class="pl-4">Date</th>
                            <th>Amount</th>
                            <th>Method</th>
                            <th>Ref / ID</th>
                            <th class="text-right pr-4">Receipt</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($invoice->payments as $payment)
                        <tr>
                            <td class="pl-4 align-middle font-weight-bold text-muted">{{ $payment->payment_date->format('d M Y') }}</td>
                            <td class="align-middle text-success font-weight-bold">₹{{ number_format($payment->amount, 2) }}</td>
                            <td class="align-middle"><span class="badge badge-light border">{{ $payment->payment_method ?? 'N/A' }}</span></td>
                            <td class="align-middle text-muted small">{{ $payment->transaction_id ?? 'N/A' }}</td>
                            <td class="text-right pr-4 align-middle">
                                <a href="{{ route('admin.payments.receipt', $payment) }}" class="btn btn-sm btn-outline-info rounded-pill px-3" target="_blank">
                                    <i class="fas fa-external-link-alt mr-1"></i> View Receipt
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif
    </div>

    <!-- Record Payment Side Panel -->
    <div class="col-lg-4">
        <div class="payment-box bg-white">
            <div class="payment-box-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0 text-white"><i class="fas fa-wallet mr-2"></i> Record Payment</h5>
                <i class="fas fa-shield-alt text-white opacity-50"></i>
            </div>
            <div class="card-body p-4 bg-light">
                @if($invoice->balance_due > 0)
                <div class="alert alert-warning border-warning border-left-0 border-right-0 border-top-0 rounded-0 mx-n4 mt-n4 px-4 py-3 bg-white d-flex align-items-center mb-4">
                    <i class="fas fa-exclamation-circle fa-2x text-warning mr-3"></i>
                    <div>
                        <span class="d-block small text-muted font-weight-bold text-uppercase">Pending Balance</span>
                        <span class="font-weight-bold text-dark" style="font-size: 18px;">₹{{ number_format($invoice->balance_due, 2) }}</span>
                    </div>
                </div>
                
                <form action="{{ route('admin.invoices.payments.store', $invoice) }}" method="POST">
                    @csrf
                    <div class="form-group mb-4">
                        <label class="font-weight-bold text-muted small text-uppercase">Amount Received (₹) *</label>
                        <div class="input-group input-group-lg shadow-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white border-right-0 text-success font-weight-bold">₹</span>
                            </div>
                            <input type="number" name="amount" class="form-control border-left-0 font-weight-bold text-dark" style="font-size: 20px;" step="0.01" max="{{ $invoice->balance_due }}" value="{{ $invoice->balance_due }}" required>
                        </div>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label class="font-weight-bold text-muted small text-uppercase">Payment Date *</label>
                        <input type="date" name="payment_date" class="form-control" value="{{ date('Y-m-d') }}" required>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label class="font-weight-bold text-muted small text-uppercase">Payment Method</label>
                        <select name="payment_method" class="form-control custom-select">
                            <option value="UPI">UPI / Google Pay / PhonePe</option>
                            <option value="Bank Transfer">NEFT / IMPS / RTGS</option>
                            <option value="Cash">Cash Transaction</option>
                            <option value="Card">Credit / Debit Card</option>
                            <option value="Cheque">Bank Cheque</option>
                        </select>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label class="font-weight-bold text-muted small text-uppercase">Transaction ID / UTR</label>
                        <input type="text" name="transaction_id" class="form-control" placeholder="e.g. 1045XXXXXXXX">
                    </div>
                    
                    <div class="form-group mb-4">
                        <label class="font-weight-bold text-muted small text-uppercase">Internal Notes (Optional)</label>
                        <textarea name="notes" class="form-control" rows="2" placeholder="Any remarks regarding this payment..."></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-success btn-lg btn-block font-weight-bold shadow-sm rounded-pill mt-4">
                        <i class="fas fa-check-circle mr-2"></i> Submit Payment
                    </button>
                </form>
                @else
                <div class="text-center py-5 bg-white rounded shadow-sm border">
                    <div class="mb-3">
                        <span class="fa-stack fa-3x">
                            <i class="fas fa-circle fa-stack-2x text-success" style="opacity: 0.2;"></i>
                            <i class="fas fa-check-circle fa-stack-1x text-success"></i>
                        </span>
                    </div>
                    <h4 class="font-weight-bold text-dark mb-1">Invoice Closed</h4>
                    <p class="text-muted mb-0">This document is fully paid.</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
