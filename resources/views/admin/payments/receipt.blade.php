<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Payment Receipt - {{ $payment->transaction_id ?? $payment->id }}</title>
    <style>
        @page { margin: 0; size: A4 portrait; }
        body { font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 13px; color: #374151; margin: 0; padding: 15px; background-color: #fff; }
        * { box-sizing: border-box; }
        
        /* Premium Container */
        .receipt-container { 
            max-width: 100%; 
            margin: 0 auto; 
            background: #ffffff; 
            border: 1px solid #e5e7eb;
            border-top: 8px solid #0ea5e9;
            padding: 15px;
        }

        /* Header Section */
        .header-table { width: 100%; border-bottom: 2px solid #f3f4f6; padding-bottom: 15px; margin-bottom: 20px; }
        .header-table td { vertical-align: middle; }
        
        .logo-area img { max-height: 50px; max-width: 200px; display: block; margin-bottom: 10px; }
        .company-name-text { font-size: 20px; font-weight: 800; color: #111827; margin-bottom: 8px; text-transform: uppercase; letter-spacing: 1px; }
        .company-info { font-size: 11px; color: #6b7280; line-height: 1.6; }
        
        .title-area { text-align: right; }
        .document-title { font-size: 24px; font-weight: 800; color: #0ea5e9; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 5px; }
        .receipt-meta { font-size: 12px; color: #4b5563; line-height: 1.8; }
        .receipt-meta strong { color: #111827; }

        /* Highlight Amount Box */
        .amount-highlight { 
            background-color: #f0f9ff; 
            border-left: 4px solid #0ea5e9; 
            padding: 10px 15px; 
            margin-bottom: 15px;
            display: table;
            width: 100%;
        }
        .amount-highlight-td-left { width: 60%; vertical-align: middle; }
        .amount-highlight-td-right { width: 40%; text-align: right; vertical-align: middle; }
        
        .amount-label { font-size: 12px; color: #0369a1; text-transform: uppercase; font-weight: bold; letter-spacing: 1px; margin-bottom: 5px; display: block;}
        .amount-value { font-size: 28px; font-weight: 800; color: #0284c7; }
        
        .status-badge { 
            display: inline-block; 
            padding: 6px 14px; 
            border-radius: 4px; 
            font-size: 12px; 
            font-weight: bold; 
            background: #dcfce7; 
            color: #166534; 
            border: 1px solid #bbf7d0;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Info Grid */
        .info-grid { width: 100%; margin-bottom: 15px; table-layout: fixed; }
        .info-grid td { vertical-align: top; padding: 8px; background: #f9fafb; border: 1px solid #f3f4f6; }
        .info-grid td.gap { width: 4%; background: #fff; border: none; }
        .info-label { font-size: 10px; color: #6b7280; text-transform: uppercase; font-weight: bold; letter-spacing: 1px; margin-bottom: 8px; border-bottom: 1px solid #e5e7eb; padding-bottom: 4px; }
        .info-value { font-size: 13px; color: #111827; line-height: 1.5; }
        .info-value strong { display: block; font-size: 14px; margin-bottom: 4px; }

        /* Transaction Table */
        .transaction-table { width: 100%; border-collapse: collapse; margin-bottom: 15px; }
        .transaction-table th { background-color: #f3f4f6; color: #374151; font-size: 11px; text-transform: uppercase; font-weight: bold; padding: 8px 12px; text-align: left; border-top: 1px solid #e5e7eb; border-bottom: 1px solid #e5e7eb; letter-spacing: 0.5px; }
        .transaction-table th.right { text-align: right; }
        .transaction-table td { padding: 10px; border-bottom: 1px solid #f3f4f6; color: #111827; font-size: 13px; }
        .transaction-table td.right { text-align: right; font-weight: 700; }

        /* Summary Section */
        .summary-wrapper { width: 100%; margin-top: 10px; display: table; }
        .summary-notes { width: 55%; display: table-cell; vertical-align: top; padding-right: 20px; }
        .notes-box { background: #f9fafb; padding: 10px 15px; border-radius: 4px; font-size: 12px; color: #4b5563; border: 1px dashed #d1d5db; }
        .notes-box strong { color: #374151; display: block; margin-bottom: 5px; font-size: 11px; text-transform: uppercase; }
        
        .summary-totals { width: 45%; display: table-cell; vertical-align: top; }
        .summary-table { width: 100%; border-collapse: collapse; }
        .summary-table td { padding: 6px 10px; border-bottom: 1px solid #f3f4f6; font-size: 13px; }
        .summary-label { color: #4b5563; font-weight: 500; }
        .summary-table td.right { text-align: right; }
        
        .total-row td { font-weight: bold; background-color: #f8fafc; color: #0f172a; }
        .balance-row td { border-bottom: none; border-top: 2px solid #e2e8f0; font-weight: bold; font-size: 14px; }
        .balance-value { color: #dc2626; }
        
        .closure-notice { margin-top: 10px; background: #dcfce7; color: #166534; padding: 10px; border-radius: 6px; text-align: center; font-weight: bold; border: 1px solid #bbf7d0; text-transform: uppercase; letter-spacing: 1px; }
        .closure-notice .closure-icon { display: inline-block; background: #166534; color: white; width: 20px; height: 20px; text-align: center; border-radius: 50%; line-height: 20px; font-size: 12px; margin-right: 8px; vertical-align: middle; }
        
        .terms-box { margin-top: 10px; background: #f9fafb; border: 1px dashed #d1d5db; padding: 10px; border-radius: 6px; font-size: 11px; color: #4b5563; line-height: 1.4; }
        .terms-box strong { color: #111827; text-transform: uppercase; display: block; margin-bottom: 4px; font-size: 11px; }
        
        .signature-box { margin-top: 15px; text-align: right; }
        .signature-box div { display: inline-block; width: 220px; text-align: center; }
        .signature-img { max-height: 50px; max-width: 180px; display: block; margin: 0 auto 5px; }
        .signature-name { font-weight: bold; font-size: 14px; color: #111827; border-top: 1px solid #d1d5db; display: block; padding-top: 5px; margin-top: 20px; }
        .signature-title { font-size: 11px; color: #6b7280; display: block; margin-top: 3px; }

        /* Footer */
        .footer { text-align: center; margin-top: 15px; font-size: 11px; color: #9ca3af; border-top: 1px solid #e5e7eb; padding-top: 10px; }
        .footer-thanks { font-size: 13px; font-weight: bold; color: #374151; margin-bottom: 2px; }
    </style>
</head>
<body>
    <div class="receipt-container">
        <!-- Header -->
        <table class="header-table">
            <tr>
                <td style="width: 50%;">
                    <div class="logo-area">
                        @if($payment->invoice->logo_path)
                            <img src="{{ public_path('storage/' . $payment->invoice->logo_path) }}" alt="Logo">
                        @else
                            <div class="company-name-text">FINEXT SOLUTION</div>
                        @endif
                    </div>
                </td>
                <td style="width: 50%;" class="title-area">
                    <div class="document-title">RECEIPT</div>
                    <div class="receipt-meta">
                        <div>Receipt No: <strong>RCP-{{ str_pad($payment->id, 5, '0', STR_PAD_LEFT) }}</strong></div>
                        <div>Date: <strong>{{ $payment->payment_date->format('d M Y') }}</strong></div>
                    </div>
                </td>
            </tr>
            <tr>
                <!-- Company Info goes below the logo as requested -->
                <td colspan="2" style="padding-top: 10px;">
                    <div class="company-info">
                        {!! nl2br(e($payment->invoice->company_address)) !!}
                        @if($payment->invoice->gst_active && $payment->invoice->gst_number)
                            <br><strong>GSTIN:</strong> {{ $payment->invoice->gst_number }}
                        @endif
                    </div>
                </td>
            </tr>
        </table>

        <!-- Highlighted Amount -->
        <table class="amount-highlight">
            <tr>
                <td class="amount-highlight-td-left">
                    <span class="amount-label">Amount Received</span>
                    <div class="amount-value">Rs. {{ number_format($payment->amount, 2) }}</div>
                </td>
                <td class="amount-highlight-td-right">
                    <span class="status-badge">Payment Successful</span>
                </td>
            </tr>
        </table>

        <!-- Info Grid -->
        <table class="info-grid">
            <tr>
                <td style="width: 48%;">
                    <div class="info-label">Received From</div>
                    <div class="info-value">
                        <strong>{{ $payment->invoice->bill_to_name }}</strong>
                        {!! nl2br(e($payment->invoice->bill_to_address)) !!}
                    </div>
                </td>
                <td class="gap"></td>
                <td style="width: 48%;">
                    <div class="info-label">Payment Reference</div>
                    <div class="info-value">
                        <table style="width: 100%; border: none;">
                            <tr>
                                <td style="padding: 0 0 5px 0; border: none; background: transparent;"><span style="color:#6b7280;">For Invoice:</span></td>
                                <td style="padding: 0 0 5px 0; border: none; background: transparent; text-align: right;"><strong>{{ $payment->invoice->invoice_number }}</strong></td>
                            </tr>
                            <tr>
                                <td style="padding: 0 0 5px 0; border: none; background: transparent;"><span style="color:#6b7280;">Method:</span></td>
                                <td style="padding: 0 0 5px 0; border: none; background: transparent; text-align: right;"><strong>{{ $payment->payment_method ?? 'N/A' }}</strong></td>
                            </tr>
                            <tr>
                                <td style="padding: 0; border: none; background: transparent;"><span style="color:#6b7280;">Transaction ID:</span></td>
                                <td style="padding: 0; border: none; background: transparent; text-align: right;"><strong>{{ $payment->transaction_id ?? 'N/A' }}</strong></td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
        </table>

        <!-- Transaction Details -->
        <table class="transaction-table">
            <thead>
                <tr>
                    <th style="width: 50%;">Description</th>
                    <th style="width: 25%;">Date</th>
                    <th class="right" style="width: 25%;">Amount Applied</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Payment towards Invoice #{{ $payment->invoice->invoice_number }}</td>
                    <td>{{ $payment->payment_date->format('M d, Y') }}</td>
                    <td class="right">Rs. {{ number_format($payment->amount, 2) }}</td>
                </tr>
            </tbody>
        </table>

        <!-- Summary & Notes -->
        <div class="summary-wrapper">
            <div class="summary-notes">
                @if($payment->notes)
                <div class="notes-box">
                    <strong>Payment Notes</strong>
                    {{ $payment->notes }}
                </div>
                @endif
            </div>
            
            @php
                // Real-Time Deductive Logic Calculation
                $previousPayments = $payment->invoice->payments()->where('id', '<', $payment->id)->sum('amount');
                $openingBalance = $payment->invoice->total - $previousPayments;
                $closingBalance = $openingBalance - $payment->amount;
            @endphp
            
            <div class="summary-totals">
                <table class="summary-table">
                    <tr>
                        <td class="summary-label">Invoice Total</td>
                        <td class="right">Rs. {{ number_format($payment->invoice->total, 2) }}</td>
                    </tr>
                    @if($previousPayments > 0)
                    <tr>
                        <td class="summary-label" style="font-size: 11px;">Prior Payments</td>
                        <td class="right" style="font-size: 11px;">- Rs. {{ number_format($previousPayments, 2) }}</td>
                    </tr>
                    @endif
                    <tr>
                        <td class="summary-label">Opening Balance</td>
                        <td class="right">Rs. {{ number_format($openingBalance, 2) }}</td>
                    </tr>
                    <tr class="total-row">
                        <td class="summary-label">Amount Paid Today</td>
                        <td class="right" style="color: #059669;">- Rs. {{ number_format($payment->amount, 2) }}</td>
                    </tr>
                    <tr class="balance-row">
                        <td class="summary-label">Remaining Balance</td>
                        <td class="right balance-value">Rs. {{ number_format($closingBalance, 2) }}</td>
                    </tr>
                </table>
            </div>
        </div>
        
        @if($closingBalance <= 0)
        <div class="closure-notice">
            <span class="closure-icon">✔</span> INVOICE IS CLOSED SUCCESSFULLY
        </div>
        @endif
        
        <div class="terms-box">
            <strong>Terms and Conditions</strong>
            1. All payments made towards this invoice are strictly non-refundable.<br>
            2. Please verify all details before completing a transaction.<br>
            3. By making a payment, you agree to these legal conditions.
        </div>

        <div class="signature-box">
            <div>
                @if($payment->invoice->signature_path)
                    <img src="{{ public_path('storage/' . $payment->invoice->signature_path) }}" class="signature-img">
                @else
                    <div class="signature-name">Rahul Chauhan</div>
                @endif
                <div class="signature-title">Authorized Signatory</div>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <div class="footer-thanks">Thank you for your business!</div>
            <div>This is a computer-generated receipt.</div>
        </div>
    </div>
</body>
</html>
