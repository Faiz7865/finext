<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice Statement - {{ $client->name }}</title>
    <style>
        @page { margin: 20px; size: A4 portrait; }
        body { font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 12px; color: #374151; margin: 0; padding: 0; background-color: #fff; line-height: 1.4; }
        * { box-sizing: border-box; }
        
        .header-table { width: 100%; border-bottom: 2px solid #0ea5e9; padding-bottom: 10px; margin-bottom: 15px; }
        .header-table td { vertical-align: top; }
        
        .company-name-text { font-size: 24px; font-weight: 800; color: #111827; letter-spacing: 1px; }
        .document-title { font-size: 24px; font-weight: 800; color: #0ea5e9; text-transform: uppercase; letter-spacing: 2px; text-align: right; }
        
        .client-info-box { background: #f9fafb; padding: 10px; border: 1px solid #e5e7eb; border-radius: 4px; margin-bottom: 15px; }
        .client-info-box h3 { margin: 0 0 8px 0; color: #111827; font-size: 14px; text-transform: uppercase; border-bottom: 1px solid #e5e7eb; padding-bottom: 5px; }
        .c-label { font-size: 10px; color: #6b7280; text-transform: uppercase; font-weight: bold; }
        .c-value { font-size: 12px; color: #111827; font-weight: 600; }
        
        .summary-boxes { width: 100%; margin-bottom: 15px; table-layout: fixed; }
        .summary-boxes td { padding: 10px; text-align: center; border: 1px solid #e5e7eb; }
        .summary-title { font-size: 10px; color: #6b7280; text-transform: uppercase; font-weight: bold; margin-bottom: 3px; }
        .summary-amt { font-size: 16px; font-weight: bold; color: #111827; }
        
        table.transactions { width: 100%; border-collapse: collapse; margin-bottom: 15px; }
        table.transactions th { background: #f3f4f6; padding: 6px; font-size: 10px; text-transform: uppercase; text-align: left; border-top: 2px solid #e5e7eb; border-bottom: 2px solid #e5e7eb; color: #4b5563; }
        table.transactions td { padding: 6px; border-bottom: 1px solid #f3f4f6; vertical-align: middle; }
        table.transactions th.right, table.transactions td.right { text-align: right; }
        table.transactions td.type { font-weight: bold; }
        table.transactions tr.invoice-row td { background-color: #ffffff; }
        table.transactions tr.payment-row td { background-color: #f8fafc; font-style: italic; color: #059669; }
        
        .terms-box { margin-top: 10px; background: #f9fafb; border: 1px dashed #d1d5db; padding: 10px; border-radius: 4px; font-size: 11px; line-height: 1.4; }
        .terms-box strong { color: #111827; text-transform: uppercase; display: block; margin-bottom: 3px; }
        .signature-box { margin-top: 15px; text-align: right; }
        .signature-box div { display: inline-block; width: 200px; text-align: center; }
        .signature-img { max-height: 50px; max-width: 180px; display: block; margin: 0 auto 5px; }
        .signature-name { font-weight: bold; font-size: 14px; color: #111827; border-top: 1px solid #d1d5db; display: block; padding-top: 3px; margin-top: 20px; }
        .signature-title { font-size: 11px; color: #6b7280; display: block; margin-top: 2px; }

        .footer { text-align: center; font-size: 10px; color: #9ca3af; border-top: 1px solid #e5e7eb; padding-top: 10px; margin-top: 15px; }
    </style>
</head>
<body>

    <table class="header-table">
        <tr>
            <td style="width: 50%;">
                @php
                    $latestInvoiceWithLogo = $invoices->whereNotNull('logo_path')->sortByDesc('invoice_date')->first();
                @endphp
                @if($latestInvoiceWithLogo && $latestInvoiceWithLogo->logo_path)
                    <img src="{{ public_path('storage/' . $latestInvoiceWithLogo->logo_path) }}" alt="Logo" style="max-height: 50px; max-width: 200px; display: block; margin-bottom: 2px;">
                @else
                    <div class="company-name-text">FINEXT SOLUTION</div>
                @endif
                <div style="font-size: 11px; color: #6b7280; margin-top: 5px;">
                    Invoice Statement generated on {{ date('d M Y') }}
                </div>
            </td>
            <td style="width: 50%; padding-top: 5px;">
                <div class="document-title">INVOICE STATEMENT</div>
            </td>
        </tr>
    </table>

    <table style="width: 100%; margin-bottom: 25px;">
        <tr>
            <td style="width: 100%;">
                <div class="client-info-box">
                    <h3>Client Information</h3>
                    <table style="width: 100%;">
                        <tr>
                            <td style="width: 50%;">
                                <div class="c-label">Name</div>
                                <div class="c-value">{{ $client->name }}</div>
                            </td>
                            <td style="width: 50%;">
                                <div class="c-label">Company</div>
                                <div class="c-value">{{ $client->company_name ?? 'N/A' }}</div>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-top: 15px;">
                                <div class="c-label">Email</div>
                                <div class="c-value">{{ $client->email ?? 'N/A' }}</div>
                            </td>
                            <td style="padding-top: 15px;">
                                <div class="c-label">Mobile</div>
                                <div class="c-value">{{ $client->mobile ?? 'N/A' }}</div>
                            </td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr>
    </table>

    <table class="summary-boxes">
        <tr>
            <td style="background-color: #f8fafc;">
                <div class="summary-title">Total Invoiced</div>
                <div class="summary-amt">Rs. {{ number_format($invoices->sum('total'), 2) }}</div>
            </td>
            <td style="background-color: #ecfdf5;">
                <div class="summary-title">Total Paid</div>
                <div class="summary-amt" style="color: #059669;">Rs. {{ number_format($invoices->sum('amount_paid'), 2) }}</div>
            </td>
            <td style="background-color: #fef2f2;">
                <div class="summary-title">Total Pending Balance</div>
                <div class="summary-amt" style="color: #dc2626;">Rs. {{ number_format($invoices->sum('balance_due'), 2) }}</div>
            </td>
        </tr>
    </table>

    <h4 style="margin-bottom: 10px; color: #111827; text-transform: uppercase;">Transaction History</h4>
    
    <table class="transactions">
        <thead>
            <tr>
                <th style="width: 15%;">Date</th>
                <th style="width: 35%;">Description</th>
                <th class="right" style="width: 15%;">Amount</th>
                <th class="right" style="width: 15%;">Paid</th>
                <th class="right" style="width: 20%;">Running Balance</th>
            </tr>
        </thead>
        <tbody>
            @php $runningBalance = 0; @endphp
            
            @forelse($invoices as $invoice)
                @php $runningBalance += $invoice->total; @endphp
                <tr class="invoice-row">
                    <td>{{ $invoice->invoice_date->format('d M Y') }}</td>
                    <td class="type">Invoice #{{ $invoice->invoice_number }}</td>
                    <td class="right">Rs. {{ number_format($invoice->total, 2) }}</td>
                    <td class="right">-</td>
                    <td class="right" style="font-weight: bold; color: #dc2626;">Rs. {{ number_format($runningBalance, 2) }}</td>
                </tr>
                
                @foreach($invoice->payments->sortBy('payment_date') as $payment)
                    @php $runningBalance -= $payment->amount; @endphp
                    <tr class="payment-row">
                        <td>{{ $payment->payment_date->format('d M Y') }}</td>
                        <td>Payment Received ({{ $payment->payment_method }})</td>
                        <td class="right">-</td>
                        <td class="right" style="font-weight: bold;">Rs. {{ number_format($payment->amount, 2) }}</td>
                        <td class="right" style="font-weight: bold; color: {{ $runningBalance > 0 ? '#dc2626' : '#059669' }};">Rs. {{ number_format($runningBalance, 2) }}</td>
                    </tr>
                @endforeach
            @empty
                <tr>
                    <td colspan="5" style="text-align: center; padding: 30px;">No transactions found for this client.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="terms-box">
        <strong>Terms and Conditions</strong>
        1. All payments made towards the invoices are strictly non-refundable.<br>
        2. Please verify all details before making completing a transaction.<br>
        3. By making a payment, you agree to these legal conditions.
    </div>

    <div class="signature-box">
        <div>
            @php
                $latestInvoiceWithSig = $invoices->whereNotNull('signature_path')->sortByDesc('invoice_date')->first();
            @endphp
            @if($latestInvoiceWithSig)
                <img src="{{ public_path('storage/' . $latestInvoiceWithSig->signature_path) }}" class="signature-img">
            @else
                <div class="signature-name">Rahul Chauhan</div>
            @endif
            <div class="signature-title">Authorized Signatory</div>
        </div>
    </div>

    <div class="footer">
        Provided by FINEXT SOLUTION. This is a computer-generated Invoice Statement.
    </div>
</body>
</html>
